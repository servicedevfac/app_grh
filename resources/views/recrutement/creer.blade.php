@extends('layouts.base')
@section('title','liste des utilisateurs')
@section('content')
    <section class="row">
        <div class="col-12 col-lg-12"></div>
            <div class="container py-5">
                <h2 class="mb-4 text-start">Créer une nouvelle offre</h2>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif


                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif  
                <form method="POST" action="{{ route('recrutement.store') }}" class="bg-white p-4 rounded shadow-sm">
                    @csrf

                    <label>titre</label>
                    <input type="text" name="titre" class="form-control"><br>

                    <label>Description</label>
                    <textarea name="description" class="form-control"></textarea><br>

                    <label>type de contrat</label>
                    <select name="type_contrat" class="form-select" required>
                        <option value="CDI">CDI</option>
                        <option value="CDD">CDD</option>
                        <option value="Stage">Stage</option>
                    </select><br>

                    <label>Date limite</label>
                    <input type="date" name="date_limite" class="form-control"><br>

                    <label>service</label>
                    <select name="service_id" class="form-select" required>
                        @foreach($service as $serv)
                            <option value="{{ $serv->id }}">{{ $serv->nom }}</option>
                        @endforeach
                    </select><br>
                    <button class="btn btn-primary w-100">Créer l'offre</button>
                </form>
            </div>
        </div>
    </section>
    
@endsection