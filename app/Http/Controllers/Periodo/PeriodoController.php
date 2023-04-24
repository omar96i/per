<?php

namespace App\Http\Controllers\Periodo;

use App\Http\Controllers\Controller;
use App\Models\Periodos;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    public function index(){
        return view('Periodos.index');
    }

    public function get(){
        return response()->json(['status' => true, 'periodo' => Periodos::get()]);
    }
    public function getData(Periodos $periodo){
        return response()->json(['periodo' => $periodo]);
    }
    public function update(Periodos $periodo, Request $request){
        $periodo->update($request->all());
        $periodo->save();
        return response()->json(['saved' => true]);
    }


    public function store(Request $request){
        $periodo = Periodos::create($request->post());
        return response()->json([
            'periodo'=>$periodo
        ]);
    }

    public function delete(Periodos $periodo){
        $periodo->delete();
        return response()->json(['status' => true]);
    }
    
}
