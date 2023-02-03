<?php

namespace App\Http\Controllers;

use App\Http\Requests\CashUpdateRequest;
use App\Models\Cash;
use App\Models\Chips;
use App\Models\Company;
use App\Models\Image;
use App\Models\Money;
use App\Models\Name_Money;
use DB;
use PDF;
use Error;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use LDAP\Result;
use Storage;
use Illuminate\Validation\Rule;
use Validator;

class CRUDController extends Controller
{
    //Create Index
    public function index()
    {
        $data['companies'] = Company::orderBy('id', 'asc')->paginate(10);

        return view('companies.index', $data);
    }

    //Crate Resource
    public function create()
    {
        return view('companies.create');
    }

    public function edit($id)
    {

        $company = Company::find($id);

        $cash = Chips::find($id);

        $cashes = Cash::groupBy('code_money')->get();
        if (!$cashes->count()) {
            return redirect()->route('companies.edit')->with('success', 'Cash not found');
        }

        $images = Image::where('companies_id', $id)->get();
        if (!$images->count()) {
            return redirect()->route('companies.detail')->with('success', 'Images not found');
        }

        return view('companies.edit', compact(['company', 'cash', 'cashes', 'images']));
    }

    public function update(Request $request, $id)
    {

        // Validate ข้อมูลครุภัณฑ์
        $request->validate([
            'cover' => 'mimes:jpeg,jpg,png|max:2048',
            'images.*' => 'mimes:jpeg,jpg,png|max:2048',
            'num_asset' => 'required|string|regex:/^\d{12}-\d{5}-\d{5}$/',
            'date_into' => 'required|date',
            'name_asset' => 'required|string|max:255',
            'detail' => 'required|string|max:255',
            'unit' =>   'required|string|max:60',
            'place' => 'required|string|max:255',
            'per_price' =>  'required|numeric|regex:/^[0-9]{1,8}(\.[0-9]{2})$/',
            'status_buy' => 'required|string|max:255',
            //'num_old_asset' => 'required|string|regex:/^\d{3}(\-)\d{2}(\-)\d{1}(\-)(\d{1}\/\d{5})$/',
            'num_old_asset' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',

            // 'department' => 'required_if:select_field,selected_value',
            //'department' => 'required|in:selected_value1,selected_value2,selected_value3,selected_value4,selected_value5,,selected_other',
            //'department' => 'required',

            'name_info' => 'required|string|max:255',
            'num_department' => 'required|string|regex:/^[0-9]{3,5}$/',

        ]);

        $company = Company::find($id);

        if ($request->hasFile("cover")) {
            if (File::exists("cover/" . $company->cover)) {
                File::delete("cover/" . $company->cover);
            }
            $file = $request->file("cover");
            $company->cover = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("/cover"), $company->cover);
            $request['cover'] = $company->cover;
        }


        //Cash Update (อัพเดทตาราง Cash ของแหล่งเงิน ชื่อแหล่งเงิน งบประจำปี)
        $cash = Chips::find($id);

        if (is_null($cash)) {
            return redirect()->route('companies.index')->with('success', 'Company not found');
        } else {
            $code_money = $request->input('code_money');
            $name_money = $request->input('name_money');
            $budget = $request->input('budget');
            if (!empty($code_money) && !empty($name_money) && !empty($budget)) {
                $cash->code_money = $code_money;
                $cash->name_money = $name_money;
                $cash->budget = $budget;
                $cash->update();
            }
        }
        //-------------------------------------------------------------------

        $validator = Validator::make($request->all(), [
            'department' => 'required',
            'other_department' => 'required_if:department,other',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $company->num_asset = $request->input('num_asset');
        $company->date_into = $request->input('date_into');
        $company->name_asset = $request->input('name_asset');
        $company->detail = $request->input('detail');
        $company->unit = $request->input('unit');
        $company->place = $request->input('place');
        $company->per_price = $request->input('per_price');
        $company->status_buy = $request->input('status_buy');
        $company->num_old_asset = $request->input('num_old_asset');
        $company->fullname = $request->input('fullname');


        $company->department = $request->department;
        if ($request->department == 'other') {
            $company->other_department = $request->other_department;
        }


        $company->name_info = $request->input('name_info');
        $company->num_department = $request->input('num_department');

        $company->update();

        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $request["companies_id"] = $id;
                $request["image"] = $imageName;
                $file->move(\public_path("images"), $imageName);
                Image::create($request->all());
            }
        }

