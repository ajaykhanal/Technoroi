<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect('/login')->with('success',"You have been loggedout successfully!!");
    }

    public function users_list(){
        $users= User::all();
        return view('users_list',compact('users'));
    }

    public function update_user($id){
        $user= User::find($id);
        return view('update_user',compact('user'));
    }

    public function role_updated(Request $request, $id){
        $user= User::find($id);
        $user->role_as= $request->role_as?1:0;
        $user->update();
        return redirect('/users-list')->with('success',"Role has been updated");
    }
}
