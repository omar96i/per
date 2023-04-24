<?php

namespace App\Http\Controllers\Unidad;

use App\Http\Controllers\Controller;
use App\Models\Unidades;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    public function index(){
        return view('unidades.index');
    }

    public function get(){
        return response()->json(['status' => true, 'unidad' => Unidades::get()]);
    }
    public function getData(Unidades $unidad){
        return response()->json(['unidad' => $unidad]);
    }
    public function update(Unidades $unidad, Request $request){
        $unidad->update($request->all());
        $unidad->save();
        return response()->json(['saved' => true]);
    }


    public function store(Request $request){
        $unidad = Unidades::create($request->post());
        return response()->json([
            'unidad'=>$unidad
        ]);
    }

    public function delete(Unidades $unidad){
        $unidad->delete();
        return response()->json(['status' => true]);
    }

}
