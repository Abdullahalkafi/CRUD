<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
   public function index()
    {
        $users = User::all();

        return response()->json(
            [
                'status' => 'success',
                'users' => $users->toArray()
            ], 200);


    }

    // add book
    public function add(Request $request)
    {
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'user_type' => $request->input('user_type')
        ]);
        $user->save();

        return response()->json('The user successfully added');
    }

    // edit book
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    // update book
    public function update($id, Request $request)
    {
       $user = User::find($id);
        $user->update($request->all());

        return response()->json('The user successfully updated');
    }
    public function show(Request $request, $id)
    {
        $user = User::find($id);
        return response()->json(
            [
                'status' => 'success',
                'user' => $user->toArray()
            ], 200);
    }

    // delete book
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('user_list')->with('status',"The user data delete successfully");
    }
}
