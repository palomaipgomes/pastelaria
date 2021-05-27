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
        $pasteis->nome = $request->nome;
        $pasteis->preco = $request->preco;

        if($request->hasFile('foto')){
            $name = Str::random(15). '.' . $request->foto->extension();

            $path = $request->foto->storeAs('image_uploads', $name, 'public');

            $pasteis->foto = asset('img/pasteis').$path;
        }

        if($pasteis->save()){
            return response()->json([
                'message'   => 'Cadastro com sucesso!',
            ]);
        }else{
            return response()->json([
                'message'   => 'Erro ao cadastrar, tente novamente em alguns minutos!',
            ]);
        }


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

        $pasteis->nome = $request->nome;
        $pasteis->preco = $request->preco;

        if($request->hasFile('foto')){
            $name = Str::random(15). '.' . $request->foto->extension();

            $path = $request->foto->storeAs('image_uploads', $name, 'public');

            $pasteis->foto = asset('img/pasteis').$path;
        }

        if($pasteis->save()){
            return response()->json([
                'message'   => 'Atualizado com sucesso!',
            ]);
        }else{
            return response()->json([
                'message'   => 'Erro ao atualizar, tente novamente em alguns minutos!',
            ]);
        }

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
