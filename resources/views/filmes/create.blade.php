<x-layout title="Adicionar filme">
    <form action="/filmes/salvar" method="post">
        @csrf <!-- diretiva do blade para evitar ataques -->
        <div class="mb-3">
            <label for="novo" class="form-label">Nome:</label>
            <input type="text" name="novo" id="novo" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>