<form action=" {{ $action }} " method="post">
    @csrf

    @if($update)
    @method('PUT')
    @endif

    <div class="mb-3">
        <label for="name" class="form-label">Nome:</label>
        <input type="text" 
               class="form-control" 
               id="name" 
               name="name" 
               @isset($name) value="{{ $name }}" @endisset>
    </div>

    <button type="submit" class="btn btn-primary">Adicionar</button></button>
</form>