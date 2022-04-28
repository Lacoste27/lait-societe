<x-produit-layout>
    <x-slot name="title">
        {{ __('Etat Stock Produit') }}
    </x-slot>
    <x-slot name="produit_header">
        {{ __("Etat de stock des produit finis") }}
    </x-slot>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Produit finis</th>
                <th scope="col">Entrée</th>
                <th scope="col">Sortie</th>
                <th scope="col">Reste</th>
                {{-- <th scope="col">Prix unitaire</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($etat_produit as $produit)
                <tr>
                    <th scope="row">{{ $produit->produit_id }}</th>
                    <td>{{ $produit->entre }}</td>
                    <td>{{ $produit->sortie }}</td>
                    <td>{{ $produit->reste }}</td>
                    {{-- <td>{{ $matiere->prixunitaire }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</x-produit-layout>
