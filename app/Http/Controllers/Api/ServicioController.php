<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::all();

        return response()->json([
            'success' => true,
            'message' => 'Lista de servicios',
            'data' => $servicios
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Servicio $servicio)
    {
        $validator = Validator::make($request->all(), [
            'clave_ext' => 'nullable',
            'nombre' => 'required',
            'codigo' => 'nullable',
            'codigo_sat' => 'required',
            'unidad' => 'nullable',
            'unidad_sat' => 'required',
            'almacenable' => 'nullable',
            'precio' => 'required',
            'costo' => 'nullable',
            'tipo' => 'required',
            'iva' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Hay un problema con los datos',
                'data' => $validator->errors()
            ], 400);
        }

        $servicio = new Servicio();
        $servicio->clave_ext = $request->clave_ext;
        $servicio->nombre = $request->nombre;
        $servicio->codigo = $request->codigo;
        $servicio->codigo_sat = $request->codigo_sat;
        $servicio->unidad = $request->unidad;
        $servicio->unidad_sat = $request->unidad_sat;
        $servicio->almacenable = $request->almacenable;
        $servicio->precio = $request->precio;
        $servicio->costo = $request->costo;
        $servicio->tipo = $request->tipo;
        $servicio->iva = $request->iva;
        $servicio->save();

        if ($servicio->save()) {
            return response()->json([
                'message' => 'Servicio creado',
                'data' => $servicio,
                'status' => '201'
            ], 201);
        }
        return response()->json([
            'message' => 'Servicio no creado',
            'data' => $servicio,
            'status' => '500'
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio, Int $id)
    {
        $servicio = Servicio::find($id);
        if ($servicio) {
            return response()->json([
                'success' => true,
                'message' => 'Servicio encontrado',
                'data' => $servicio
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Servicio no encontrado',
            'data' => null
        ], 404);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicio $servicio, Int $id)
    {
        $validator = Validator::make($request->all(), [
            'clave_ext' => 'nullable',
            'nombre' => 'required',
            'codigo' => 'nullable',
            'codigo_sat' => 'required',
            'unidad' => 'nullable',
            'unidad_sat' => 'required',
            'almacenable' => 'nullable',
            'precio' => 'required',
            'costo' => 'nullable',
            'tipo' => 'required',
            'iva' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Hay un problema con los datos',
                'data' => $validator->errors()
            ], 400);
        }

        $servicio = Servicio::find($id);
        $servicio->clave_ext = $request->clave_ext;
        $servicio->nombre = $request->nombre;
        $servicio->codigo = $request->codigo;
        $servicio->codigo_sat = $request->codigo_sat;
        $servicio->unidad = $request->unidad;
        $servicio->unidad_sat = $request->unidad_sat;
        $servicio->almacenable = $request->almacenable;
        $servicio->precio = $request->precio;
        $servicio->costo = $request->costo;
        $servicio->tipo = $request->tipo;
        $servicio->iva = $request->iva;
        $servicio->save();

        if ($servicio->save()) {
            return response()->json([
                'message' => 'Servicio actualizado',
                'data' => $servicio,
                'status' => '201'
            ], 201);
        }
        return response()->json([
            'message' => 'Servicio no actualizado',
            'data' => $servicio,
            'status' => '500'
        ], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Servicio $servicio, Int $id)
    {
        $servicio = Servicio::find($id);
        $servicio->delete();
        return response()->json([
            'success' => true,
            'message' => 'Servicio eliminado',
            'data' => $servicio
        ], 200);
        return response()->json([
            'success' => false,
            'message' => 'Servicio no eliminado',
            'data' => null
        ], 404);
    }

    public function restore(Servicio $servicio, Int $id)
    {
        $servicio = Servicio::withTrashed()->find($id);
        if ($servicio) {
            $servicio->restore();
                return response()->json([
                'success' => true,
                'message' => 'Servicio restaurado',
                'data' => $servicio
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Servicio no restaurado',
            'data' => null
        ], 404);
    }
}
