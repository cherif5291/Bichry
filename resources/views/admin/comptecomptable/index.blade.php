@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
@endsection

@section('content')

@include('layouts.admin.required.includes.messages')

  <div class="row g-0">
    <div class="col-lg-4 pe-lg-2">
      <div class="card mb-3">
       
           @if ($type === "add")
           <div class="card-header "  style="background-color: #232e3c">
            <h5 class="mb-0 text-light">{{__('messages.accounting_account_add')}}</h5>
          </div>
  
          <div class="card-body"> 
            {{-- @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 3)->first()->ajouter == "yes") --}}
            <form action="{{route('admin.compte-comptable.default.store')}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                <div class="col-md-12">
                    <label class="form-label" for="nom">{{__('messages.name')}}</label>
                    <input class="form-control" name="nom" id="nom" type="text"  required="" />
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="numero_compte">{{__('messages.account_number')}}</label>
                    <input class="form-control" name="numero_compte" id="nom" type="number"  required="" />

                </div>
                <div class="col-md-12">
                    <label class="form-label" for="type_compte">Type de compte</label>
                    <input class="form-control" name="type_compte" id="type_compte" type="text"  required="" />
                </div>

                <div class="col-12 d-flex  justify-content-between table-responsive scrollbar">
                    <button class="btn btn-success mr-1 " type="submit" style="margin: 5px !important">{{__('messages.save')}}</button>
                    <a href="{{route('admin.compte-comptable.default')}}"  style="margin: 5px !important" class="btn btn-primary mr-1  bg-line-chart-gradient " >{{__('messages.cancel')}}</a>

                </div>

            </form>
            {{-- @else
            @include('layouts.admin.required.includes.controle.accessDeniedAdd') --}}

            {{-- @endif --}}

           @elseif ($type === "edit")
           <div class="card-header "  style="background-color: #232e3c">
            <h5 class="mb-0 text-light">{{__('messages.accounting_account_edit')}}</h5>
          </div>
  
          <div class="card-body"> 
            {{-- @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 3)->first()->ajouter == "yes") --}}
                <form action="{{route('admin.compte-comptable.default.update', $Comptescomptable->id)}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                    <div class="col-md-12">
                        <label class="form-label" for="nom">{{__('messages.name_of')}} {{__('messages.accounting_account')}}</label>
                        <input class="form-control" value="{{$Comptescomptable->nom}}" name="nom" id="nom" type="text"  required="" />
                    </div>


                    <div class="col-md-12">
                        <label class="form-label" for="nom">{{__('messages.account_number')}}</label>
                        <input class="form-control" name="numero_compte" value="{{$Comptescomptable->numero_compte}}" id="nom" type="number"  required="" />

                    </div>


                    <div class="col-12 d-flex  justify-content-between table-responsive scrollbar">
                        <button class="btn btn-success mr-1 " type="submit" style="margin: 5px !important">{{__('messages.update')}}</button>
                        <a href="{{route('admin.compte-comptable.default')}}"  style="margin: 5px !important" class="btn btn-primary mr-1  bg-line-chart-gradient " >{{__('messages.cancel')}}</a>
                        <a href="{{route('admin.compte-comptable.default.delete', $Comptescomptable->id)}}"  style="margin: 5px !important"  class="btn mr-1 btn-danger" >{{__('messages.delete')}}</a>

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

                        <th style="width:2%">{{__('messages.action')}}</th>

                    </tr>
                </thead>
                <tbody >
                    @foreach ($Comptescomptables as $compte)
                    <tr>

                        <td>{{$compte->nom}}</td>
                        <td>{{$compte->numero_compte}}</td>

                        {{-- @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 3)->first()->modifier == "yes") --}}
                        <td>
                            <small><a class="btn btn-primary bg-line-chart-gradient" href="{{route('admin.compte-comptable.default.edit', $compte->id)}}"><i class="fas fa-pen-square"></i></a></small>
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

@endsection

