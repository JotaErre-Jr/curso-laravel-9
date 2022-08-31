<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user =  User::get();
        return view('users.index', compact('users'));
        // dd($user);
        return view('users.index');
    }

    public function show($id){
        if(!$user = User::find($id))
            return redirect()->route('users.index');
        return view('users.show', compact('user'));
        // dd('users.show', $id);
    }
}
