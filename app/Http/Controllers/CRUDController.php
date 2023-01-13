<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Company;
use App\Models\Money;
use App\Models\Name_Money;
use DB;
use Error;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use LDAP\Result;

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


    /*public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }*/

    public function edit($id)
    {

        $company = Company::find($id);
        /*if (!$company) {
            return redirect()->route('companies.edit')->with('success', 'Company not found');
        }*/

        $cash = Cash::find($id);
        if (!$cash) {

            return redirect()->route('companies.edit')->with('error', 'Cash not found');
        }
        $cashes = Cash::groupBy('code_money')->get();
        if (!$cashes->count()) {
            return redirect()->route('companies.edit')->with('error', 'Cash not found');
        }

        return view('companies.edit', compact(['company', 'cash', 'cashes']));

        /*
        $company = Company::find($id);
        $cash = Cash::find($id)
            ->groupBy('code_money')
            ->get();
        return view('companies.edit', compact(['company', 'cash']))->with('cash', $cash);
        */
    }


    /* public function update(Request $request, $id)
    {
        $request->validate([
            'num_asset' => 'required',
            'name_asset' => 'required',
            'propoty' => 'required',
            'detail' => 'required',
            'unit' => 'required',
            'date_into' => 'required',
            'price' => 'required',
            'place' => 'required',
            'fullname' => 'required',
            'department' => 'required',
            'name_info' => 'required',
            'code_money' => 'required',
            'name_money' => 'required',
            'budget' => 'required',
            'status_buy' => 'required',
            'status_sell' => 'required',
            'num_old_asset' => 'required',
            'num_department' => 'required',
            'per_price' => 'required',
            'pic' => 'required'
        ]);
        $company = Company::find($id);
        $company->num_asset = $request->num_asset;
        $company->name_asset = $request->name_asset;
        $company->propoty = $request->propoty;
        $company->detail = $request->detail;
        $company->unit = $request->unit;
        $company->date_into = $request->date_into;
        $company->price = $request->price;
        $company->place = $request->place;
        $company->fullname = $request->fullname;
        $company->department = $request->department;
        $company->name_info = $request->name_info;
        $company->code_money = $request->code_money;
        $company->name_money = $request->name_money;
        $company->budget = $request->budget;
        $company->status_buy = $request->status_buy;
        $company->status_sell = $request->status_sell;
        $company->num_old_asset = $request->num_old_asset;
        $company->num_department = $request->num_department;
        $company->per_price = $request->per_price;
        $company->pic = $request->pic;
        $company->save();
        return redirect()->route('companies.index')->with('success', 'แก้ไขครุภัณฑ์สำเร็จแล้ว');
    } */


    public function update(Request $request, $id)
    {

        $company = Company::find($id);
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
            $destination = 'upload/companies/' . $company->pic;
            if (File::exists($destination)) {
                File::delete($destination);
            }
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


        $cash = Cash::where('id', $id)->update([
            'code_money' => $request->input('code_money'),
            'name_money' => $request->input('name_money'),
            'budget' => $request->input('budget')

        ]);

        if ($cash > 0) {
            // update was successful

            return redirect()->route('companies.index')->with('success', 'แก้ไขครุภัณฑ์สำเร็จแล้ว');
        } else {
            // update was unsuccessful
            return redirect()->route('companies.index')->with('success', 'ไม่สามารถแก้ไขครุภัณฑ์ได้ กรุณากลับไปกดแก้ไขใหม่อีกรอบ');
        }

        /*
        if ($cash != null) {
            $company->code_money_id = $cash->id;
            $company->name_money_id = $cash->id;
            $company->budget = $cash->id;
        }
*/
        $company->update();
        return redirect()->route('companies.index', ['cash' => $cash])->with('success', 'แก้ไขครุภัณฑ์สำเร็จแล้ว');
    }

    /* public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'ลบครุภัณฑ์สำเร็จแล้ว');
    }*/

    public function destroy($id)
    {
        $company = Company::find($id);
        $destination = 'upload/companies/' . $company->pic;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $company->delete();
        return redirect()->route('companies.index')->with('success', 'ลบครุภัณฑ์สำเร็จแล้ว');
    }

    /* public function search(Request $request)
    {
        if ($request->isMethod('post')) {
            $name = $request->get('name');
            $company = Company::where('num_asset', 'LIKE', '%' . $name . '%')->paginate(10);
        }
        return view('companies.index', compact('company'));
    }
    */
}