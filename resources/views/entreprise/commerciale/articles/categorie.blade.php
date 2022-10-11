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
          <h5 class="mb-0 text-light">{{__('messages.add_category')}}</h5>
        </div>

        <div class="card-body">
           @if ($type === "add")
           <form action="{{route('entreprise.commerciale.categorie.store')}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
            <div class="col-md-12">
                <label class="form-label" for="nom">{{__('messages.category_name')}}</label>
                <input class="form-control" name="nom" id="nom" type="text"  required="" />
            </div>

            <div class="col-md-12">
                <label class="form-label" for="type">{{__('messages.category_type')}}</label>
                <select class="form-select" name="type" id="type" required="">
                    <option selected="" disabled="" value="">{{__('messages.chose')}}</option>
                    <option value="produit">{{__('messages.product')}}</option>
                    <option value="service">{{__('messages.service')}}</option>
                </select>
                <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="sub_categorie">{{__('messages.sub_category')}}</label>
                <select class="form-select" name="sub_categorie" id="sub_categorie" >
                    <option selected="" disabled="" value="">{{__('messages.chose')}}</option>
                   @foreach ($Categories as $categorie)
                   <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                   @endforeach
                </select>
            </div>

            <div class="col-12 d-flex  justify-content-between">
                <button class="btn btn-success" type="submit">{{__('messages.add')}}</button>
                <a href="{{route('entreprise.commerciale.categories')}}" class="btn btn-primary mr-1  bg-line-chart-gradient " >{{__('messages.cancel')}}</a>
            </div>

        </form>
           @elseif ($type === "edit")
           <form action="{{route('entreprise.commerciale.categorie.update', $Categorie->id)}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
            <div class="col-md-4-12">
                <label class="form-label" for="nom">{{__('messages.category_name')}}</label>
                <input class="form-control" name="nom" value="{{$Categorie->nom}}" id="nom" type="text"  required="" />
            </div>

            <div class="col-md-12">
                <label class="form-label" for="type">{{__('messages.category_type')}}</label>
                <select class="form-select" name="type" id="type" required="">
                    <option selected="" disabled="" value="">{{__('messages.chose')}}</option>
                    <option  @if ($Categorie->type === "produit") selected @endif value="produit">{{__('messages.product')}}</option>
                    <option  @if ($Categorie->type === "service") selected @endif value="produit">{{__('messages.service')}}</option>
                </select>
                <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="sub_categorie">{{__('messages.sub_category')}}</label>
                <select class="form-select" name="sub_categorie" id="sub_categorie" >
                    <option selected="" disabled="" value="">{{__('messages.chose')}}</option>
                   @foreach ($Categories as $categorie)
                   <option @if ($Categorie->sub_categorie == $categorie->id) selected @endif  value="{{$categorie->id}}">{{$categorie->nom}}</option>
                   @endforeach
                </select>
            </div>

            <div class="col-12 d-flex  justify-content-between table-responsive scrollbar">
                <button class="btn btn-success" style="margin: 5px !important" type="submit">{{__('messages.update')}}</button>
                <a href="{{route('entreprise.commerciale.categories')}}" style="margin: 5px !important" class="btn btn-primary mr-1  bg-line-chart-gradient " >{{__('messages.cancel')}}</a>
                <a href="{{route('entreprise.commerciale.categorie.destroy', $categorie->id)}}" style="margin: 5px !important" class="btn mr-1 btn-danger" >{{__('messages.delete')}}</a>
            </div>

        </form>
           @endif
        </div>
      </div>


    </div>
    <div class="col-lg-8 ps-lg-2">
      <div class="">
        <div class="card mb-3" style="min-height: 90vh !important">
            <div class="card-header "  style="background-color: #232e3c">
            <h5 class="mb-0 text-light">{{__('messages.list_of')}}</h5>
          </div>
          <div class="card-body bg-light table-responsive scrollbar">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 50%">{{__('messages.category_name')}}</th>
                        <th>{{__('messages.type')}}</th>
                        <th>{{__('messages.sub_category')}}</th>
                        <th style="width:2% !important">{{__('messages.action')}}</th>
                    </tr>
                </thead>
                <tbody style="height: 68vh !important">
                    @foreach ($Categories as $categorie)
                    <tr>

                        <td>{{$categorie->nom}}</td>
                        <td>{{$categorie->type}}</td>
                        {{-- $Categories->find( --}}
                        <td>{{$Categories->find($categorie->sub_categorie)->nom??"no parent"}}</td>

                        <td class="align-left py-2 text-end">
                            <div class="dropdown font-sans-serif position-static">
                              <button class="btn bg-line-chart-gradient btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="customer-dropdown-0" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" style="color: cornsilk">
                                 <strong class="text-light">{{__('messages.option')}}</strong> <span class="fas fa-ellipsis-h text-light fs--1"></span>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="customer-dropdown-0">
                                <div class="bg-white py-2">
                                    <a class="dropdown-item btn btn-primary" href="{{route('entreprise.commerciale.categorie.edit', $categorie->id)}}">{{__('messages.edit')}}</a></small>
                                    <a class="dropdown-item btn btn-danger" href="{{route('entreprise.commerciale.categorie.destroy', $categorie->id)}}">{{__('messages.delete')}}</a></small>

                              </div>
                              </div>
                            </div>
                        <td>


                    </tr>
                    @endforeach


                </tbody>
                {{-- <tfoot>
                    <tr>
                        <th>Nom de la categorie</th>
                        <th>Type</th>
                        <th>Sous Categorie</th>
                        <th>Action</th>
                    </tr>
                </tfoot> --}}
            </table>

        </div>
        </div>

      </div>
    </div>
  </div>

@endsection

