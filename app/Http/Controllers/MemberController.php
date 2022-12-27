<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function index()
    {
        $data['companies'] = Company::orderBy('id', 'asc')->paginate(10);
        return view('companies.member', $data);
    }


    public function edit($id)
    {
        $company = Company::find($id);
        return view('detail.detail', compact('company'));
    }
}