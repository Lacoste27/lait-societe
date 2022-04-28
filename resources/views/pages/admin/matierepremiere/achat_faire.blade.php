<x-page-layout>
    <x-slot name="title">
        {{ __('Achat à faire') }}
    </x-slot>
    <x-slot name="stock_header">
        {{ __("Liste des achats à faire") }}
    </x-slot>
    <div>
        <a class="btn btn-success mb-3" href="{{ route('export_excel') }}">Export to Excel</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Matiere première</th>
                <th scope="col">Reste</th>
                <th scope="col">Seuill stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($achat_faire as $matiere)
                <tr>
                    <th scope="row">{{ $matiere->nom }}</th>
                    <td>{{ $matiere->reste }}</td>
                    <td>{{ $matiere->seuill_stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-page-layout>