        return redirect()->route('companies.index')->with('success', 'แก้ไขครุภัณฑ์สำเร็จแล้ว');
    }

    public function destroy($id)
    {

        $company = Company::find($id);
        $destination = 'cover/' . $company->cover;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $images = Image::where('companies_id', $company->id)->get();
        foreach ($images as $image) {
            if (File::exists("images/" . $image->image)) {
                File::delete("images/" . $image->image);
            }
            $image->delete();
        }

        $cash = Chips::find($id);

        $company->delete();
        $cash->delete();

        return redirect()->route('companies.index')->with('success', 'ลบครุภัณฑ์สำเร็จแล้ว');
    }


    function get_companies()
    {
        $companies = DB::table('companies')

            ->get();
        return $companies;
    }

    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_companies_to_html());
        return $pdf->stream();
    }

    function convert_companies_to_html()
    {
        $companies = $this->get_companies();
        return view('companies.pdf')->with('companies', $companies);
        /*
        $output = '
     <h3 align="center">ข้อมูลครุภัณฑ์</h3>
     <style>
     @page { size: 21cm 29.7cm landscape; }
     @font-face {
        font-family: "THSarabunNew";
        font-style: normal;
        font-weight: normal;
        src: url("{{ public_path("fonts/THSarabunNew.ttf") }}") format("truetype");
    }
    td {
        font-family: "THSarabunNew";
    }     </style>

      <table style="border-collapse: collapse; width: 100%;" border="0">
      <tr>
    <td style="border: 1px solid; padding:10px;" width:20%>หมายเลขครุภัณฑ์</td>
    <td style="border: 1px solid; padding:10px;" width:10%>วันที่รับเข้าคลัง</td>
    <td style="border: 1px solid; padding:10px;" width:10%>ชื่อครุภัณฑ์</td>
    <td style="border: 1px solid; padding:10px;" width:10%>รายละเอียด</td>
    <td style="border: 1px solid; padding:10px;" width:10%>หน่วยนับ</td>
    <td style="border: 1px solid; padding:10px;" width:10%>สถานที่ตั้ง</td>
    <td style="border: 1px solid; padding:10px;" width:10%>ราคา/หน่วย</td>
    <td style="border: 1px solid; padding:10px;" width:10%>สถานะ</td>
    <td style="border: 1px solid; padding:10px;" width:10%>หมายเลขครุภัณฑ์เก่า</td>
   </tr>
     ';
        foreach ($companies as $company) {
            $output .= '
      <tr>
       <td style="border: 1px solid; padding:10px;">' . $company->num_asset . '</td>
       <td style="border: 1px solid; padding:10px;">' . $company->date_into . '</td>
       <td style="border: 1px solid; padding:10px;">' . $company->name_asset . '</td>
       <td style="border: 1px solid; padding:10px;">' . $company->detail . '</td>
       <td style="border: 1px solid; padding:10px;">' . $company->unit . '</td>
       <td style="border: 1px solid; padding:10px;">' . $company->place . '</td>
       <td style="border: 1px solid; padding:10px;">' . $company->per_price . '</td>
       <td style="border: 1px solid; padding:10px;">' . $company->status_buy . '</td>
       <td style="border: 1px solid; padding:10px;">' . $company->num_old_asset . '</td>
       </tr>
      ';
        }
        $output .= '</table>';
        return $output;   
        */
    }


    public function destroyImg($id)
    {
        $images = Image::findOrFail($id);
        if (File::exists("images/" . $images->image)) {
            File::delete("images/" . $images->image);
        }
        $images->delete();
        return response()->json(['success' => 'Image deleted successfully']);
    }
}