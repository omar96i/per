<?php

namespace App\Http\Controllers\Periodo;

use App\Http\Controllers\Controller;
use App\Models\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    public function index(){
        return view('periodos.index');
    }

    public function get(){
        return response()->json(['status' => true, 'periodo' => Periodo::get()]);
    }
    public function getData(Periodo $periodo){
        return response()->json(['periodo' => $periodo]);
    }
    public function update(Periodo $periodo, Request $request){
        $periodo->update($request->all());
        $periodo->save();
        return response()->json(['saved' => true]);
    }


    public function store(Request $request){
        $periodo = Periodo::create($request->post());
        return response()->json([
            'periodo'=>$periodo
        ]);
    }

    public function delete(Periodo $periodo){
        $periodo->delete();
        return response()->json(['status' => true]);
    }

}
