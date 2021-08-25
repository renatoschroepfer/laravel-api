<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidaPessoa;
use App\Models\Pessoa;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class PessoasController extends Controller
{

    public function index()
    {
        return Pessoa::all();
    }

    public function store(ValidaPessoa $request)

    {
        Pessoa::create($request->all());

        return response()->json([
            'mensagem' => 'Usuario cadastrado com sucesso!',
        ], 201);
    }

    public function show($id)
    {
        return Pessoa::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $Pessoa = Pessoa::findOrFail($id);
        $Pessoa->update($request->all());

        return response()->json([
            'mensagem' => 'Dados alterado com sucesso!',
        ], 200);
    }

    public function destroy($id)
    {
        try {

            $Pessoa = Pessoa::findOrFail($id);
            $Pessoa->delete();
        } catch (ModelNotFoundException $e) {

            return response()->json([
                'mensagem' => 'Id informado não encontrado!',

            ], 200);
        }

        return response()->json([
            'mensagem' => 'Dados deletado com sucesso!',
        ], 200);
    }
}