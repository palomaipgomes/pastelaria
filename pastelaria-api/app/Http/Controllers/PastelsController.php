<?php

namespace App\Http\Controllers;
use App\Models\Pastel;

use Illuminate\Http\Request;

class PastelsController extends Controller
{
    public function index()
    {
        $pasteis = Pastel::all();
        return response()->json($pasteis);
    }

    public function show($id)
    {
        $pasteis = Pastel::find($id);

        if(!$pasteis) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response()->json($pasteis);
    }

    public function store(Request $request)
    {
        $pasteis = new Pastel();
        $pasteis->fill($request->all());
        $pasteis->save();

        return response()->json($pasteis, 201);
    }

    public function update(Request $request, $id)
    {
        $pasteis = Pastel::find($id);

        if(!$pasteis) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $pasteis->fill($request->all());
        $pasteis->save();

        return response()->json($pasteis);
    }

    public function destroy($id)
    {
        $pasteis = Pastel::find($id);

        if(!$pasteis) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $pasteis->delete();
    }
}
