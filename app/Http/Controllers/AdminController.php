<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//Models being used
use App\User;


class AdminController extends Controller
{
    //Pagina inicio del admin de usuarios
    //Read
    public function index(){
    	$users = User::orderBy('created_at', 'asc')->get();

        return view("admin.users",['users' => $users]);
    }
}
