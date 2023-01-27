<?php

namespace App\Http\Controllers;

use App\Models\Bring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class BringController extends Controller
{
    public function index()
    {
        $data['brings'] = Bring::orderBy('id', 'asc')->paginate(10);
        return view('bring.index', $data);
    }

    public function member()
    {
        $data['brings'] = Bring::orderBy('id', 'asc')->paginate(10);
        return view('bring.member', $data);
    }

    public function create()
    {
        $brings = Bring::all();
        return view('bring.create', compact('brings'));
    }

    public function store(Request $request)
    {

        // Validate การเบิกครุภัณฑ์
        $request->validate([
            'FullName' => 'required|string|max:255',
            'date_bring' => 'required|date',
            'detail' => 'required|string|max:255',
            'num_asset' => 'required|string|regex:/^\d{12}-\d{5}-\d{5}$/',
            'name_asset' =>   'required|string|max:255',
            'per_price' =>  'required|numeric|regex:/^[0-9]{1,8}(\.[0-9]{2})?$/',
            'num_sent' => 'required|string|max:255',
            'Date_into' => 'required|date',
            'department' => 'sometimes|required|string',
            'num_department' => 'required|string|regex:/^[0-9]{3,5}$/',
            'place' => 'required|string|max:255',
        ]);


        $brings = new Bring;
        $brings->FullName = $request->input('FullName');
        $brings->date_bring = $request->input('date_bring');
        $brings->detail = $request->input('detail');
        $brings->num_asset = $request->input('num_asset');
        $brings->name_asset = $request->input('name_asset');
        $brings->per_price = $request->input('per_price');
        $brings->num_sent = $request->input('num_sent');
        $brings->Date_into = $request->input('Date_into');
        $brings->department = $request->input('department');
        $brings->num_department = $request->input('num_department');
        $brings->place = $request->input('place');
        /*
        if ($request->hasFile('pic')) {
            $uploadFile = 'upload/brings/';

            foreach ($request->file('pic') as $picFile) {
                $extention = $picFile->getClientOriginalExtension();
                $fileName = time() . '.' . $extention;
                $picFile->move($uploadFile, $fileName);
                $finalImageFile = $uploadFile . '-' . $fileName;
                $brings->pic->create([
                    'pic' => $finalImageFile,
                ]);
            }
        }
        */
        $brings->save();

        return redirect()->route('bring.index')->with('success', 'เพิ่มการเบิกครุภัณฑ์สำเร็จแล้ว');
    }


    public function edit($id)
    {
        $brings = Bring::find($id);
        return view('bring.edit', compact('brings'));
    }

    public function update(Request $request, $id)
    {

        // Validate การเบิกครุภัณฑ์
        $request->validate([
            'FullName' => 'required|string|max:255',
            'date_bring' => 'required|date',
            'detail' => 'required|string|max:255',
            'num_asset' => 'required|string|regex:/^\d{12}-\d{5}-\d{5}$/',
            'name_asset' =>   'required|string|max:255',
            'per_price' =>  'required|numeric|regex:/^[0-9]{1,8}(\.[0-9]{2})?$/',
            'num_sent' => 'required|string|max:255',
            'Date_into' => 'required|date',
            'department' => 'required_if:select_field,selected_value',
            'num_department' => 'required|string|regex:/^[0-9]{3,5}$/',
            'place' => 'required|string|max:255',
        ]);



        $brings = Bring::find($id);
        $brings->FullName = $request->input('FullName');
        $brings->date_bring = $request->input('date_bring');
        $brings->detail = $request->input('detail');
        $brings->num_asset = $request->input('num_asset');
        $brings->name_asset = $request->input('name_asset');
        $brings->per_price = $request->input('per_price');
        $brings->num_sent = $request->input('num_sent');
        $brings->Date_into = $request->input('Date_into');
        $brings->department = $request->input('department');
        $brings->num_department = $request->input('num_department');
        $brings->place = $request->input('place');
        /*
        if ($request->hasFile('pic')) {
            $uploadFile = 'upload/brings/';

            foreach ($request->file('pic') as $picFile) {
                $extention = $picFile->getClientOriginalExtension();
                $fileName = time() . '.' . $extention;
                $picFile->move($uploadFile, $fileName);
                $finalImageFile = $uploadFile . '-' . $fileName;
                $brings->pic->create([
                    'pic' => $finalImageFile,
                ]);
            }
        }
        */

        $brings->update();
        return redirect()->route('bring.index')->with('success', 'แก้ไขการเบิกครุภัณฑ์สำเร็จแล้ว');
    }


    public function destroy($id)
    {
        $brings = Bring::find($id);
        /*
        $destination = 'upload/companies/' . $brings->pic;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        */
        $brings->delete();
        return redirect()->route('bring.index')->with('success', 'ลบการเบิกครุภัณฑ์สำเร็จแล้ว');
    }
}