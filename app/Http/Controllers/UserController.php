<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUseFormRequest;
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
        // dd('users.show', $id);
    }

    public function create(){
        return view('users.create');
    }

    public function store(StoreUpdateUseFormRequest $request){
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

    public function edit($id){
        if(!$user = User::find($id))
            return redirect()->route('users.index');
        return view('users.edit', compact('user'));

    }

    public function update(StoreUpdateUseFormRequest $request, $id){
        if(!$user = User::find($id))
            return redirect()->route('users.index');
        $data = $request->only('name', 'email');
        if($request->password)
            $data['password'] = bcrypt($request->password);

        $user->update($data);
        return redirect()->route('users.index');    

    }


}
