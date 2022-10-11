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
          <h5 class="mb-0 text-light">{{__('messages.add_a')}} {{$choice}} </h5>
        </div>

        <div class="card-body">
           @if ($type === "add")
            @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 3)->first()->ajouter == "yes")
            <form action="{{route('entreprise.commerciale.article.store')}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                <div class="col-md-12">
                    <label class="form-label" for="nom">{{__('messages.name_of')}}{{$choice}}</label>
                    <input class="form-control" name="nom" id="nom" type="text"  required="" />
                </div>


                <div class="col-md-6">
                    <label class="form-label" for="nom">{{__('messages.amount')}}</label>
                    <input class="form-control" name="prix_unitaire" min="1" value="0" id="nom" type="number"  @if ($choice == "produit")  required="" @endif/>

                </div>
                <div class="col-md-12">
                    <label class="form-label" for="nom">{{__('messages.description_of')}} {{$choice}}</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="3"></textarea>
                </div>
                <input hidden class="form-control" name="type" value="{{$choice}}" type="text"  required="" />


                <div class="col-md-6">
                    <label class="form-label" for="comptes_comptable_id">{{__('Compte au grand livre ')}}</label>
                    <select class="form-select" name="comptes_comptable_id" id="comptes_comptable_id" >
                        <option selected="" hidden value="">{{__('messages.chose')}}</option>
                    @foreach ($ComptesComptables as $cComptable)
                    <option value="{{$cComptable->id}}">{{$cComptable->nom}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="taxe_id">{{__('messages.taxe')}}</label>
                    <select class="form-select" name="taxe_id" id="taxe_id" >
                        <option selected="" hidden value="">{{__('messages.chose')}}</option>
                    @foreach ($Taxes as $taxe)
                    <option value="{{$taxe->id}}">{{$taxe->nom}} ({{$taxe->taux}}%)</option>
                    @endforeach
                    </select>
                </div>

                <div class="col-md-4-12">
                    <label class="form-label" for="nom">{{__('messages.image_of')}} {{$choice}}</label>
                    <input name="image" class="form-control" id="customFile" type="file" />

                </div>


                <div class="col-12 d-flex  justify-content-between">
                    <button class="btn btn-success " type="submit">{{__('messages.add')}}</button>
                    <a href="{{route("entreprise.commerciale.".$choice."s")}}" class="btn btn-primary mr-1  bg-line-chart-gradient " >{{__('messages.cancel')}}</a>

                </div>

            </form>
            @else
            @include('layouts.admin.required.includes.controle.accessDeniedAdd')

            @endif

           @elseif ($type === "edit")
           @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 3)->first()->ajouter == "yes")
           <form action="{{route('entreprise.commerciale.article.update', $Article->id)}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                <div class="col-md-7">
                    <label class="form-label" for="nom">{{__('messages.name_of')}} {{$choice}}</label>
                    <input class="form-control" value="{{$Article->nom}}" name="nom" id="nom" type="text"  required="" />
                </div>
                <div class="col-md-5">
                    <label class="form-label" for="categories_article_id">{{__('messages.category_of')}} {{$choice}}  </label>
                    <select class="form-select" name="categories_article_id" id="categories_article_id" >
                        <option selected="" disabled="" value="">{{__('messages.chose')}}</option>
                    @foreach ($Categories->where('type', $choice) as $categorie)
                    <option @if ($Article->categories_article_id === $categorie->id) selected  @endif value="{{$categorie->id}}">{{$categorie->nom}}</option>
                    @endforeach
                    </select>
                </div>


                <input hidden class="form-control" name="type" value="{{$choice}}" type="text"  required="" />

                <div class="col-md-6">
                    <label class="form-label" for="nom">{{__('messages.amount')}}</label>
                    <input class="form-control" name="prix_unitaire" value="{{$Article->prix_unitaire}}" id="nom" type="number"  required="" />

                </div>
                <div class="col-md-12">
                    <label class="form-label" for="nom">{{__('messages.description_of')}} {{$choice}} {{$choice}}</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="3">{{$Article->description}}</textarea>
                </div>


                <div class="col-md-6">
                    <label class="form-label" for="comptes_comptable_id">{{__('messages.accounting_account')}}</label>
                    <select class="form-select" name="comptes_comptable_id" id="comptes_comptable_id" >
                        <option selected="" disabled="" value="">{{__('messages.chose')}}</option>
                    @foreach ($ComptesComptables as $cComptable)
                    <option @if ($Article->comptes_comptable_id === $cComptable->id) selected  @endif value="{{$cComptable->id}}">{{$cComptable->nom}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="taxe_id">{{__('messages.use_with_taxe')}}</label>
                    <select class="form-select" name="taxe_id" id="taxe_id" >
                        <option selected="" disabled="" value="">{{__('messages.chose')}}</option>
                    @foreach ($Taxes as $taxe)
                    <option @if ($Article->taxe_id === $taxe->id) selected  @endif value="{{$taxe->id}}">{{$taxe->nom}} ({{$taxe->taux}}%)</option>
                    @endforeach
                    </select>
                </div>

                <div class="col-md-12 row mt-3 d-flex justify-content-between">
                    <div class="col-md-2">
                        <img src="{{asset($Article->image??'assets/no-image.jpg')}}" height="60px !important" alt="">

                    </div>
                    <div class="col-md-10">
                        <label class="form-label" for="nom">{{__('messages.image_of')}} {{$choice}}</label>
                        <input name="image" class="form-control w-100" id="customFile" type="file" style="width: 100% !important" />
                    </div>
                </div>


                <div class="col-12 d-flex  justify-content-between table-responsive scrollbar">
                    <button class="btn btn-success mr-1 " type="submit" style="margin: 5px !important">{{__('messages.update')}}</button>
                    <a href="{{route("entreprise.commerciale.".$choice."s")}}"  style="margin: 5px !important" class="btn btn-primary mr-1  bg-line-chart-gradient " >{{__('messages.cancel')}}</a>
                    <a href="{{route('entreprise.commerciale.article.destroy', $Article->id)}}"  style="margin: 5px !important"  class="btn mr-1 btn-danger" >{{__('messages.delete')}}</a>

                </div>
            </form>
            @else
                @include('layouts.admin.required.includes.controle.accessDeniedAdd')
            @endif
           @endif
        </div>
      </div>


    </div>
    <div class="col-lg-8 ps-lg-2">
      <div class="">
        <div class="card mb-3" style="min-height: 90vh !important">
          <div class="card-header"  style="background-color: #232e3c">
            <h5 class="mb-0 text-light">{{__('messages.list_of')}} {{$choice}}</h5>
          </div>
          <div class="card-body bg-light table-responsive scrollbar">
            @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 3)->first()->voir == "yes")
            <table id="example" class="table table-striped table-bordered" style="width:100%" >
                <thead>
                    <tr>
                        <th>{{__('messages.image')}}</th>
                        <th>{{__('messages.name_of')}} {{$choice}}</th>

                        <th>{{__('messages.amount')}}</th>
                        <th>{{__('messages.acounting_account')}}</th>
                        <th>{{__('messages.taxes')}}</th>
                        <th style="width:2%">--</th>

                    </tr>
                </thead>
                <tbody >
                    @foreach ($Articles->where('type', $choice) as $article)
                    <tr>
                        <td><img src="{{asset($article->image??'assets/no-image.jpg')}}" width="40px" alt=""></td>
                        <td>{{$article->nom}} <br>
                           <strong style="color: black">{{__('messages.description')}}: <br></strong> {{$article->description}}
                        </td>


                        <td> {!!
                            formatpriceth($article->prix_unitaire, getCurrency()) !!}</td>

                        <td>

                         @if ($article->comptes_comptable_id)
                          {{getPlanComptable()->find($article->comptes_comptable_id)->nom ?? ''}}
                          @else

                          @endif 

                        </td>
                        <td>
                            @if ($article->taxe_id)
                            {{getTaxes()->find($article->taxe_id)->nom." ".getTaxes()->find($article->taxe_id)->taux."%"}}
                            @else
                            --
                            @endif
                        </td>
                        @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 3)->first()->modifier == "yes")
                        <td>
                            <small><a class="btn btn-primary bg-line-chart-gradient" href="{{route('entreprise.commerciale.article.edit', $article->id)}}"><i class="fas fa-pen-square"></i></a></small>
                        </td>
                        @else
                            @include('layouts.admin.required.includes.controle.accessDeniedBtnEdit')
                        @endif

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
              @else
                  @include('layouts.admin.required.includes.controle.accessDeniedshow')
              @endif


        </div>
        </div>

      </div>
    </div>
  </div>

@endsection
