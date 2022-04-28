<x-produit-layout>
    <x-slot name="title">
        {{ __('Ajout produit') }}
    </x-slot>
    <x-slot name="produit_header">
        {{ __('Ajout produit finis') }}
    </x-slot>
    <form action="{{ route('sell_produit') }}" method="post">
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
            <span class="input-group-text" id="basic-addon1"><strong>Quantite à vendre</strong></span>
            <input type="text" name="quantite_vendre" class="form-control" value="" aria-label="Username"
                aria-describedby="basic-addon1">
        </div>
        <input type="submit" class="btn btn-primary" value="Vendre">
    </form>
</x-produit-layout>
