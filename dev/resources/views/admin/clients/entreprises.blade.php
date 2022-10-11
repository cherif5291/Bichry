@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
@endsection

@section('content')

  @include('layouts.admin.required.includes.pageName')

  <div class="card mb-3">
    <div class="card-header">
      <div class="row flex-between-end">
        <div class="col-auto align-self-center">
          {{-- <h5 class="mb-0" data-anchor="data-anchor">Example</h5> --}}
        </div>
        <div class="col-auto ms-auto">
          <div class="nav nav-pills nav-pills-falcon flex-grow-1" role="tablist">
            <a href="{{route('entreprise.client.add')}}" class="btn btn-dark text-light mr-2" style="margin-right: 1em ">Ajouter un nouveau client</a>

            {{-- <a href="{{route('entreprise.client.type')}}" class="btn btn-success text-light">Type de client</a> --}}

           </div>
        </div>
      </div>
    </div>
    <div class="card-body bg-light">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Entreprise</th>
                    <th>Responsable</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Packs & Création</th>
                    <th style="width:3em">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($Clients as $client)
                <tr>
                    <td>
                        <img src="{{asset($client->logo ?? 'assets/no-image.jpg')}}" height="40px" alt="">
                    </td>
                    <td>{{$client->entreprise}}</td>
                    <td>{{$client->prenom}} {{$client->nom}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->telephone}}</td>
                    <td> <strong class="badge bg-info">No renseigné</strong><br>
                        {{$client->created_at->format('d M Y')}}</td>

                    <td><small><a class="btn btn-success" href="{{route('entreprise.client.dossier', $client->id)}}">Dossier</a></small>
                    </td>

                </tr>
                @endforeach


            </tbody>
            <tfoot>
                <tr>
                    <th>Logo</th>
                    <th>Entreprise</th>
                    <th>Responsable</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Packs & Création</th>
                    <th>Action</th>
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
