@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
@endsection

@section('content')
@if (Auth::user()->role == "entreprise" OR Auth::user()->role == "admin" OR Auth::user()->role == "cabinet")
@php
$PackageEntreprise = $Abonnement->where('entreprise_id', Auth::user()->entreprise_id)->first()->package_id;
// $PackageEntreprise = $Packages::where('package_id', $AbonnementEntreprise->package_id)->first();
$ModuleEntreprise = $ModulePack->where('package_id', $PackageEntreprise);
@endphp
@endif
@include('layouts.admin.required.includes.messages')

  <div class="row g-0">
    <div class="col-lg-4 pe-lg-2">
      <div class="card mb-3">
        <div class="card-header "  style="background-color: #232e3c">
          <h5 class="mb-0 text-light">{{__('messages.accounting_account_add')}}</h5>
        </div>

        <div class="card-body">
           @if ($type === "add")
            {{-- @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 3)->first()->ajouter == "yes") --}}
            <form action="{{route('entreprise.compte-comptable.store')}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                <div class="col-md-12">
                    <label class="form-label" for="nom">{{__('messages.name')}}</label>
                    <input class="form-control" name="nom" id="nom" type="text"  required="" />
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="numero_compte">{{__('messages.account_number')}}</label>
                    <input class="form-control" name="numero_compte" id="nom" type="number"  required="" />
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="nom">Type compte</label>
                    <select class="form-control" name="type_compte" id="type_compte"  onchange="selectTypeCompte()">
                      <option value="">choisir type compte</option>
                      <option value="Actif">Actif</option>
                      <option value="Passif">Passif</option>
                      <option value="Capital">Capital</option>
                      <option value="Revenu">Revenu</option>
                      <option value="Coût des marchandises vendues">Coût des marchandises vendues</option>
                      <option value="Dépense">Dépense</option>
                    </select>
                </div>

                {{-- ******** bloc actif ******************* --}}
                <div class="col-md-12" style="display:none" id="id_actif">
                    <label class="form-label" for="nom">Sous-type compte</label>
                    <select class="form-control" name="sous_type_compte_actif" id="sous_type_compte_actif" onchange="fnction_sous_type_compte_actif()">
                      <option value="">choisir sous-type compte</option>
                      <option value="Actif Court Terme">Actif Court Terme</option>
                      <option value="Matériel et immobilisations">Matériel et immobilisations</option>
                      <option value="Actif long Terme">Actif long Terme</option>
                    </select>
                </div>

                {{-- ******** bloc passif ******************* --}}
                <div class="col-md-12" style="display:none" id="id_passif">
                    <label class="form-label" for="nom">Sous-type compte</label>
                    <select class="form-control" name="sous_type_compte_passif" id="sous_type_compte_passif" onchange="fnction_sous_type_compte_passif()">
                      <option value="">choisir sous-type compte</option>
                      <option value="Passif court terme">Passif court terme</option>
                      <option value="Passif long terme">Passif long terme</option>
                    </select>
                </div>

                {{-- ******** bloc capital ******************* --}}
                <div class="col-md-12" style="display:none" id="id_capital">
                    <label class="form-label" for="nom">Sous-type compte</label>
                    <select class="form-control" name="sous_type_compte_cptal" id="sous_type_compte_cptal" onchange="fnction_sous_type_compte_cptal()">
                      <option value="">choisir sous-type compte</option>
                      <option value="Capital">Capital</option>
                      <option value="Capital action">Capital action</option>
                      <option value="Bénéfice non-réparti">Bénéfice non-réparti</option>
                    </select>
                </div>
                {{-- ******** bloc Revenu ******************* --}}
                <div class="col-md-12" style="display:none" id="id_revenu">
                    <label class="form-label" for="nom">Sous-type compte</label>
                    <select class="form-control" name="sous_type_compte_rvnu" id="sous_type_compte_rvnu" onchange="fnction_sous_type_compte_rvnu()" >
                      <option value="">choisir sous-type compte</option>
                      <option value="Produit vendu">Produit vendu</option>
                      <option value="Service vendu">Service vendu</option>
                      <option value="Vente de marchandise">Vente de marchandise</option>
                    </select>
                </div>

                {{-- ******** bloc Coût des marchandises vendues ******************* --}}
                <div class="col-md-12" style="display:none" id="cout_march_vendu">
                    <label class="form-label" for="nom">Sous-type compte</label>
                    <select class="form-control" name="sous_type_compte_cmv" id="sous_type_compte_cmv" onchange="fnction_sous_type_compte_cmv()">
                      <option value="">choisir sous-type compte</option>
                      <option value="Stock">Stock</option>
                      <option value="Achat">Achat</option>
                      <option value="Rabais sur achat">Rabais sur achat</option>
                      <option value="Autre cout">Autre cout</option>
                    </select>
                </div>

                {{-- ******** bloc depense ******************* --}}
                <div class="col-md-12" style="display:none" id="id_depense">
                    <label class="form-label" for="nom">Sous-type compte</label>
                    <select class="form-control" name="sous_type_compte_d" id="sous_type_compte_d" onchange="fnction_sous_type_compte_d()">
                      <option value="">choisir sous-type compte</option>
                      <option value="Charge fixe">Charge fixe</option>
                      <option value="Charge variable">Charge variable</option>
                    </select>
                </div>
                <input type="hidden" name="sous_type_compte" id="sous_type_compte_selected" value="">

                {{-- <p id="sous_type_compte_selected"></p> --}}

                <div class="col-12 d-flex  justify-content-between table-responsive scrollbar">
                    <button class="btn btn-success mr-1 " type="submit" style="margin: 5px !important">{{__('messages.save')}}</button>
                    <a href="{{route('entreprise.compte-comptable')}}"  style="margin: 5px !important" class="btn btn-primary mr-1  bg-line-chart-gradient " >{{__('messages.cancel')}}</a>
                </div>
            </form>
            {{-- @else
            @include('layouts.admin.required.includes.controle.accessDeniedAdd') --}}
            {{-- @endif --}}

           @elseif ($type === "edit")
            {{-- @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 3)->first()->ajouter == "yes") --}}
                <form action="{{route('entreprise.compte-comptable.update', $Comptescomptable->id)}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                    <div class="col-md-12">
                        <label class="form-label" for="nom">{{__('messages.name_of')}} {{__('messages.accounting_account')}}</label>
                        <input class="form-control" value="{{$Comptescomptable->nom}}" name="nom" id="nom" type="text"  required="" />
                    </div>


                    <div class="col-md-12">
                        <label class="form-label" for="nom">{{__('messages.account_number')}}</label>
                        <input class="form-control" name="numero_compte" value="{{$Comptescomptable->numero_compte}}" id="nom" type="number"  required="" />

                    </div>


                    <div class="col-md-12">
                        <label class="form-label" for="type_compte">Type compte</label>
                        <select class="form-control" name="type_compte" id="type_compte"  onchange="selectTypeCompte()">
                          <option value="">choisir type compte</option>
                          <option value="Actif" @if ($Comptescomptable->type_compte == "Actif") selected @endif>Actif</option>
                          <option value="Passif" @if ($Comptescomptable->type_compte == "Passif") selected @endif>Passif</option>
                          <option value="Capital" @if ($Comptescomptable->type_compte == "Capital") selected @endif>Capital</option>
                          <option value="Revenu" @if ($Comptescomptable->type_compte == "Revenu") selected @endif>Revenu</option>
                          <option value="Coût des marchandises vendues" @if ($Comptescomptable->type_compte == "Coût des marchandises vendues") selected @endif>Coût des marchandises vendues</option>
                          <option value="Dépense" @if ($Comptescomptable->type_compte == "Dépense") selected @endif>Dépense</option>
                        </select>
                    </div>



                    {{-- ******** bloc actif ******************* --}}
                    <div class="col-md-12" style="display:none" id="id_actif">
                        <label class="form-label" for="nom">Sous-type compte</label>
                        <select class="form-control" name="sous_type_compte_actif" id="sous_type_compte_actif" onchange="fnction_sous_type_compte_actif()">
                          <option value="">choisir sous-type compte</option>
                          <option value="Actif Cour Terme">Actif Cour Terme</option>
                          <option value="Matériel et immobilisation">Matériel et immobilisation</option>
                          <option value="Actif long Terme">Actif long Terme</option>
                        </select>
                    </div>

                    {{-- ******** bloc passif ******************* --}}
                    <div class="col-md-12" style="display:none" id="id_passif">
                        <label class="form-label" for="nom">Sous-type compte</label>
                        <select class="form-control" name="sous_type_compte_passif" id="sous_type_compte_passif" onchange="fnction_sous_type_compte_passif()">
                          <option value="">choisir sous-type compte</option>
                          <option value="Passif court terme">Passif court terme</option>
                          <option value="Passif long terme">Passif long terme</option>
                        </select>
                    </div>

                    {{-- ******** bloc capital ******************* --}}
                    <div class="col-md-12" style="display:none" id="id_capital">
                        <label class="form-label" for="nom">Sous-type compte</label>
                        <select class="form-control" name="sous_type_compte_cptal" id="sous_type_compte_cptal" onchange="fnction_sous_type_compte_cptal()">
                          <option value="">choisir sous-type compte</option>
                          <option value="Capital">Capital</option>
                          <option value="Capital action">Capital action</option>
                          <option value="Bénéfice non-réparti">Bénéfice non-réparti</option>
                        </select>
                    </div>
                    {{-- ******** bloc Revenu ******************* --}}
                    <div class="col-md-12" style="display:none" id="id_revenu">
                        <label class="form-label" for="nom">Sous-type compte</label>
                        <select class="form-control" name="sous_type_compte_rvnu" id="sous_type_compte_rvnu" onchange="fnction_sous_type_compte_rvnu()" >
                          <option value="">choisir sous-type compte</option>
                          <option value="Produit vendu">Produit vendu</option>
                          <option value="Service vendu">Service vendu</option>
                        </select>
                    </div>

                    {{-- ******** bloc Coût des marchandises vendues ******************* --}}
                    <div class="col-md-12" style="display:none" id="cout_march_vendu">
                        <label class="form-label" for="nom">Sous-type compte</label>
                        <select class="form-control" name="sous_type_compte_cmv" id="sous_type_compte_cmv" onchange="fnction_sous_type_compte_cmv()">
                          <option value="">choisir sous-type compte</option>
                          <option value="Stock">Stock</option>
                          <option value="Achat">Achat</option>
                          <option value="Rabais sur achat">Rabais sur achat</option>
                          <option value="Autre cout">Autre cout</option>
                        </select>
                    </div>

                    {{-- ******** bloc depense ******************* --}}
                    <div class="col-md-12" style="display:none" id="id_depense">
                        <label class="form-label" for="nom">Sous-type compte</label>
                        <select class="form-control" name="sous_type_compte_d" id="sous_type_compte_d" onchange="fnction_sous_type_compte_d()">
                          <option value="">choisir sous-type compte</option>
                          <option value="Charge fixe">Charge fixe</option>
                          <option value="Charge variable">Charge variable</option>
                        </select>
                    </div>
                    <input type="hidden" name="sous_type_compte" id="sous_type_compte_selected" value="{{$Comptescomptable->sous_type_compte}}">

                    <div class="col-12 d-flex  justify-content-between table-responsive scrollbar">
                        <button class="btn btn-success mr-1" type="submit" style="margin: 5px !important">{{__('modifier')}}</button>
                        <a href="{{route('entreprise.compte-comptable')}}"  style="margin: 5px !important" class="btn btn-primary mr-1  bg-line-chart-gradient" >{{__('messages.cancel')}}</a>
                        <a href="{{route('entreprise.compte-comptable.delete', $Comptescomptable->id)}}"  style="margin: 5px !important"  class="btn mr-1 btn-danger" >{{__('messages.delete')}}</a>

                    </div>
                </form>
                {{-- @else
                    @include('layouts.admin.required.includes.controle.accessDeniedAdd')
                @endif --}}
           @endif
        </div>
      </div>


    </div>
    <div class="col-lg-8 ps-lg-2">
      <div class="">
        <div class="card mb-3" style="min-height: 90vh !important">
          <div class="card-header"  style="background-color: #232e3c">
            <h5 class="mb-0 text-light">{{__('messages.accounting_account_list')}} </h5>
          </div>
          <div class="card-body bg-light table-responsive scrollbar">
            {{-- @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 3)->first()->voir == "yes") --}}
            <table id="example" class="table table-striped table-bordered" style="width:100%" >
                <thead>
                    <tr>
                        <th>{{__('messages.name_of')}} {{__('messages.accounting_account')}}</th>
                        <th>{{__('messages.account_number')}}</th>
                        <th>Type de compte</th>
                        <th>Sous Type</th>
                        <th style="width:2%">{{__('messages.action')}}</th>

                    </tr>
                </thead>
                <tbody >
                    @foreach ($Comptescomptables as $compte)
                    <tr>

                        <td>{{$compte->nom}}</td>
                        <td>{{$compte->numero_compte}}</td>
                        <td>{{$compte->type_compte}}</td>
                        <td>{{$compte->sous_type_compte}}</td>

                        {{-- @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 3)->first()->modifier == "yes") --}}
                        <td>
                            <small><a class="btn btn-primary bg-line-chart-gradient" href="{{route('entreprise.compte-comptable.edit', $compte->id)}}"><i class="fas fa-pen-square"></i></a></small>
                        </td>
                        {{-- @else
                            @include('layouts.admin.required.includes.controle.accessDeniedBtnEdit')
                        @endif --}}

                    </tr>
                    @endforeach
                </tbody>
                {{-- <tfoot>
                    <tr>
                        <th>Image</th>
                        <th>Nom du {{$choice}}</th>
                        <th>Catégorie</th>
                        <th>UGS</th>
                        <th>Prix/Tarif</th>
                        <th>C.Comptable</th>
                        <th>Taxes</th>
                        <th >Action</th>
                    </tr>
                </tfoot> --}}
            </table>
              {{-- @else
                  @include('layouts.admin.required.includes.controle.accessDeniedshow')
              @endif --}}


        </div>
        </div>

      </div>
    </div>
  </div>
  <script>

  function fnction_sous_type_compte_actif(){ document.getElementById("sous_type_compte_selected").value = document.getElementById("sous_type_compte_actif").value;}
  function fnction_sous_type_compte_passif(){document.getElementById("sous_type_compte_selected").value = document.getElementById("sous_type_compte_passif").value;}
  function fnction_sous_type_compte_cptal(){document.getElementById("sous_type_compte_selected").value = document.getElementById("sous_type_compte_cptal").value;}
  function fnction_sous_type_compte_rvnu(){document.getElementById("sous_type_compte_selected").value = document.getElementById("sous_type_compte_rvnu").value;}
  function fnction_sous_type_compte_cmv(){document.getElementById("sous_type_compte_selected").value = document.getElementById("sous_type_compte_cmv").value;}
  function fnction_sous_type_compte_d(){document.getElementById("sous_type_compte_selected").value = document.getElementById("sous_type_compte_d").value;}

  function selectTypeCompte(){

        if(document.getElementById("type_compte").value == "Actif"){
          document.getElementById("id_actif").style.display = "block";
          document.getElementById("id_passif").style.display = "none";
          document.getElementById("id_revenu").style.display = "none";
          document.getElementById("id_capital").style.display = "none";
          document.getElementById("cout_march_vendu").style.display = "none";
          document.getElementById("id_depense").style.display = "none";

        }
        else if(document.getElementById("type_compte").value == "Passif"){
          document.getElementById("id_actif").style.display = "none";
          document.getElementById("id_passif").style.display = "block";
          document.getElementById("id_revenu").style.display = "none";
          document.getElementById("id_capital").style.display = "none";
          document.getElementById("cout_march_vendu").style.display = "none";
          document.getElementById("id_depense").style.display = "none";

        }
        else if(document.getElementById("type_compte").value == "Revenu"){
          document.getElementById("id_actif").style.display = "none";
          document.getElementById("id_passif").style.display = "none";
          document.getElementById("id_revenu").style.display = "block";
          document.getElementById("id_capital").style.display = "none";
          document.getElementById("cout_march_vendu").style.display = "none";
          document.getElementById("id_depense").style.display = "none";

        }
        else if(document.getElementById("type_compte").value == "Capital"){
          document.getElementById("id_actif").style.display = "none";
          document.getElementById("id_passif").style.display = "none";
          document.getElementById("id_revenu").style.display = "none";
          document.getElementById("id_capital").style.display = "block";
          document.getElementById("cout_march_vendu").style.display = "none";
          document.getElementById("id_depense").style.display = "none";

        }

        else if(document.getElementById("type_compte").value == "Dépense"){
          document.getElementById("id_actif").style.display = "none";
          document.getElementById("id_passif").style.display = "none";
          document.getElementById("id_revenu").style.display = "none";
          document.getElementById("id_capital").style.display = "none";
          document.getElementById("cout_march_vendu").style.display = "none";
          document.getElementById("id_depense").style.display = "block";

        }
        else if(document.getElementById("type_compte").value == "Coût des marchandises vendues"){
          document.getElementById("id_actif").style.display = "none";
          document.getElementById("id_passif").style.display = "none";
          document.getElementById("id_revenu").style.display = "none";
          document.getElementById("id_capital").style.display = "none";
          document.getElementById("cout_march_vendu").style.display = "block";
          document.getElementById("id_depense").style.display = "none";

        }
        else {
          document.getElementById("id_actif").style.display = "none";
          document.getElementById("id_passif").style.display = "none";
          document.getElementById("id_revenu").style.display = "none";
          document.getElementById("id_capital").style.display = "none";
          document.getElementById("cout_march_vendu").style.display = "none";
          document.getElementById("id_depense").style.display = "none";
        }
    }

  </script>
@endsection
