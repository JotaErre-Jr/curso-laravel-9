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

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        
        $user = User::create($data);
        return redirect()->route('users.index');


        
        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->save();
    }
}
