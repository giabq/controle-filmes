<x-layout title="Filmes">
    <a href="{{route('filmes.create')}}" class="btn btn-dark mb-2">Adicionar filme</a>

    @if(session('mensagem.sucesso'))
    <div class="alert alert-success">
        {{ session('mensagem.sucesso') }}
    </div>
    @endif


    <ul class="list-group">
        @foreach($filmes as $filme)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{$filme->name}}

            <span class="d-flex">
                <a href="{{ route('filmes.edit', $filme) }}" class="button btn btn-primary btn-sm">
                    E
                </a>
                <form action="{{ route('filmes.destroy', $filme) }}" method="post" class="ms-2">
                    @csrf
                    @method('DELETE')
                    <button class="button btn btn-danger btn-sm">
                        X
                    </button>
                </form>
            </span>
        </li>
        @endforeach

    </ul>
</x-layout>