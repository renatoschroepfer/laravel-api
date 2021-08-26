<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarUsuarioRequest;
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

    public function store(ValidarUsuarioRequest $request)

    {
        Pessoa::create($request->all());

        return response()->json([
            'mensagem' => 'Usuario cadastrado com sucesso!',
        ], 201);
    }

    public function show($id)
    {
        try {
            return Pessoa::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'mensagem' => 'O id informado não existe!',
            ]);
        }
    }

    public function update(Request $request, $id)
    {

        try {
            $Pessoa = Pessoa::findOrFail($id);
            $Pessoa->update($request->all());
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'mensagem' => 'Você não pode atualizar os dados. O id informado não existe!',
            ]);
        }


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
                "mensagem" => "O id informado não existe!",

            ], 404);
        }

        return response()->json([
            'mensagem' => 'Dados deletado com sucesso!',
        ], 200);
    }
}