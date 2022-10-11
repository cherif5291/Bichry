@extends('layouts.admin.admin')

@section('styles')
<link href="{{asset('assets/admin/vendors/flatpickr/flatpickr.min.css')}}" rel="stylesheet" />
{{-- @include('layouts.admin.required.extensions.styles.datatable') --}}

@endsection

@section('content')

@include('layouts.admin.required.includes.pageName')


<div class="row g-3 mb-3">
    <div class="col-lg-12">
        <div class="card h-100">
            {{-- <div class="card-header">
                <h5 class="mb-0">Billing Details</h5>
            </div> --}}
            <div class="card-body bg-light">

                <form action="{{route('entreprise.depense.changeDepenseSatus', $Depense->id)}}" method="POST">@csrf
                    <div class="row col-md-12 d-flex justify-content-between gx-3 mb-3">
                        <div class="col-md-6">
                            {{-- @dd($Facture) --}}
                            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                for="fournisseur">Fournisseur</label>

                            <div class="d-flex ">
                                <select class="mr-4 form-select mb-3" style="margin-right: 5px" name="fournisseur"
                                    id="fournisseur" aria-label="Default select example">
                                    
                                    <option hidden>choisir un fournisseur</option>
                                    <option value="addFournisseur"><button class="btn btn-danger addFournisseur"
                                            id="addFournisseur"><span
                                                style="color: red!important">+</span>Ajouter</button></option>
                                    @foreach ($Fournisseurs as $fournisseur)

                                    @php
                                    $value = "F".$fournisseur->id;
                                    @endphp
                                    <option @if ($Facture) @if ($Facture->fournisseur_id === $fournisseur->id) selected
                                        @endif @endif value="{{$value}}">{{$fournisseur->entreprise}}</option>
                                    @endforeach
                                </select>
                                <span><a href="javascript:void(0);" class="btn btn-success addFournisseur2">+</a></span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">

                            <div class=" justify-content-end"> <button type="submit"
                                    class="btn btn-success ">Enregistrer</button>
                                @include('layouts.admin.required.includes.errazer')
                            </div>

                        </div>

                    </div>

                    <div class="row gx-3 col-md-12 d-flex justify-content-between mb-3">
                        <div class="col-md-4">
                            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                for="adresse_facturation">Adresse Postale</label>
                            <input class="form-control" name="adresse_facturation" id="adresse_facturation" type="text"
                                value=" @if ($Facture) {{$Facture->adresse_facturation}} @endif" />

                        </div>

                        <div class="col-md-3">
                            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                for="has_taxe">Affichage des montants</label>
                            <select class="form-select mb-3" name="has_taxe" id="has_taxe"
                                aria-label="Default select example">
                                <option>Taxe non comprise</option>
                                <option>Taxe comprise</option>
                                <option>Champs hors taxe</option>


                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                for="numero_facture">Nº de la facture à payer</label>
                            <input class="form-control" id="numero_facture" name="numero_facture" type="text"
                                value="@if ($Facture) {{$Facture->numero_facture}} @endif {{old('numero_facture')}}" />
                        </div>

                    </div>

                    <div class="row gx-3 col-md-12  mb-3">
                        <div class="col-md-4">
                            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                for="cardNumber">Modalité</label>
                            <select class="form-select mb-3" name="paiements_modalite_id"
                                aria-label="Default select example" >
                                <option hidden>choisir</option>
                                <option>Autres</option>
                                <option value="addModalite">
                                    <button class="btn btn-danger" id="addModalite">
                                        <span style="color: red!important">+</span>Ajouter
                                    </button>
                                </option>
                                @foreach ($Modalites as $Modalite)
                                <option @if ($Facture)@if ($Facture->paiements_modalite_id === $Modalite->id) selected
                                    @endif @endif value="{{$Modalite->id}}">{{$Modalite->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                for="date_facturation">Date facturation</label>
                            <input class="form-control datetimepicker" name="date_facturation" id="date_facturation"
                                data-options='{"disableMobile":true}'
                                value=" @if ($Facture){{$Facture->date_facturation}}  @endif" type="text" />
                        </div>
                        <div class="col-md-4">
                            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                for="echeance">Date d'échéance</label>
                            <input class="form-control datetimepicker" name="echeance" id="echeance" type="text"
                                value=" @if ($Facture){{$Facture->echeance}}  @endif" />
                        </div>


                    </div>

                    <div class="col-md-12">
                        <div class="table-responsive scrollbar mt-4 fs--1">
                            <table id="test-table" class="table table-striped border-bottom">
                                <thead class="light">
                                    <tr class="bg-primary text-white dark__bg-1000">
                                        <th class="border-0">Categorie</th>
                                        <th class="border-0">Description</th>
                                        <th class="border-0 ">Montant</th>
                                        <th class="border-0 text-center">Taxe</th>
                                        <th class="border-0 text-center">Action</th>

                                    </tr>
                                </thead>
                                <tbody id="test-body">
                                    @foreach ($DepensePaniers as $Dcategorie)
                                    <tr>
                                        <td class="align-middle">
                                            <h6 class="mb-0 text-nowrap">{{$Dcategorie->designation}}</h6>
                                            {{-- <p class="mb-0">Down 35mb, Up 100mb</p> --}}
                                        </td>
                                        <td class="align-middle text-start">{{$Dcategorie->description}}</td>
                                        <td class="align-middle text-start">{{$Dcategorie->montant}}</td>
                                        @if ($Dcategorie->taxe_id >0)
                                        <td class="align-middle text-center">{{$Taxes->find($Dcategorie->taxe_id)->taux}}%
                                        </td>
                                        @else
                                        <td class="align-middle text-center">-</td>
                                        @endif
                                        <td class="align-middle text-center">
                                            <a href="{{route('admin.factures.panier.delete', $Dcategorie->id)}}">
                                                <i class="fa fa-trash text-danger"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr id="row0">
                                        <td>
                                            <select class="form-select mb-3" id="compte" name="comptes_comptable_id[]"
                                                aria-label="Default select example">
                                                <option value="">Choisir une catégorie</option>
                                                @foreach ($CompteComptables as $CompteComptable)
                                                <option value="{{$CompteComptable->id}}">
                                                    {{$CompteComptable->nom}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input class="form-control" id="decription" name="description[]"
                                                placeholder="Description" type="text" />
                                        </td>
                                        <td>
                                            <input class="form-control" id="montant" name="montant[]"
                                                placeholder="Montant" type="number" />
                                        </td>
                                        <td>
                                            <select class="form-select mb-3" name="taxe_id[]"
                                                aria-label="Default select example">
                                                <option value="-1">Pas de taxe</option>
                                                @foreach ($Taxes as $taxe)
                                                <option value="{{$taxe->id}}">{{$taxe->nom}}
                                                    ({{$taxe->taux}}%)</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="center"><input class="delete-row btn btn-sm btn-danger" type="button" value="Supprimer" />
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                            <input id="add-row" class="btn btn-success btn-sm" type="button" value='+ Nouvelle ligne' />
                            <input value="{{$CompteComptables}}" type="hidden" id="compte_compta" />
                            <input value="{{$Taxes}}" type="hidden" id="taxe_value" />
                        </div>
                        @if ($DepensePaniers)
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <table class="table table-sm table-borderless fs--1 text-end">
                                    <tr>
                                        <th class="text-900">Sous Total:</th>
                                        <td class="fw-semi-bold">
                                            {{$DepensePaniers->where('depense_id', $Depense->id)->sum('montant')}} </td>
                                    </tr>
                                    <tr>
                                        <th class="text-900">Taxe
                                            {{$DepensePaniers->where('depense_id',
                                            $Depense->id)->sum('taux_taxe')??0/$DepensePaniers->where('depense_id',
                                            $Depense->id)->count()}}%:
                                        </th>
                                        <td class="fw-semi-bold">
                                            {{$DepensePaniers->where('depense_id',
                                            $Depense->id)->sum('montant_taxe')??0}}
                                            Fcfa*</td>
                                    </tr>

                                    <tr class="border-top border-top-2 fw-bolder text-900">
                                        <th>SOLDE À PAYER :</th>
                                        <td>{{$DepensePaniers->where('depense_id', $Depense->id)->sum('total')}} FCFA*
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        @else
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <table class="table table-sm table-borderless fs--1 text-end">
                                    <tr>
                                        <th class="text-900">Sous Total:</th>
                                        <td class="fw-semi-bold">$18,230.00 </td>
                                    </tr>
                                    <tr>
                                        <th class="text-900">Taxe 0%:</th>
                                        <td class="fw-semi-bold">0 Fcfa*</td>
                                    </tr>

                                    <tr class="border-top border-top-2 fw-bolder text-900">
                                        <th>SOLDE À PAYER :</th>
                                        <td>0 FCFA*</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="row gx-3 col-md-12 d-flex justify-content-between mb-3">

                        <div class="col-md-8">
                            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                for="note">Memo</label>
                            <textarea name="note" id="" class="form-control" cols="30" id="note"
                                rows="4"> @if ($Facture) {{$Facture->message}} @endif</textarea>
                        </div>
                        <div class="col-md-4">

                            <div class="mt-2 col-md-12">
                                <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                    for="cardNumber">Pièce Jointe</label>
                                <input disabled class="form-control" id="customFile" type="file" />

                            </div>
                            <div class="mt-3 col-md-12">

                                <div class=" justify-content-end"> <button type="submit"
                                        class="btn btn-success ">Enregistrer</button>
                                    @include('layouts.admin.required.includes.errazer')
                                </div>

                            </div>

                        </div>

                    </div>
                </form>



            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaliteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content position-relative">
            <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                    <h4 class="mb-1" id="modalExampleDemoLabel">Ajout nouveau modalité </h4>
                </div>
                <div class="p-4 pb-0">
                    <form  action="" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="entreprise">Modalité</label>
                                <input class="form-control" name="entreprise" id="entreprise" type="text" required="" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="nom_chequier">Valeur</label>
                                <input class="form-control" name="nom_chequier" id="nom_chequier" type="text"
                                    required="" />
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="submit">Enregistrer </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content position-relative">
            <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                    <h4 class="mb-1" id="modalExampleDemoLabel">Ajout nouveau fournisseur </h4>
                </div>
                <div class="p-4 pb-0">
                    <form  action="{{route('entreprise.fournisseurs.new.store')}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="entreprise">Nom entreprise fournisseur</label>
                                <input class="form-control" name="entreprise" id="entreprise" type="text" required="" />
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="prenom">Prénom du responsable</label>
                                <input class="form-control" name="prenom" id="prenom" type="text" required="" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="nom">Nom du responsable</label>
                                <input class="form-control" name="nom" id="nom" type="text" required="" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="titre">Titre du responsable</label>
                                <input class="form-control" name="titre" id="titre" type="text" required="" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="col-form-label" for="recipient-name">Recipient:</label>
                                <input class="form-control" id="recipient-name" type="text" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="telephone">Téléphone</label>
                                <input class="form-control" name="telephone" id="telephone" type="text" required="" />
                            </div>


                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" name="email" id="email" type="text" />
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="numero_compte">Numéro de compte</label>
                                <input class="form-control" name="numero_compte" id="numero_compte" type="text" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="adresse">Adresse</label>
                                <input class="form-control" name="adresse" id="adresse" type="text">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="ville">Ville</label>
                                <input class="form-control" id="ville" name="ville" type="text" />
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="province">Province</label>
                                <input class="form-control" name="province" id="province" type="text" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="code_postal">Code Postal</label>
                                <input class="form-control" name="code_postal" id="code_postal" type="text" />
                            </div>


                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="pays">Pays</label>
                                <select class="form-select" name="pays" id="pays" required="">
                                    <option selected="" disabled="" value="">Chosir</option>
                                    <option value="Sénégal">Sénégal</option>
                                    <option value="Canada">Canada</option>

                                </select>
                                <div class="invalid-feedback">Vous devez choisir un pays</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="devises_monetaire_id">Devise monétaire</label>
                                <select class="form-select" name="devises_monetaire_id" id="devises_monetaire_id"
                                    required="">
                                    <option selected="" disabled="" value="">Choisir</option>
                                    @foreach ($DevisesMonetaires as $devise)
                                    <option value="{{$devise->id}}">{{$devise->nom}} {{$devise->sigle}}</option>
                                    @endforeach

                                </select>
                                <div class="invalid-feedback">Vous devez choisir une devise pour cette fournisseur</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="comptescomptable_id">Compte Comptable</label>
                                <select class="form-select" name="comptescomptable_id" id="comptescomptable_id"
                                    required="">
                                    <option disabled="" value="">Choisir</option>

                                    @foreach ($ComptesComptables as $ccomptable)
                                    <option value="{{$ccomptable->id}}">{{$ccomptable->nom}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Vous devez choisir un pays</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="paiements_modalite_id">Mode de paiement souhaité</label>
                                <select class="form-select" name="paiements_modalite_id" id="paiements_modalite_id"
                                    required="">
                                    <option disabled="" value="">Choisir</option>

                                    @foreach ($ModesPaiements as $pmode)
                                    <option value="{{$pmode->id}}">{{$pmode->nom}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Vous devez choisir un mode de paiement</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="validationCustom05">Note du fournisseur</label>
                                <textarea class="form-control" name="" id="" cols="5" rows="5"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label" for="message-text">Message:</label>
                                <textarea class="form-control" id="message-text" cols="5" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="submit">Enregistrer </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>


@include('layouts.admin.required.extensions.js.dynamicCategoryAdd')

<script>
    $(document).ready(function() {

    $(document).on("click", ".addFournisseur2", function () {
        $('#myModal').modal('show');
    });

    $('select[name=fournisseur]').change(function() {
        if ($(this).val() == 'addFournisseur')
        {
            $('#myModal').modal('show');
        }
    });

    $('select[name=paiements_modalite_id]').change(function() {
        if ($(this).val() == 'addModalite')
        {
            $('#modaliteModal').modal('show');
        }
    });

});
</script>
<script src="{{asset('assets/admin/js/flatpickr.js')}}"></script>
{{-- <script type="text/javascript">
    function submitform() {
        document.depenseUp.submit();
    }

</script> --}}

@endsection
