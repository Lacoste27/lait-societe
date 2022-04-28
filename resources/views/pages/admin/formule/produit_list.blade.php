<x-formule-layout>
    <x-slot name="title">
        {{ __('Produit fini List') }}
    </x-slot>
    <x-slot name="formule_header">
        {{ __("Liste des produits finis") }}
    </x-slot>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produit_list as $produit)
                <tr>
                    <th scope="row">{{ $produit->id }}</th>
                    <td>{{ $produit->nom }}</td>
                    <td><a href="{{ route('ajout_formule', [$produit->id]) }}">Ajout</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-formule-layout>
