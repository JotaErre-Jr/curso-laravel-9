<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user =  User::get();
        return view('users.index', compact('user'));
        // dd($user);
        // return view('users.index');
    }

    public function show($id){
        // $user = User::where('id', $id)->first();
        // $user = User::find($id);
        // dd($user);
        if(!$user = User::find($id))
            return redirect()->route('users.index');
        return view('users.show', compact('user'));
        dd('users.show', $id);
    }
}
