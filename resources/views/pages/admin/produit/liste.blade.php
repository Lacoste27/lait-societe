<x-produit-layout>
    <x-slot name="title">
        {{ __('Liste produit') }}
    </x-slot>
    <x-slot name="produit_header">
        {{ __("Liste des produits finis") }}
    </x-slot>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produit_list as $produit)
                <tr>
                    <th scope="row">{{ $produit->id }}</th>
                    <td>{{ $produit->nom }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-produit-layout>
