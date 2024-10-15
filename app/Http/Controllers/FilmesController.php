<?php
// Em suma, um Controller recebe uma requisição e devolve uma reposta em formatos variados

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Filme;
use Illuminate\Support\Facades\Session;



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
        return view('filmes.create');
    }

    public function store(Request $request)
    {
        $filme =Filme::create($request->all());
        return to_route('filmes.index')->with('mensagem.sucesso', "Filme '{$filme->name}' adicionado com sucesso!");
    }

    public function destroy(Filme $filme)
    {
        $filme->delete();
        return to_route('filmes.index')->with('mensagem.sucesso', "Filme '{$filme->name}' removido com sucesso!");
    }
}
