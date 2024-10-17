<x-layout title="Adicionar Filme">
    <form action="{{ route('filmes.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome do Filme:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>

        <h4>Personagens</h4>
        
        <div class="row mb-3">
            <div class="col-6">
                <label for="personagens[0][nome]" class="form-label">Nome do Personagem:</label>
                <input type="text" class="form-control" name="personagens[0][nome]" value="{{ old('personagens.0.nome') }}">
            </div>

            <div class="col-6">
                <label for="personagens[0][ator]" class="form-label">Nome do Ator:</label>
                <input type="text" class="form-control" name="personagens[0][ator]" value="{{ old('personagens.0.ator') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <label for="personagens[1][nome]" class="form-label">Nome do Personagem:</label>
                <input type="text" class="form-control" name="personagens[1][nome]" value="{{ old('personagens.1.nome') }}">
            </div>

            <div class="col-6">
                <label for="personagens[1][ator]" class="form-label">Nome do Ator:</label>
                <input type="text" class="form-control" name="personagens[1][ator]" value="{{ old('personagens.1.ator') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <label for="personagens[2][nome]" class="form-label">Nome do Personagem:</label>
                <input type="text" class="form-control" name="personagens[2][nome]" value="{{ old('personagens.2.nome') }}">
            </div>

            <div class="col-6">
                <label for="personagens[2][ator]" class="form-label">Nome do Ator:</label>
                <input type="text" class="form-control" name="personagens[2][ator]" value="{{ old('personagens.2.ator') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar Filme</button>
    </form>
</x-layout>
