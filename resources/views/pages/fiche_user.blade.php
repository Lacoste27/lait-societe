<x-app-layout>
    <x-slot name="title">
        Fiche
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fiche utlisateur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('update_status', [$user->id]) }}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><strong>Nom</strong></span>
                                    <input type="text" class="form-control" value="{{ $user['name'] }}"
                                        aria-label="Username" aria-describedby="basic-addon1" disabled>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><strong>Email</strong></span>
                                    <input type="text" class="form-control" value="{{ $user['email'] }}"
                                        aria-label="Username" aria-describedby="basic-addon1" disabled>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><strong>Role</strong></span>
                                    <input type="text" class="form-control" value="{{ $user['role'] }}"
                                        aria-label="Username" aria-describedby="basic-addon1" disabled>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Activer">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
