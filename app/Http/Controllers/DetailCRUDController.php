<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Detail_Asset;
use App\Models\Money;
use Redirect;

class DetailCRUDController extends Controller
{
    public function index()
    {
        $data['companies'] = Company::orderBy('id', 'asc')->paginate(1);
        return view('companies.detail', $data);


        // return Redirect::to('companies.detail', $data)->withInput();
        //return view('detail_companies.detailIndex', compact('Detail_Asset'));
    }

    /*public function edit(Company $company)
    {
        return view('companies.detail', compact('company'));
    }*/


    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies.detail', compact('company'));
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

    public function create()
    {
        $monies = Money::all();
        return view('companies.createdetail', compact('monies'));
    }

    public function store(Request $request)
    {
        $detail_asset = new Detail_Asset;
        $detail_asset->num_asset = $request->input('num_asset');
        $detail_asset->date_into = $request->input('date_into');
        $detail_asset->name_asset = $request->input('name_asset');
        $detail_asset->detail = $request->input('detail');
        $detail_asset->unit = $request->input('unit');
        $detail_asset->place = $request->input('place');
        $detail_asset->per_price = $request->input('per_price');
        $detail_asset->status_buy = $request->input('status_buy');
        $detail_asset->num_old_asset = $request->input('num_old_asset');

        if ($request->hasFile('pic')) {
            $uploadFile = 'upload/companies/';

            foreach ($request->file('pic') as $picFile) {
                $extention = $picFile->getClientOriginalExtension();
                $fileName = time() . '.' . $extention;
                $picFile->move($uploadFile, $fileName);
                $finalImageFile = $uploadFile . '-' . $fileName;
                $detail_asset->pic->create([
                    'pic' => $finalImageFile,
                ]);
            }


            /*  
          $file = $request->file('pic');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extention;
            $file->move($uploadFile, $fileName);
            $detail_asset->pic = $fileName;
            */
        }
        $detail_asset->save();

        return redirect()->route('companies.index')->with('success', 'เพิ่มครุภัณฑ์สำเร็จแล้ว');
    }
}