<x-formule-layout>
    <x-slot name="title">
        {{ __('Ajout formule') }}
    </x-slot>
    <x-slot name="formule_header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajout formule du produit ') }} <strong>{{ $produit->nom }}</strong>
        </h1>
    </x-slot>
    <form action="{{ route('store_stock_matiere') }}" method="post">
        @csrf
        @foreach ($formule_list as $formule)
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><strong>{{ $formule->matiere_premiere_id}}</strong></span>
                <input type="number" name="{{ 2 }}" class="form-control" value="{{ 2  }}" placeholder="Pourcentage" >
            </div>
        @endforeach
        <input type="submit" class="btn btn-primary" value="Ajouter">
    </form>
</x-formule-layout>
<script>
    console.log("Hello")
</script>
