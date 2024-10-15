<x-layout title="Filmes">
    <a href="{{route('filmes.create')}}" class="btn btn-dark mb-2">Adicionar filme</a>

    <ul class="list-group">
        @foreach($filmes as $filme)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{$filme->name}}
            <form action="{{route('filmes.destroy', $filme)}}" method="post">
                @csrf
                <button class="button btn btn-danger btn-sm">
                    X
                </button>
            </form>
        </li>
        @endforeach

    </ul>
</x-layout>