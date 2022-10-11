@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
@endsection

@section('content')

@include('layouts.admin.required.includes.messages')

  <div class="card mb-3">
    <div class="card-header">
      <div class="row flex-between-end">
        <div class="col-auto align-self-center">
            <h4 >
                {{$PageName ?? "no page name (Déclarer la variable PageName sur le controlleur de cette view avec le nom de la page.)"}}
            </h4>
        </div>
        <div class="col-auto ms-auto">
          <div class="nav nav-pills nav-pills-falcon flex-grow-1" role="tablist">
            <a href="{{route('entreprise.fournisseur.addnew')}}" class="btn btn-dark text-light mr-2" style="margin-right: 1em ">{{__('messages.vendor_add')}}</a>

            <a href="" class="btn btn-success text-light">{{__('messages.see_expenses_list')}}</a>

           </div>
        </div>
      </div>
    </div>
    <div class="card-body bg-light">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>{{__('messages.logo')}}</th>
                    <th>{{__('messages.company')}}</th>
                    <th>{{__('messages.responsible')}}</th>
                    <th>{{__('messages.email')}}</th>
                    <th>{{__('messages.telephone')}}</th>
                    <th>{{__('messages.vendor')}}</th>
                    <th style="width:3em">{{__('messages.action')}}</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($Fournisseurs as $fournisseur)
                <tr>
                    <td>
                        <img src="{{asset($fournisseur->logo ?? 'assets/no-image.jpg')}}" height="40px" alt="">
                    </td>
                    <td>{{$fournisseur->entreprise}}</td>
                    <td>{{$fournisseur->prenom}} {{$fournisseur->nom}}</td>
                    <td>{{$fournisseur->email}}</td>
                    <td>{{$fournisseur->telephone}}</td>
                    <td>{{$fournisseur->created_at}}</td>

                    <td><small><a class="btn btn-success" href="{{route('entreprise.fournisseur.details', $fournisseur->id)}}">Afficher/Modifier</a></small>
                    </td>

                </tr>
                @endforeach


            </tbody>
            <tfoot>
                <tr>
                    <th>{{__('messages.logo')}}</th>
                    <th>{{__('messages.company')}}</th>
                    <th>{{__('messages.responsible')}}</th>
                    <th>{{__('messages.email')}}</th>
                    <th>{{__('messages.telephone')}}</th>
                    <th>{{__('messages.vendor')}}</th>
                    <th style="width:3em">{{__('messages.action')}}</th>

                </tr>
            </tfoot>
        </table>

    </div>
  </div>

</div>

@endsection

@section('scripts')
@include('layouts.admin.required.extensions.js.datatable')
@endsection
