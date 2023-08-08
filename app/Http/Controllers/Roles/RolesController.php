<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index(){
        return view('roles.index');
    }

    public function get(){
        return response()->json(['status' => true, 'roles' => Role::get()]);
    }

    public function getData(Role $roles){
        return response()->json(['roles' => $roles]);
    }

    public function update(Role $roles, Request $request){
        $roles->update($request->all());
        $roles->save();
        return response()->json(['saved' => true]);
    }


    public function store(Request $request){
        $roles = Role::create($request->post());
        return response()->json([
            'roles'=>$roles
        ]);
    }

    public function delete(Role $roles){
        $roles->delete();
        return response()->json(['status' => true]);
    }

}
