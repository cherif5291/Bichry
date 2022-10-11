@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
@endsection

@section('content')

@include('layouts.admin.required.includes.pageName')


  <div class="row g-3 mb-3">
    <div class="col-lg-9">
      <div class="card h-100">
        {{-- <div class="card-header">
          <h5 class="mb-0">Billing Details</h5>
        </div> --}}
        <div class="card-body bg-light">

        <form action="{{route('entreprise.depense.changeDepenseSatus', $Depense->id)}}" method="POST">@csrf
            <div class="row col-md-12 d-flex justify-content-between gx-3 mb-3">
                <div class="col-md-6">
                  <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="fournisseur">Fournisseur</label>
                  <select class="form-select mb-3" name="fournisseur" type="text" >
                    {{--
                    @if ($DepenseSimple) @if ($DepenseSimple->clients_entreprise_id === $client->id) selected @endif @endif --}}
                    <option >choisir un fournisseur depense</option>
                    @foreach ($Fournisseurs as $fournisseur)
                    @php
                        $value = "F".$fournisseur->id;
                    @endphp
                    <option value="{{$value}}" @if ($Depense->fournisseur_id === $fournisseur->id) selected @endif >{{$fournisseur->entreprise}}</option>
                    @endforeach
                    @foreach ($Clients as $client)
                    @php
                        $value2 = "C".$client->id;
                    @endphp
                    <option value="{{$value2}}"   @if ($Depense->clients_entreprise_id === $client->id) selected @endif >{{$client->entreprise}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                  </div>

              </div>

              <div class="row gx-3 col-md-12 d-flex justify-content-between mb-3">


              </div>

              <div class="row gx-3 col-md-12 d-flex justify-content-between  mb-3">
                <div class="col-md-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="adresse_postale">Addresse Postale</label>
                        <input class="form-control" id="adresse_postale" name="adresse_postale" type="text" value=" @if ($CreditFournisseur) {{$CreditFournisseur->adresse_postale}} @endif" />
                </div>

                <div class="col-md-3">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="date_paiement">Date de Paiement</label>
                    <input class="form-control" name="date_paiement" id="date_paiement" value=" @if ($CreditFournisseur){{$CreditFournisseur->date_paiement}}  @endif"   type="date" />
                </div>
                <div class="col-md-3">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="reference">Nº de référence</label>
                    <input class="form-control" id="reference" name="reference" type="text" value=" @if ($CreditFournisseur) {{$CreditFournisseur->reference}} @endif" />
                </div>

              </div>
              <div class="row gx-3 col-md-12 d-flex justify-content-between mb-3">

                <div class="col-md-8">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="note">Memo</label>
                    <textarea name="note" id="" class="form-control" cols="30" id="note" rows="4"> @if ($CreditFournisseur) {{$CreditFournisseur->note}} @endif</textarea>
                </div>
                <div class="col-md-4">
                   <div>
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="has_taxe">Affichage des montants</label>
                    <select class="form-select mb-3" name="has_taxe" id="has_taxe" aria-label="Default select example">
                        <option >Taxe non comprise</option>
                        <option >Taxe comprise</option>
                        <option >Champs hors taxe</option>


                      </select>
                   </div>
                   <div class="mt-2">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="cardNumber">Pièce Jointe</label>
                    <input disabled class="form-control" id="customFile" type="file" />

                   </div>
                </div>

              </div>
        </form>


          <div class="col-md-12">
            <div class="table-responsive scrollbar mt-4 fs--1">
                <table class="table table-striped border-bottom">
                  <thead class="light">
                    <tr class="bg-primary text-white dark__bg-1000">
                      <th class="border-0">Categorie</th>
                      <th class="border-0 text-center">Description</th>
                      <th class="border-0 text-end">Montant</th>
                      <th class="border-0 text-end">Taxe</th>
                      <th class="border-0 text-end"></th>

                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($DepensePaniers as $Dcategorie)
                      <tr>
                        <td class="align-middle">
                          <h6 class="mb-0 text-nowrap">{{$Dcategorie->designation}}</h6>
                          {{-- <p class="mb-0">Down 35mb, Up 100mb</p> --}}
                        </td>
                        <td class="align-middle text-center">{{$Dcategorie->description}}</td>
                        <td class="align-middle text-end">{{$Dcategorie->montant}}</td>
                        @if ($Dcategorie->taxe_id >0)
                        <td class="align-middle text-end">{{$Taxes->find($Dcategorie->taxe_id)->taux}}%</td>
                        @else
                        <td class="align-middle text-end">-</td>
                        @endif
                        <td class="align-middle text-end"><i class="fa fa-trash text-danger"></i></td>
                      </tr>
                      @endforeach

                    <tr>
                        <td class="align-middle">
                          <h6 class="mb-0 text-nowrap">

                          </h6>


                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#error-modal"> Ajouter une ligne</button>
                            <div class="modal " id="error-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 85vw">
                                <div class="modal-content position-relative" >
                                    <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">

                                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-0">
                                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                        <h4 class="mb-1" id="modalExampleDemoLabel">Ajouter une catégorie</h4>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <form action="{{route('entreprise.depense.addCategorytoDepense')}}" method="POST" class="col-md-12 row"> @csrf
                                            <div class="col-md-6">
                                                <select class="form-select mb-3" name="comptes_comptable_id" aria-label="Default select example">
                                                    <option >Choisir une catégorie</option>
                                                    @foreach ($CompteComptables as $CompteComptable)
                                                    <option value="{{$CompteComptable->id}}">{{$CompteComptable->nom}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="">
                                                    <input class="form-control" id="montant" name="montant" placeholder="Montant"  type="number" />
                                                    <input hidden class="form-control" id="idd" name="depense_id" value="{{$Depense->id}}"  type="number" />

                                                </div>
                                                <div class="mt-3">
                                                    <select class="form-select mb-3" name="taxe_id" aria-label="Default select example">
                                                        <option value="-1">pas de taxe</option>
                                                        @foreach ($Taxes as $taxe)
                                                        <option value="{{$taxe->id}}">{{$taxe->nom}} ({{$taxe->taux}}%)</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <textarea name="description" placeholder="description" class="form-control mb-1" id="" cols="30" rows="3"></textarea>
                                               <div class="d-flex justify-content-between">
                                                <button type="submit" style="width: 65% ; margin-right:5px !important" class=" btn btn-success mt-3 mr-2">Ajouter</button>
                                                <button style="width: 65%; margin-left:5px !important" type="button"  data-bs-dismiss="modal" class=" ml-2 btn btn-danger mt-3">Annuler</button>


                                               </div>
                                            </div>


                                        </form>
                                    </div>
                                    </div>

                                </div>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle text-center">-</td>
                        <td class="align-middle text-end">-</td>
                        <td class="align-middle text-end">-</td>
                        <td class="align-middle text-end"><i class="fa fa-trash"></i></td>
                      </tr>

                  </tbody>
                </table>
              </div>
              @if ($DepensePaniers)
              <div class="row justify-content-end">
                <div class="col-auto">
                  <table class="table table-sm table-borderless fs--1 text-end">
                    <tr>
                      <th class="text-900">Sous Total:</th>
                      <td class="fw-semi-bold">{{$DepensePaniers->where('depense_id', $Depense->id)->sum('montant')}} </td>
                    </tr>
                    <tr>
                      <th class="text-900">Taxe {{$DepensePaniers->where('depense_id', $Depense->id)->sum('taux_taxe')??0/$DepensePaniers->where('depense_id', $Depense->id)->count()}}%:</th>
                      <td class="fw-semi-bold">{{$DepensePaniers->where('depense_id', $Depense->id)->sum('montant_taxe')??0}} Fcfa*</td>
                    </tr>

                    <tr class="border-top border-top-2 fw-bolder text-900">
                      <th>SOLDE À PAYER :</th>
                      <td>{{$DepensePaniers->where('depense_id', $Depense->id)->sum('total')}} FCFA*</td>
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






        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card h-100">

        <div class="card-body bg-light">

          <div class="d-flex justify-content-between fs--1 mb-1 text-danger">
            <p class="mb-0">Taxe</p><span>{{$DepensePaniers->where('depense_id', $Depense->id)->sum('montant_taxe')??0}} Fcfa*</span>
          </div>
          <div class="d-flex justify-content-between fs--1 mb-1">
            <p class="mb-0">Sous-total</p><span>{{$DepensePaniers->where('depense_id', $Depense->id)->sum('total')??0}} Fcfa*</span>
          </div>
          <hr />
          <h5 class="d-flex justify-content-between"><span>SOLDE À PAYER</span><span>{{$DepensePaniers->where('depense_id', $Depense->id)->sum('total')??0}} Fcfa*</span></h5>
          {{-- <a href="javascript: submitform()">Search</a> --}}
          <button type="#submit" fo class="btn btn-success d-block w-100 mt-2"><span class="fa fa-sync me-2"></span>Mettre a jour et fermer</button>
          <button class="btn btn-danger d-block w-100 mt-2" type="submit"><span class="fa fa-trash me-2"></span>Supprimer</button>


          {{-- <div class="text-center mt-2"><small class="d-inline-block">By continuing, you are agreeing to our subscriber <a href="#!">terms</a> and will be charged at the end of the trial. </small></div> --}}
        </div>
      </div>
    </div>


  </div>
@endsection

@section('scripts')
<script type="text/javascript">
    function submitform() {   document.depenseUp.submit(); }
</script>
@endsection
