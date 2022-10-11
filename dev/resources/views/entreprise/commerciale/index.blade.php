@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
<link href="{{asset('assets/admin/vendors/flatpickr/flatpickr.min.css')}}" rel="stylesheet" />
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
            <a href="{{route('entreprise.fournisseurs.list')}}" class="btn btn-dark text-light mr-2" style="margin-right: 1em ">Fournisseurs</a>

            <div class="btn-group" role="group">
                <button class="btn btn-success text-light dropdown-toggle" id="btnGroupVerticalDrop1" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ajouter une dépenses</button>
                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                   @if ($Depenses)

                        @if ($Depenses->where('type', "facture")->where('status', "draft")->first())
                        <a class="dropdown-item" href="{{route('entreprise.depense.new.facture', $Depenses->where('type', "facture")->where('status', "draft")->first()->id)}}">Facture à payer</a>
                        @else
                        <a class="dropdown-item" href="{{route('entreprise.depense.new.draft', 1)}}">Facture à payer</a>

                        @endif

                        @if ($Depenses->where('type', "depense")->where('status', "draft")->first())
                        <a class="dropdown-item" href="{{route('entreprise.depense.new.depense', $Depenses->where('type', "depense")->where('status', "draft")->first()->id)}}">Dépense</a>
                        @else
                        <a class="dropdown-item" href="{{route('entreprise.depense.new.draft', 2)}}">Dépense</a>
                        @endif

                        @if ($Depenses->where('type', "cheque")->where('status', "draft")->first())
                        <a class="dropdown-item" href="{{route('entreprise.depense.new.cheque', $Depenses->where('type', "cheque")->where('status', "draft")->first()->id)}}">Chèque</a>
                        @else
                        <a class="dropdown-item" href="{{route('entreprise.depense.new.draft', 3)}}">Chèque</a>
                        @endif

                        @if ($Depenses->where('type', "credit")->where('status', "draft")->first())
                        <a class="dropdown-item" href="{{route('entreprise.depense.new.creditFournisseurs', $Depenses->where('type', "credit")->where('status', "draft")->first()->id)}}">Crédit Fournisseur</a>
                        @else
                        <a class="dropdown-item" href="{{route('entreprise.depense.new.draft', 4)}}">Crédit Fournisseur</a>
                        @endif
                   @else
                   <a class="dropdown-item" href="{{route('entreprise.depense.new.draft', 1)}}">Facture à payer</a>
                   <a class="dropdown-item" href="{{route('entreprise.depense.new.draft', 2)}}">Dépense</a>
                   <a class="dropdown-item" href="{{route('entreprise.depense.new.draft', 3)}}">Chèque</a>
                   <a class="dropdown-item" href="{{route('entreprise.depense.new.draft', 4)}}">Crédit Fournisseur</a>
                   @endif



                </div>
              </div>

           </div>
        </div>
      </div>
    </div>
    <div class="card-body bg-light">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Bénéficiaire</th>
                    <th>N°</th>
                    <th>Catégorie</th>
                    <th>Note</th>
                    <th>Sous_total</th>
                    <th>Taxe</th>
                    <th>Total</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($Depenses->where('status', '!=', "draft") as $depense)
                <tr>
                    <td>{{$depense->created_at->format('d M Y')}}</td>
                    <td>{{$depense->type}}</td>
                    @if ($depense->fournisseur_id)
                    <td>{{$depense->fournisseur->entreprise??"ff"}}</td>

                    @elseif ($depense->clients_entreprise_id)
                    <td>{{$depense->clientsEntreprise->entreprise}}</td>

                    @endif
                    @if ($depense->type == "facture")
                    <td>{{$depense->facture->numero_facture}}</td>
                    @elseif ($depense->type == "depense")
                    <td>{{$depense->depensesSimple->reference}}</td>
                    @elseif ($depense->type == "cheque")
                    <td>{{$depense->cheque->numero_cheque}}</td>
                    @elseif ($depense->type == "credit")
                    <td>{{$depense->fournisseursCredit->note ??""}}</td>
                    @endif
                    <td>{{$depense->created_at->format('d M Y')}}</td>
                    @if ($depense->type == "facture")
                    <td>{{$depense->message}}</td>
                    @elseif ($depense->type == "depense")
                    <td>{{$depense->note}}</td>
                    @elseif ($depense->type == "cheque")
                    <td>{{$depense->note}}</td>
                    @elseif ($depense->type == "credit")
                    <td>{{$depense->note}}</td>
                    @endif
                    <td>{{$depense->total_sans_taxe}}</td>
                    <td>{{$depense->taxe}}</td>
                    <td>{{$depense->total}}</td>
                    <td><small><a class="btn btn-success" href="{{route('entreprise.depense.new.facture', $depense->id)}}">Modifier</a></small>
                    </td>
                </tr>
                @endforeach


            </tbody>
            <tfoot>
                <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Bénéficiaire</th>
                    <th>N°</th>
                    <th>Catégorie</th>
                    <th>Note</th>
                    <th>Sous-total</th>
                    <th>Taxe</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>

    </div>
  </div>

</div>

@endsection

@section('scripts')
<script src="{{asset('assets/admin/js/flatpickr.js')}}"></script>
@include('layouts.admin.required.extensions.js.datatable')
@endsection
