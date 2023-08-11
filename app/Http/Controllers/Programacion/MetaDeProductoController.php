<?php

namespace App\Http\Controllers\Programacion;

use App\Http\Controllers\Controller;
use App\Models\MetaDeProducto;
use App\Models\MetaDeProductoEvidencia;
use Illuminate\Http\Request;

class MetaDeProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('programacion.metas.index');
    }

    public function get()
    {
        $metas = MetaDeProducto::with('hecho', 'politica', 'programa', 'periodo')->get();

        return response()->json(['metas' => $metas]);
    }

    public function getByUser()
    {
        $metas = MetaDeProducto::with('hecho', 'politica', 'programa', 'periodo')->where('user_id', auth()->user()->id)->get();

        return response()->json(['metas' => $metas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MetaDeProducto::create($request->all());

        return response()->json(['status' => true, 'message' => 'Creado correctamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        MetaDeProducto::find($id)->update($request->all());

        return response()->json(['status' => true, 'message' => 'Actualizado correctamente.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MetaDeProducto::find($id)->delete();

        return response()->json(['status' => true, 'message' => 'Eliminado correctamente.']);
    }

    public function indexEvidencias(){
        return view('ejecucion_metas.index');
    }

    public function storeEvidencias(Request $request){
        $archivosNombres = [];

        if ($request->hasFile('archivos')) {
            foreach ($request->file('archivos') as $archivo) {
                $nombreArchivo = $archivo->getClientOriginalName();
                $carpetaDestino = $this->obtenerCarpetaDestino($request->input('tipo'));
                $rutaArchivo = $archivo->store($carpetaDestino, 'public');
                $archivosNombres[] = $nombreArchivo;
            }
        }else{
            return response()->json(['status' => true, 'message' => "no tengo archivo"]);
        }

        $metaEvidencia = MetaDeProductoEvidencia::create([
            'meta_de_producto_id' => $request->input('meta_de_producto_id'),
            'meta_alcanzada' => $request->input('meta_alcanzada'),
            'nueva_actividad' => $request->input('nueva_actividad'),
            'localizacion' => $request->input('localizacion'),
            'linea_base' => $request->input('linea_base'),
            'definiciones' => $request->input('definiciones'),
            'medicion' => $request->input('medicion'),
            'formula' => $request->input('formula'),
            'variables' => $request->input('variables'),
            'fuente' => $request->input('fuente'),
            'poblacion' => $request->input('poblacion'),
            'periocidad' => $request->input('periocidad'),
            'observaciones' => $request->input('observaciones'),
            'actividades_realizadas' => $request->input('actividades_realizadas'),
            'codigo' => $request->input('codigo'),
            'tipo' => $request->input('tipo'),
            'archivos' => json_encode($archivosNombres),
        ]);

        return response()->json(['message' => 'Evidencia guardada con éxito']);

    }

    protected function obtenerCarpetaDestino($tipo)
    {
        if ($tipo === 'imagen') {
            return 'imagenes';
        } elseif ($tipo === 'documento') {
            return 'documentos';
        } elseif ($tipo === 'video') {
            return 'videos';
        } else {
            return 'otros';
        }
    }

    public function indexEvidenciasForm(MetaDeProducto $meta){
        return view('ejecucion_metas.form', ['meta' => $meta]);
    }
}
