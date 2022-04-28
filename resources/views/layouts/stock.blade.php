<x-app-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $stock_header }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  border-b border-gray-200  float-end">
                    <a class="btn btn-primary" href="{{ route('ajout_matiere') }}">Ajout Stock</a>
                    <a class="btn btn-primary" href="{{ route('matiere_list') }}">Liste Matière Première</a>
                    <a class="btn btn-primary" href="{{ route('matiere_stock_etat') }}">Etat de Stock</a>
                    <a class="btn btn-primary" href="{{ route('achat_faire') }}">Achats à faire</a>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
