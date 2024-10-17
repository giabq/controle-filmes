<x-layout title="Personagens do Filme: {!!$filme->name!!}">


    @if($personagens->isEmpty())
    <p>Não há personagens cadastrados para este filme.</p>
    @else
    <ul class="list-group">
        @foreach($personagens as $personagem)
        <li class="list-group-item">
            <strong>Personagem:</strong> {{ $personagem->nome }} <br>
            <strong>Ator:</strong> {{ $personagem->ator->nome ?? 'N/A' }}
        </li>
        @endforeach
    </ul>
    @endif

    <h3>Adicionar Novo Personagem</h3>
    <form action="{{ route('personagens.store', $filme->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Personagem:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="mb-3">
            <label for="ator_nome" class="form-label">Nome do Ator:</label>
            <input type="text" class="form-control" id="ator_nome" name="ator_nome" required>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar Personagem</button>
    </form>

</x-layout>