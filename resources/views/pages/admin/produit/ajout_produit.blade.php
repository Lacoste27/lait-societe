<x-produit-layout>
    <x-slot name="title">
        {{ __('Ajout produit') }}
    </x-slot>
    <x-slot name="produit_header">
        {{ __('Ajout produit finis') }}
    </x-slot>
    @if ($errors->any())
        <div class="alert alert-danger">
            {{ 'Matiere premiere insuffisant' }} <strong>{{ $errors->first() }}</strong>
        </div>
        <div class="alert alert-success">
            {{ 'Quantite proposer' }} <strong>{{ $errors->all()[1] }}</strong>
        </div>
    @endif
    <form action="{{ route('store_produit') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><strong>Produit</strong></span>
            <select class="form-control" name="produit_id" id="">
                @foreach ($produit_list as $produit)
                    <option value="{{ $produit->id }}">{{ $produit->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><strong>Quantite à produire</strong></span>
            <input type="number" name="quantite_fini" class="form-control" value="" aria-label="Username"
                aria-describedby="basic-addon1">
        </div>

        <input type="submit" class="btn btn-primary" value="Ajouter">
    </form>
</x-produit-layout>
