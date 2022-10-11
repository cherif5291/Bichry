@extends('layouts.admin.admin')

@section('styles')
    @include('depense::layouts.head')
    <style>
        .inputwire{
      border:transparent !important;
      background-color:transparent !important;
      -webkit-box-shadow: none !important;


      font-size: 1.2em !important;
      font-weight: 600 !important;
    }

    .inputwireWidth{
        width: 50% !important;
    }

    .inputwireText{
        font-size: 1.5em !important;
        text-align: right !important;
    }

    .text-algn{
        text-align: right !important;
    }

    .addbtn{
        height: 35px !important; margin-left:1em;
    }

    .inputwireTextWhite{
        padding: 0px !important;
      margin: 0px !important;
        color: white !important;
    }
    </style>
@endsection

@section('content')
<div>
    @if (Auth::user()->role == "entreprise" OR Auth::user()->role == "admin" OR Auth::user()->role == "cabinet")
        @php
        $PackageEntreprise = $Abonnement->where('entreprise_id', Auth::user()->entreprise_id)->first()->package_id;
        $ModuleEntreprise = $ModulePack->where('package_id', $PackageEntreprise);
        @endphp
    @endif

    @include('layouts.admin.required.includes.messages')

    <div class="card mb-3" style="min-height: 90vh">
        @livewire('depense::index')
    </div>

</div>

@endsection


