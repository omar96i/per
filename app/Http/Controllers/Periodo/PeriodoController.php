<?php

namespace App\Http\Controllers\Periodo;

use App\Http\Controllers\Controller;
use App\Models\Periodo;
use App\Models\UserPeriodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    public function index(){
        return view('periodos.index');
    }

    public function get(){
        return response()->json(['status' => true, 'periodo' => Periodo::with('users.user')->get()]);
    }

    public function getUserPeriodo()
    {
        $periodo = UserPeriodo::where('user_id', auth()->user()->id)
            ->with(['periodo' => function($query) {
                $query->where('estado', 'activo');
            }])
        ->first();


        return response()->json(['periodo' => $periodo]);
    }

    public function getData(Periodo $periodo){
        return response()->json(['periodo' => $periodo]);
    }
    public function update(Periodo $periodo, Request $request){
        if($request->estado == 'activo'){
            $aux = Periodo::where('estado', 'activo')->get()->first();
            if($aux){
                $aux->estado = "inactivo";
                $aux->update();
            }

        }
        $periodo->update($request->all());
        $periodo->save();
        return response()->json(['saved' => true]);
    }


    public function store(Request $request){
        if($request->estado == 'activo'){
            $aux = Periodo::where('estado', 'activo')->get()->first();
            if($aux){
                $aux->estado = "inactivo";
                $aux->update();
            }
        }
        $periodo = Periodo::create($request->post());
        return response()->json([
            'periodo'=>$periodo
        ]);
    }

    public function asignar(Request $request){
        $relacion = new UserPeriodo($request->all());
        $relacion->save();
        return response()->json(['status' => true, 'periodo' => Periodo::with('users.user')->find($request->periodo_id)]);
    }

    public function deleteAsignacion(UserPeriodo $relacion){
        $periodo = Periodo::with('users.user')->find($relacion->periodo_id);
        $relacion->delete();
        return response()->json(['status' => true, 'periodo' => $periodo]);
    }

    public function delete(Periodo $periodo){
        $periodo->delete();
        return response()->json(['status' => true]);
    }

}
