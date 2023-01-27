<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    function search(Request $request)
    {
        $request->validate([
            'query' => 'required'
        ]);

        $search_text = $request->input('query');
        $brings = DB::table('brings')
            ->where('fullname', 'LIKE', "%$search_text%")
            ->orWhere('num_asset', 'LIKE', "%$search_text%")
            ->orWhere('name_asset', 'LIKE', "%$search_text%")
            ->orWhere('num_sent', 'LIKE', "%$search_text%")
            ->orWhere('department', 'LIKE', "%$search_text%")
            ->orWhere('num_department', 'LIKE', "%$search_text%")
            ->orWhere('place', 'LIKE', "%$search_text%")
            ->paginate(10);
        return view('bring.index', ['brings' => $brings]);
    }

    //ค้นหาหน้าการเบิก member
    function searchMember(Request $request)
    {
        $request->validate([
            'query' => 'required'
        ]);

        $search_text = $request->input('query');
        $brings = DB::table('brings')
            ->where('fullname', 'LIKE', "%$search_text%")
            ->orWhere('num_asset', 'LIKE', "%$search_text%")
            ->orWhere('name_asset', 'LIKE', "%$search_text%")
            ->orWhere('num_sent', 'LIKE', "%$search_text%")
            ->orWhere('department', 'LIKE', "%$search_text%")
            ->orWhere('num_department', 'LIKE', "%$search_text%")
            ->orWhere('place', 'LIKE', "%$search_text%")
            ->paginate(10);
        return view('bring.member', ['brings' => $brings]);
    }



    function find(Request $request)
    {
        $request->validate([
            'query' => 'required'
        ]);

        $search_text = $request->input('query');
        $companies = DB::table('companies')->where('num_asset', 'LIKE', "%$search_text%")
            ->orWhere('name_asset', 'LIKE', "%$search_text%")
            ->orWhere('fullname', 'LIKE', "%$search_text%")
            ->orWhere('department', 'LIKE', "%$search_text%")
            ->orWhere('num_old_asset', 'LIKE', "%$search_text%")
            ->orWhere('place', 'LIKE', "%$search_text%")
            ->orWhere('num_department', 'LIKE', "%$search_text%")
            ->paginate(10);

        return view('companies.searchAdmin', ['companies' => $companies]);
    }

    //การค้นหาหน้า Memebr หน้าหลัก
    function finduser(Request $request)
    {
        $request->validate([
            'query' => 'required'
        ]);

        $search_text = $request->input('query');
        $companies = DB::table('companies')->where('num_asset', 'LIKE', "%$search_text%")
            ->orWhere('name_asset', 'LIKE', "%$search_text%")
            ->orWhere('fullname', 'LIKE', "%$search_text%")
            ->orWhere('department', 'LIKE', "%$search_text%")
            ->orWhere('num_old_asset', 'LIKE', "%$search_text%")
            ->orWhere('place', 'LIKE', "%$search_text%")
            ->orWhere('num_department', 'LIKE', "%$search_text%")
            ->paginate(10);
        return view('companies.member', ['companies' => $companies]);
    }



    function get_companies()
    {
        $companies = DB::table('companies')
            ->limit(10)
            ->get();
        return $companies;
    }

    function pdf(Request $request)
    {
        $id = $request->id;
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_companies_to_html($id));
        return $pdf->stream();
    }

    function convert_companies_to_html($id)
    {
        $companies = Company::find($id);
        return view('PDF.searchAdmin')->with('companies', $companies);
    }
}