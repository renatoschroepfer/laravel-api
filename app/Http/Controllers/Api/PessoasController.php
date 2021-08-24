<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidaPessoa;
use App\Models\Pessoa;
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


        // dd($request);       
        // Pessoa::create($request->all());

        $pessoa = new Pessoa();

        $pessoa->nome = $request->nome;
        $pessoa->email = $request->email;

        $pessoa->save();

        return response()->json([
            'message' => 'Usuario cadastrado com sucesso!',
        ], 201);
    }

    public function show($id)
    {
        return Pessoa::findOrFail($id);
    }


    public function update(Request $request, $id)
    {
        $Pessoa = Pessoa::findorFail($id);
        $Pessoa->update($request->all());
    }

    public function destroy($id)
    {
        $Pessoa = Pessoa::findOrFail($id);
        $Pessoa->delete();
    }
}