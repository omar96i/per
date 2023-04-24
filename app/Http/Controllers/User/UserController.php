<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('Users.index');
    }

    public function get(){
        return response()->json(['status' => true, 'user' => User::get()]);
    }
    public function getData(User $user){
        return response()->json(['user' => $user]);
    }
    public function update(User $user, Request $request){
        $user->update($request->all());
        $user->save();
        return response()->json(['saved' => true]);
    }


    public function store(Request $request){
        $user = User::create($request->post());
        return response()->json([
            'user'=>$user
        ]);
    }

    public function delete(User $user){
        $user->delete();
        return response()->json(['status' => true]);
    }
    
}
