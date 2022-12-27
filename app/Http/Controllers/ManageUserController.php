<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    public function index()
    {
        $data['user'] = User::orderBy('id', 'asc')->paginate(10);
        return view('user.index', $data);
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'num_position' => 'required',
            'position' => 'required',
            'department' => 'required',
            'task' => 'required',
            'password' => 'required',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->num_position = $request->num_position;
        $user->position = $request->position;
        $user->department = $request->department;
        $user->task = $request->task;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('user.index')->with('success', 'แก้ไขผู้ใช้งานสำเร็จแล้ว');
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'ลบผู้ใช้งานสำเร็จแล้ว');
    }
}