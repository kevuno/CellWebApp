<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    //
    public manageUsers(){
        return view("admin.users")
    }
}
