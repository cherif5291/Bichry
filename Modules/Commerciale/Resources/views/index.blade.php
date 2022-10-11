@extends('layouts.admin.admin')

@section('styles')
    @include('commerciale::layouts.head')

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
    @if (auth()->user()->role == "entreprise" OR auth()->user()->role == "admin" OR auth()->user()->role == "cabinet")
        @php
            $PackageEntreprise = $Abonnement->where('entreprise_id', auth()->user()->entreprise_id)->first()->package_id;
            $ModuleEntreprise = $ModulePack->where('package_id', $PackageEntreprise);
        @endphp
    @endif

    @include('layouts.admin.required.includes.messages')

    <div class="card mb-3">

        @livewire('commerciale::index')

    </div>
</div>
@endsection
