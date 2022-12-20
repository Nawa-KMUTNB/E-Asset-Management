<?php

namespace App\Http\Controllers;

use App\Models\Company;
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

    //Store Resource
    public function store(Request $request)
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
            'per_price' => 'required'

        ]);

        $company = new Company;
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
        $company->save();
        return redirect()->route('companies.index')->with('success', 'เพิ่มครุภัณฑ์สำเร็จแล้ว');
    }


    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, $id)
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
            'per_price' => 'required'
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
        $company->save();
        return redirect()->route('companies.index')->with('success', 'แก้ไขครุภัณฑ์สำเร็จแล้ว');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'ลบครุภัณฑ์สำเร็จแล้ว');
    }
}