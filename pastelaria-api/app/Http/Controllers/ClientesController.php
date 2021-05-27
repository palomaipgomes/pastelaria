<?php

namespace App\Http\Controllers;
use App\Models\Cliente;

use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return response()->json($clientes);
    }

    public function show($id)
    {
        $clientes = Cliente::find($id);

        if(!$clientes) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response()->json($clientes);
    }

    public function store(Request $request)
    {
        $clientes = new Cliente();
        $clientes->fill($request->all());
        $clientes->save();

        return response()->json($clientes, 201);
    }

    public function update(Request $request, $id)
    {
        $clientes = Cliente::find($id);

        if(!$cliente) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $pasteis->fill($request->all());
        $pasteis->save();

        return response()->json($clientes);
    }

    public function destroy($id)
    {
        $clientes = Cliente::find($id);

        if(!$clientes) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $clientes->delete();
    }
}

