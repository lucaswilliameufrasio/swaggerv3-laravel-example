<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use Illuminate\Http\Request;

class DespesaController extends Controller
{
    public function listarDespesas()
    {
        $despesa = Despesa::get();

        // dd($despesa);

        return response()->json([
            'data' => $despesa,
        ], 200,
            ['Content-type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    public function registrarDespesa(Request $request)
    {
        $despesa = Despesa::create([
            'titulo' => $request->titulo,
            'data' => $request->data,
            'quantidade' => $request->quantidade,
            'valor' => $request->valor,
            'tipo' => $request->tipo,
            'user' => 1,
        ]);
        return response()->json([
            'data' => $despesa,
        ], 200,
            ['Content-type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    public function atualizarDespesa(Request $request, $id)
    {
        Despesa::where('id', $id)->update([
            'titulo' => $request->titulo,
            'data' => $request->data,
            'quantidade' => $request->quantidade,
            'valor' => $request->valor,
            'tipo' => $request->tipo,
        ]);
        $despesa = Despesa::get();

        return response()->json([
            'data' => $despesa,
        ], 200,
            ['Content-type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    public function removerDespesa($id)
    {
        // $deleta = Despesa::findOrFail($id)->delete();
        $deleta = Despesa::where('id', $id)->delete();

        if(!$deleta){
            return response()->json([
                'data' => 'Não foi encontrado nenhum registro.',
            ], 404,
                ['Content-type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
        }

        $despesa = Despesa::get();

        return response()->json([
            'data' => $despesa,
        ], 200,
            ['Content-type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }
}
