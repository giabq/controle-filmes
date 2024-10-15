<x-layout title="Adicionar filme">
    <form action="{{route('filmes.store')}}" method="post">
        @csrf <!-- diretiva do blade para evitar ataques -->
        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>