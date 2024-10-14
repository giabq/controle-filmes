<x-layout title="Filmes">
    <a href="/filmes/criar" class="btn btn-dark mb-2">Adicionar filme</a>

    <ul class="list-group">
        @foreach($filmes as $filme)
        <li class="list-group-item">{{$filme->name}}</li>
        @endforeach
    </ul>
</x-layout>