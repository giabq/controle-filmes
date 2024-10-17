<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;
use App\Models\Atores;

class PersonagensController extends Controller
{
    public function index(Filme $filme)
    {
        $personagens = $filme->personagens;
        $atores = Atores::all(); // Carrega todos os atores

        return view('personagens.index', [
            'filme' => $filme,
            'personagens' => $personagens,
            'atores' => $atores // Passa os atores para a view
        ]);
    }

    public function store(Request $request, Filme $filme)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'ator_nome' => 'required|string|max:255'
        ]);

        // Verifique se o ator já existe
        $ator = \App\Models\Atores::firstOrCreate(['nome' => $request->ator_nome]);

        // Criação do personagem vinculado ao filme e ao ator
        $filme->personagens()->create([
            'nome' => $request->nome,
            'ator_id' => $ator->id,
        ]);

        return redirect()->route('personagens.index', $filme->id)
            ->with('mensagem.sucesso', 'Personagem adicionado com sucesso!');
    }
}
