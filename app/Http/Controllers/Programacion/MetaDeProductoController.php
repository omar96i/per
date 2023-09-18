<?php

namespace App\Http\Controllers\Programacion;

use App\Http\Controllers\Controller;
use App\Models\Indicador;
use App\Models\MetaDeProducto;
use App\Models\MetaDeProductoEvidencia;
use App\Models\MetaDeProductoHojaDeVida;
use App\Models\MetaDeProductoReporte;
use App\Models\Periodo;
use App\Models\ReportesArchivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MetaDeProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodo_activo = Periodo::getPeriodoActivo(auth()->user()->id);
        return view('programacion.metas.index', compact('periodo_activo'));
    }

    public function get()
    {
        $metas = MetaDeProducto::with('hecho', 'politica', 'programa', 'periodo')->get();

        return response()->json(['metas' => $metas]);
    }

    public function getIndicadores()
    {
        $indicadores = Indicador::all();

        return response()->json(['indicadores' => $indicadores]);
    }

    public function getByUser()
    {
        $metas = MetaDeProducto::with('hecho', 'politica', 'programa', 'periodo')->where('user_id', auth()->user()->id)->get();

        return response()->json(['metas' => $metas]);
    }

    public function store(Request $request)
    {
        MetaDeProducto::create($request->all());

        return response()->json(['status' => true, 'message' => 'Creado correctamente.']);
    }

    public function update(Request $request, $id)
    {
        MetaDeProducto::find($id)->update($request->all());

        return response()->json(['status' => true, 'message' => 'Actualizado correctamente.']);
    }

    public function destroy($id)
    {
        MetaDeProducto::find($id)->delete();

        return response()->json(['status' => true, 'message' => 'Eliminado correctamente.']);
    }

    public function indexEvidencias(){
        $periodo_activo = Periodo::getPeriodoActivo(auth()->user()->id);
        return view('ejecucion_metas.index', compact('periodo_activo'));
    }

    public function showMetaEvidencias(MetaDeProducto $meta){
        $meta->load('indicador', 'proyectos.proyecto', 'reportes', 'hoja_de_vida');

        return view('ejecucion_metas.show', ['meta' => $meta]);
    }

    public function storeReportes(Request $request){
        $metaEvidencia = MetaDeProductoReporte::create([
            'meta_producto_id' => $request->input('meta_producto_id'),
            'fecha_reporte' => $request->input('fecha_reporte'),
            'meta_alcanzada' => $request->input('meta_alcanzada'),
            'actividad' => $request->input('actividad'),
        ]);

        return response()->json(['status' => true, 'message' => 'Creado correctamente.']);
    }

    public function updateReportes(Request $request, $id){
        MetaDeProductoReporte::find($id)->update($request->all());

        return response()->json(['status' => true, 'message' => 'Actualizado correctamente.']);
    }

    public function storeEvidencias(Request $request){
        if ($request->hasFile('archivos')) {
            foreach ($request->file('archivos') as $archivo) {
                $nombreArchivo = $archivo->getClientOriginalName();
                $carpetaDestino = $this->obtenerCarpetaDestino($request->input('tipo'));
                $rutaArchivo = $archivo->storeAs($carpetaDestino, $nombreArchivo, 'public');

                // guardar registro
                ReportesArchivo::create([
                    'reporte_id' => $request->reporte_id,
                    'tipo' => $request->tipo,
                    'route_name' => $nombreArchivo
                ]);
            }
            return response()->json(['status' => true, 'message' => 'Evidencia cargada con éxito']);
        }else{
            return response()->json(['status' => true, 'message' => "no tengo archivo"]);
        }
    }

    public function getEvidencias(MetaDeProductoReporte $reporte){
        $reporte->load('evidencias');
        $evidencias = $reporte->evidencias;

        return response()->json(['evidencias' => $evidencias]);
    }

    public function storeHojaDeVida(Request $request){
        MetaDeProductoHojaDeVida::create($request->all());

        return response()->json(['status' => true, 'message' => 'Creado correctamente.']);
    }

    public function updateHojaDeVida(Request $request, $id){
        MetaDeProductoHojaDeVida::find($id)->update($request->all());

        return response()->json(['status' => true, 'message' => 'Actualizado correctamente.']);
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

    public function deleteEvidencias(ReportesArchivo $evidencia)
    {
        Storage::disk('public')->delete($this->obtenerCarpetaDestino($evidencia->tipo) . '/' . $evidencia->route_name);

        $evidencia->delete();

        return response()->json(['status' => true, 'message' => 'Eliminado correctamente.']);
    }

    public function descargar($id)
    {
        $archivo = ReportesArchivo::find($id);

        if (Storage::disk('public')->exists($this->obtenerCarpetaDestino($archivo->tipo) . '/' . $archivo->route_name)) {
            return Storage::disk('public')->download($this->obtenerCarpetaDestino($archivo->tipo) . '/' . $archivo->route_name);
        } else {
            return response()->json(['error' => 'Archivo no encontrado'], 404);
        }
    }
}
