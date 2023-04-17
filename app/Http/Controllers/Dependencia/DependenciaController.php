<?php

namespace App\Http\Controllers\Dependencia;

use App\Http\Controllers\Controller;
use App\Models\Dependencia;
use Illuminate\Http\Request;

class DependenciaController extends Controller
{
    public function index(){
        return view('Dependencia.index');
    }

    public function get(){
        return response()->json(['status' => true, 'dependencia' => Dependencia::get()]);
    }
    public function getData(Dependencia $dependencia){
        return response()->json(['data' => $dependencia]);
    }
    public function update(Dependencia $dependencia, Request $request){
        $dependencia->update($request->all());
        $dependencia->save();
        return response()->json(['saved' => true]);
    }


    public function store(Request $request){
        $dependencia = new Dependencia($request->all());
        $dependencia->save();
        return response()->json(['status' => true]);
    }

    public function delete(Dependencia $dependencia){
        $user->delete();
        return response()->json(['status' => true]);
    }
    
}
