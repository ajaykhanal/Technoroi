<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserBackendController extends Controller
{
    public function user_dashboard(){
        return view("backend.user.pages.dashboard");
    }
}
