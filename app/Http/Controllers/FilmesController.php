<?php
// Em suma, um Controller recebe uma requisição e devolve uma reposta em formatos variados

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Filme;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\FilmesFormRequest;
use App\Models\Personagens;
use App\Models\Atores;

class FilmesController extends Controller
{
    public function index(Request $request) // Por convenção, o nome da action do Controller para o verbo GET é index
    {
        // return $request->informacao(); Com esse comando é possivel extrair uma série de informações, como método, input, etc
        // return redirect('url'); 
        $filmes = Filme::query()->orderBy("name")->get();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        // $html = '<ul>';
        // foreach ($filmes as $filme) {
        //     $html .= "<li>$filme</li>"; // O operador .= concatena e atribui um valor à variável
        // }
        // $html .= '</ul>'; 

        // // echo $html; 
        // // Para evitar erros/sobreescrita, é melhor não usar echo dentro do Controller
        // return $html;
        // // O Laravel pega o retorno e ANALISA a MELHOR forma de devolver a resposta

        return view('filmes.index')->with('filmes', $filmes)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        $atores = Atores::all(); // Carrega todos os atores para a seleção
        return view('filmes.create', compact('atores')); // Passa a lista de atores para a view
    }

    public function store(FilmesFormRequest $request)
    {
        // Cria o filme
        $filme = Filme::create($request->only('name'));

        // Loop para criar cada personagem com seu ator
        foreach ($request->personagens as $personagemData) {
            // Primeiro, verifica se o ator já existe, e o cria se não existir
            $ator = Atores::firstOrCreate(
                ['nome' => $personagemData['ator']] // Verifica se já existe um ator com este nome
            );

            // Em seguida, cria o personagem e associa ao filme e ao ator
            $personagem = new Personagens([
                'nome' => $personagemData['nome'],
                'ator_id' => $ator->id
            ]);
            $filme->personagens()->save($personagem);
        }

        return redirect()
            ->route('filmes.index')
            ->with('mensagem.sucesso', "Filme '{$filme->name}' adicionado com sucesso!");
    }


    public function destroy(Filme $filme)
    {
        $filme->delete();
        return to_route('filmes.index')->with('mensagem.sucesso', "Filme '{$filme->name}' removido com sucesso!");
    }

    public function edit(Filme $filme)
    {
        return view('filmes.edit')->with('filme', $filme);
    }

    public function update(FilmesFormRequest $request, Filme $filme)
    {
        $filme->fill($request->all());
        $filme->save();
        return to_route('filmes.index')->with('mensagem.sucesso', "Filme '{$filme->name}' atualizado com sucesso!");
    }
}
