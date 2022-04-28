<x-page-layout>
    <x-slot name="title">
        {{ __('Etat Stock MP') }}
    </x-slot>
    <x-slot name="stock_header">
        {{ __("Etat de stock des matière première") }}
    </x-slot>
    <table class="table">
        {{ var_dump($etat_list) }}
        <thead>
            <tr>
                <th scope="col">Matiere première</th>
                <th scope="col">Entrée</th>
                <th scope="col">Sortie</th>
                <th scope="col">Reste</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($etat_list as $matiere)
                <tr>
                    <th scope="row">{{ $matiere->matiere_premiere_id }}</th>
                    <td>{{ $matiere->entre }}</td>
                    <td>{{ $matiere->sortie }}</td>
                    <td>{{ $matiere->reste }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-page-layout>
