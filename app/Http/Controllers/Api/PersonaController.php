<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personas = Persona::all();

        return response()->json([
            'success' => true,
            'message' => 'Lista de personas',
            'data' => $personas
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'alias' => 'required',
            'email' => 'required',
            'rfc' => 'required',
            'numero_ext' => 'required',
            'numero_int' => 'required',
            'direccion' => 'required',
            'tipo_persona' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Faltan datos',
                'data' => $validator->errors()
            ], 400);
        }

        $persona = new Persona();
        $persona->nombre = $request->nombre;
        $persona->alias = $request->alias;
        $persona->email = $request->email;
        $persona->rfc = $request->rfc;
        $persona->numero_ext = $request->numero_ext;
        $persona->numero_int = $request->numero_int;
        $persona->direccion = $request->direccion;
        $persona->tipo_persona = $request->tipo_persona;
        $persona->save();

        if ($persona->save()) {
            return response()->json([
                'message' => 'Persona creada',
                'data' => $persona,
                'status' => '201'
            ], 201);
        }
        return response()->json([
            'message' => 'Persona no creada',
            'data' => $persona,
            'status' => '500'
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona, Int $id)
    {   
        $persona = Persona::find($id);
        if ($persona) {
            return response()->json([
                'success' => true,
                'message' => 'Persona encontrada',
                'data' => $persona
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Persona no encontrada',
            'data' => null
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persona $persona, Int $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'alias' => 'required',
            'email' => 'required',
            'rfc' => 'required',
            'numero_ext' => 'required',
            'numero_int' => 'required',
            'direccion' => 'required',
            'tipo_persona' => 'required',
        ]);

        if($validator->fails())
        return response()->json([
            "msg"=>"Error en las validaciones",
            "data"=>$validator->errors(),
            "status"=>406,
        ],406);

        $persona = Persona::find($id);
        if ($persona) {
            $persona->nombre = $request->nombre;
            $persona->alias = $request->alias;
            $persona->email = $request->email;
            $persona->rfc = $request->rfc;
            $persona->numero_ext = $request->numero_ext;
            $persona->numero_int = $request->numero_int;
            $persona->direccion = $request->direccion;
            $persona->tipo_persona = $request->tipo_persona;
            $persona->save();
            return response()->json([
                'success' => true,
                'message' => 'Persona actualizada',
                'data' => $persona
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Persona no encontrada',
            'data' => null
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Persona $persona, Int $id)
    {
        $persona = Persona::find($id);
        if ($persona) {
            $persona->delete();
            return response()->json([
                'success' => true,
                'message' => 'Persona eliminada',
                'data' => $persona
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Persona no encontrada',
            'data' => null
        ], 404);
    }

    public function restore(Persona $persona, Int $id)
    {
        $persona = Persona::withTrashed()->find($id);
        if ($persona) {
            $persona->restore();
            return response()->json([
                'success' => true,
                'message' => 'Persona restaurada',
                'data' => $persona
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Persona no encontrada',
            'data' => null
        ], 404);
    }
}
