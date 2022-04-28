<x-page-layout>
    <x-slot name="title">
        {{ __('Ajout Stock') }}
    </x-slot>
    <x-slot name="stock_header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajout Stock Matière Première') }}
        </h1>
    </x-slot>
    <form action="{{route('store_stock_matiere')}}" method="post">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><strong>Matière Première</strong></span>
            <select class="form-control" name="matiere_premiere_id" id="">
                @foreach ($matiere_list as $matiere_premiere)
                    <option value="{{ $matiere_premiere->id }}">{{ $matiere_premiere->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><strong>Quantite</strong></span>
            <input type="text" name="entre" class="form-control" value="" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><strong>Prix</strong></span>
            <input type="number" min="0" name="prixunitaire" class="form-control" value="" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <input type="submit" class="btn btn-primary" value="Ajouter">
    </form>
</x-page-layout>
