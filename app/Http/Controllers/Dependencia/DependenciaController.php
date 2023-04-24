<?php

namespace App\Http\Controllers\Dependencia;

use App\Http\Controllers\Controller;
use App\Models\Dependencias;
use Illuminate\Http\Request;

class DependenciaController extends Controller
{
    public function index(){
        return view('Dependencias.index');
    }

    public function get(){
        return response()->json(['status' => true, 'dependencia' => Dependencias::get()]);
    }
    public function getData(Dependencias $dependencia){
        return response()->json(['dependencia' => $dependencia]);
    }
    public function update(Dependencias $dependencia, Request $request){
        $dependencia->update($request->all());
        $dependencia->save();
        return response()->json(['saved' => true]);
    }


    public function store(Request $request){
        $dependencia = Dependencias::create($request->post());
        return response()->json([
            'dependencia'=>$dependencia
        ]);
    }

    public function delete(Dependencias $dependencia){
        $dependencia->delete();
        return response()->json(['status' => true]);
    }
    
}
