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
            'place' => 'required'

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
            'place' => 'required'
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
        $company->save();
        return redirect()->route('companies.index')->with('success', 'แก้ไขครุภัณฑ์สำเร็จแล้ว');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'ลบครุภัณฑ์สำเร็จแล้ว');
    }
}