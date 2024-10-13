<x-layout title="Filmes">
    <a href="/filmes/criar">Adicionar filme</a>

    <ul>
        @foreach($filmes as $filme)
        <li>{{$filme;}}</li>
        @endforeach
    </ul>
</x-layout>