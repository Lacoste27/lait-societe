<x-page-layout>
    <x-slot name="title">
        {{ __('Matière Première List') }}
    </x-slot>
    <x-slot name="stock_header">
        {{ __("Liste Matière Première") }}
    </x-slot>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Seuill Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matiere_list as $matiere)
                <tr>
                    <th scope="row">{{ $matiere->id }}</th>
                    <td>{{ $matiere->nom }}</td>
                    <td>{{ $matiere->seuill_stock }} kg</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-page-layout>
