<?php
// Em suma, um Controller recebe uma requisição e devolve uma reposta em formatos variados

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilmesController extends Controller
{
    public function index(Request $request) // Por convenção, o nome da action do Controller para o verbo GET é index
    {
        // return $request->informacao(); Com esse comando é possivel extrair uma série de informações, como método, input, etc
        // return redirect('url'); 
        $filmes = [
            'Carrie a Estranha', 
            'A Vida é Bela',
            'Robôs'
        ];

        // $html = '<ul>';
        // foreach ($filmes as $filme) {
        //     $html .= "<li>$filme</li>"; // O operador .= concatena e atribui um valor à variável
        // }
        // $html .= '</ul>'; 

        // // echo $html; 
        // // Para evitar erros/sobreescrita, é melhor não usar echo dentro do Controller
        // return $html;
        // // O Laravel pega o retorno e ANALISA a MELHOR forma de devolver a resposta

        return view('filmes.index')->with('filmes',$filmes);
    }

    public function create(){
        return view('filmes.create');
    }
}
