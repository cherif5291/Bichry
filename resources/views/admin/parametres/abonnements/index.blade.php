@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
@endsection

@section('content')


<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0" data-anchor="data-anchor">{{$PageName??""}}</h5>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="row col-md-12">
            {{-- <div class="col-md-7 "> --}}

                <div class="card h-100">
                    <div class="tab-content border-x border-bottom p-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab-utilisateurs" role="tabpanel"
                            aria-labelledby="tab-utilisateurs">
                            <div class="row g-0">
                                <div class="col-lg-12 ps-lg-2">
                                    <div class="sticky-sidebar">
                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Entreprise</th>
                                                    <th>Contacts</th>
                                                    <th>Abonnement</th>

                                                    <th>Date</th>

                                                    <th style="width: 5%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($Abonnements as $abonnement)
                                                <tr>

                                                    <td><strong>{{$abonnement->entreprise->nom_entreprise}}</strong> <br>
                                                       
                                                    </td>
                                                    <td>
                                                        Email: {{$abonnement->entreprise->email}} <br>
                                                        Téléphone: {{$abonnement->entreprise->telephone}}
                                                    </td>

                                                    <td> {{ getPackages()->find($abonnement->package_id)->nom??"Introuvable" }}
                                                       
                                                    </td>
                                                    <td>
                                                        {{$abonnement->created_at ?? ''}}
                                                    </td>

                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn dropdown-toggle mb-2 btn-primary"
                                                                type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">Option
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="{{route('admin.clients.abonnementshow', $abonnement->id)}}">Détails</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item text-danger" href="#">Désactiver</a>

                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                @endforeach


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Entreprise</th>
                                                    <th>Abonnement</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>


            {{-- </div> --}}
           
        </div>
    </div>
</div>

</div>

@endsection

@section('scripts')
@include('layouts.admin.required.extensions.js.datatable')
@endsection
