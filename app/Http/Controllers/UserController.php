<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getUser();
        $data['header_title'] = "Users list";
        return view('users.users.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New User";
        return view('users.users.add', $data);
    }
    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users'
        ]);
        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('users/users/list')->with("success", "User successfully created");
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord'])) {
            $data['header_title'] = "Edit User";
            return view('users.users.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id
        ]);
        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if(!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect('users/users/list')->with("success", "User successfully updated");
    }

    public function delete($id)
    {
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect('users/users/list')->with("success", "User successfully deleted");
    }
}
