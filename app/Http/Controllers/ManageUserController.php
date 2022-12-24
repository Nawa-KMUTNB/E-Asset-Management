<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    public function index()
    {
        $data['user'] = User::orderBy('id', 'asc')->paginate(10);
        return view('manage.index', $data);
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('manage.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->num_position = $request->input('num_position');
        $user->position = $request->input('position');
        $user->department = $request->input('department');
        $user->task = $request->input('task');
        $user->password = $request->input('password');
        $user->update();
        return redirect()->route('manage.index')->with('success', 'แก้ไขครุภัณฑ์สำเร็จแล้ว');
    }
}