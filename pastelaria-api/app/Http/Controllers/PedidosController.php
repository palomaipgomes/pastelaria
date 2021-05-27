<?php

namespace App\Http\Controllers;
use App\Models\Pedido;

use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with('cliente', 'pastel')->get();
        return response()->json($pedidos);
    }

    public function show($id)
    {
        $pedidos = Pedido::with('cliente', 'pastel')->find($id);

        if(!$pedidos) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response()->json($pedidos);
    }

    public function store(Request $request)
    {
        $pedidos = new Pedido();
        $pedidos->fill($request->all());
        $pedidos->save();

        return response()->json($pedidos, 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $pedidos = Pedido::findOrFail($id);

            $pedidos->fill($request->all());
            $pedidos->save();

            return response()->json($pedidos);
        } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            response()->json($e);
        }
    }

    public function destroy($id)
    {
        $pedidos = Pedido::find($id);

        if(!$pedidos) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $pedidos->delete();
    }
}