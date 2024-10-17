<x-layout title="Editar filme '{!! $filme->name !!}'">
    <x-filmes.form :action="route('filmes.update', $filme)" :name="$filme->name" :update="true" />
</x-layout>