@extends('layouts.entreprise.entreprise')

@section('content')
@if (Auth::user()->role == "entreprise" OR Auth::user()->role == "admin" OR Auth::user()->role == "cabinet")
@php
$PackageEntreprise = $Abonnement->where('entreprise_id', Auth::user()->entreprise_id)->first()->package_id;
// $PackageEntreprise = $Packages::where('package_id', $AbonnementEntreprise->package_id)->first();
$ModuleEntreprise = $ModulePack->where('package_id', $PackageEntreprise);
@endphp
@endif

<div class="row">
    <div class="col-12">
        @include('layouts.entreprise.required.includes.alert')
    </div>
</div>
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Ajouter articles
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a href="{{ route('articles.index') }}" class="btn btn-primary shadow-md mr-2"><i data-feather="list" class="w-4 h-4 mr-2"></i>Liste article</a>
    </div>
</div>
<div class="intro-y box p-5 mt-5">

    <form action="{{ route('articles.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="m-2 mb-3">
            <label for="crud-form-1" class="form-label">Nom <span class="text-danger" style="color: red">*</span></label>
            <input id="crud-form-1" type="text" name="nom" value="{{ old('nom')}}"
                class="form-control w-full @error('nom') is-invalid @enderror" placeholder="Ex: BICIS">
            @error('nom')
            <span class="invalid-feedback" style="color: red" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="m-2 mb-3">
            <label for="crud-form-1" class="form-label">Description <span class="text-danger" style="color: red">*</span></label>
            <textarea id="crud-form-1" type="text" name="description" value="{{ old('decription')}}"
                class="form-control w-full @error('description') is-invalid @enderror" placeholder="Ex: BICIS"></textarea>
            @error('description')
            <span class="invalid-feedback" style="color: red" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="m-2 mb-3">
            <label for="crud-form-2" class="form-label">Prix <span
                    class="text-danger" style="color: red">*</span></label>
            <input id="crud-form-2" name="prix_unitaire" value="{{ old('prix_unitaire')}}" type="number" class="form-control w-full @error('prix_unitaire') is-invalid @enderror"
                placeholder="Ex: 1248791499864">
                @error('prix_unitaire')
            <span class="invalid-feedback" style="color: red" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="m-2 mb-3">
            <label for="crud-form-2" class="form-label">Quantité <span
                    class="text-danger" style="color: red">*</span></label>
            <input id="crud-form-2" name="quantite" value="{{ old('quantite')}}" type="number" class="form-control w-full @error('quantite') is-invalid @enderror"
                placeholder="Ex: 1248791499864">
                @error('quantite')
            <span class="invalid-feedback" style="color: red" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="m-2 mb-3">
            <label for="crud-form-3" class="form-label">Image</label>
            <input id="crud-form-3" type="file" name="image" value="{{ old('image')}}" class="form-control w-full @error('image') is-invalid @enderror"
                placeholder="Input text">
                @error('image')
            <span class="invalid-feedback " style="color: red" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="text-right mt-5">
            <a href="{{route('articles.index')}}" class="btn btn-outline-danger w-24 mr-1">Annuler</a>
            <button type="submit" class="btn btn-primary w-24">Enregistrer</button>
        </div>
    </form>
</div>
@endsection
