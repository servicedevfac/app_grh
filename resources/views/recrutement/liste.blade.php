@extends('layouts.base')
@section('title','liste des utilisateurs')
@section('content')
    <div class="container mt-5">
        {{-- <form action="{{ route('users.liste') }}" method="GET" class="mb-3">
            <input type="text" name="search" placeholder="Rechercher..." class="form-control" value="{{ request('search') }}">
        </form> --}}

        <h2 class="mb-4 text-start">Liste des offres</h2>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

        @if ($recrutements->isEmpty())
            <p class="text-center">Aucune offre disponible.</p>
        @else
            @foreach ($recrutements as $recrutement)
                           
                <div class="row">
                    <div class="col-xxl-3 col-sm-6">
                            <div class="card widget-flat ">
                                <div class="card-body">
                                    {{-- <div class="float-end">
                                        <i class="ri-eye-line widget-icon"></i>
                                    </div> --}}
                                    <h6 class="text-uppercase mt-0" title="Customers">{{ $recrutement->titre }}</h6>
                                    <p class="my-2">{{ \Illuminate\Support\Str::words($recrutement->description, 15, '...' ) ?? '—' }}</p>
                                    <p class="mb-0 d-flex justify-content-between align-items-center">
                                        <span class="text-nowrap">{{ $recrutement->service->nom }}</span>
                                        <span class="badge bg-primary me-1">Date limite : {{ $recrutement->date_limite }}</span>
                                    </p>
                                    <button class="btn btn-primary btn-sm mt-2">Voir</button>
                                </div>
                            </div>
                    </div>
                </div>
            @endforeach
                
        @endif
    </div>
@endsection