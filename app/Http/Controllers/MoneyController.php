<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Money;
use APP\Http\Requests\CompanyFormRequest;
use App\Models\Cash;
use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use DB;


class MoneyController extends Controller
{
    public function create()
    {
        $monies = Money::all();
        $cashes_list = DB::table('cashes')
            ->groupBy('code_money')
            ->get();

        return view('companies.createdetail', compact('monies'))->with('cashes_list', $cashes_list);
    }


    function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('cashes')
            ->where($select, $value)
            ->groupBy($dependent)
            ->get();
        $output = '<option value="">โปรดเลือก ' . ucfirst($dependent) . '</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->$dependent . '">' . $row->$dependent . '</option>';
        }
        echo $output;
    }



    /*
    public function store(CompanyFormRequest $requset)
    {
        $validatedData = $requset->validated();

        $money = Money::findOrFail($validatedData['money_id']);

        $company = $money->company()->create([
            'money_id' => $validatedData['money_id'],
            'num_asset' => $validatedData['num_asset'],
            'date_into' => $validatedData['date_into'],
            'name_asset' => $validatedData['name_asset'],
            'detail' => Str::detail($validatedData['detail']),
            'unit' => $validatedData['unit'],
            'place' => $validatedData['place'],
            'per_price' => $validatedData['per_price'],
            'status_buy' => $validatedData['status_buy'],
            'num_old_asset' => $validatedData['num_old_asset'],
            'pic' => $validatedData['pic'],
            'fullname' => $validatedData['fullname'],
            'department' => $validatedData['department'],
            'name_info' => $validatedData['name_info'],
            'num_department' => $validatedData['num_department'],
        ]);
        return $company->id;
    }

    */


    public function store(Request $request)
    {
        /*
        $company = new Company;
        $company->num_asset = $request->input('num_asset');
        $company->date_into = $request->input('date_into');
        $company->name_asset = $request->input('name_asset');
        $company->detail = $request->input('detail');
        $company->unit = $request->input('unit');
        $company->place = $request->input('place');
        $company->per_price = $request->input('per_price');
        $company->status_buy = $request->input('status_buy');
        $company->num_old_asset = $request->input('num_old_asset');

        if ($request->hasFile('pic')) {
            $file = $request->file('pic');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extention;
            $file->move('upload/companies/', $fileName);
            $company->pic = $fileName;
        }


        $company->fullname = $request->input('fullname');
        $company->department = $request->input('department');
        $company->name_info = $request->input('name_info');
        $company->num_department = $request->input('num_department');
        $company->save();
        */

        $cash = new Cash;
        $cash->code_money = $request->input('code_money');
        $cash->name_money = $request->input('name_money');
        $cash->budget = $request->input('budget');
        $cash->save();

        $company = new Company;
        $company->num_asset = $request->input('num_asset');
        $company->date_into = $request->input('date_into');
        $company->name_asset = $request->input('name_asset');
        $company->detail = $request->input('detail');
        $company->unit = $request->input('unit');
        $company->place = $request->input('place');
        $company->per_price = $request->input('per_price');
        $company->status_buy = $request->input('status_buy');
        $company->num_old_asset = $request->input('num_old_asset');

        if ($request->hasFile('pic')) {
            $file = $request->file('pic');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('upload/companies/', $fileName);
            $company->pic = $fileName;
        }
        $company->fullname = $request->input('fullname');
        $company->department = $request->input('department');
        $company->name_info = $request->input('name_info');
        $company->num_department = $request->input('num_department');


        $company->code_money_id = $cash->id;
        $company->name_money_id = $cash->id;
        $company->budget = $cash->id;
        $company->save();



        return redirect()->route('companies.index')->with('success', 'เพิ่มครุภัณฑ์สำเร็จแล้ว');
    }
}