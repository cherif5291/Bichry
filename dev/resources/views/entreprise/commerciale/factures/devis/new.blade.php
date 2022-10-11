@extends('layouts.admin.admin')

@section('styles')
<link href="{{asset('assets/admin/vendors/flatpickr/flatpickr.min.css')}}" rel="stylesheet" />
@include('layouts.admin.required.extensions.styles.datatable')
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

        <form action="{{route('entreprise.devis.changedevistatus', $devis->id)}}" method="POST">@csrf
                <div class="row col-md-12 d-flex justify-content-between gx-3 mb-3">
                    <div class="col-md-5">

                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="fournisseur">Client</label>
                    <select class="form-select mb-3" name="fournisseur" id="fournisseur" aria-label="Default select example">
                        <option>choisir un client</option>

                        @foreach ($Clients as $client)

                        <option  @if ($devis->client_id == $client->id) selected @endif  value="{{$client->id}}">{{$client->entreprise}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="cc_cci">CC CCI</label>
                        <input class="form-control" name="cc_cci" id="cc_cci" type="text" value="" />

                    </div>
                    <div class="col-md-3 mt-3 ">

                        <div class=" justify-content-end">  <button type="submit" class="btn btn-success ">Enregistrer</button>
                            @include('layouts.admin.required.includes.errazer')
                        </div>

                    </div>

                </div>

              <div class="row gx-3 col-md-12 d-flex justify-content-between mb-3">
                <div class="col-md-6">
                  <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="adresse_facturation">Adresse de facturation</label>
                  <input class="form-control" name="adresse_facturation" id="adresse_facturation" type="text" value=" @if ($devis) {{$devis->adresse_facturation}} @endif" />

                </div>
                <div class="col-md-4">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="cardNumber">Modalité</label>
                    <select class="form-select mb-3" name="paiements_modalite_id" aria-label="Default select example">
                      <option >choisir</option>
                      @foreach ($Modalites as $Modalite)
                      <option @if ($devis)@if ($devis->paiements_modalite_id === $Modalite->id) selected @endif @endif value="{{$Modalite->id}}">{{$Modalite->nom}}</option>
                      @endforeach
                    </select>
                  </div>


              </div>

              <div class="row gx-3 col-md-12  mb-3">

            <div class="col-md-4">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="date_facturation">Date facturation</label>
                    <input class="form-control datetimepicker" name="date_facturation" data-options='{"disableMobile":true}' id="date_facturation" value=" @if ($devis){{$devis->date_facturation}}  @endif"   type="text" />
                </div>
                <div class="col-md-4">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="echeance">Date d'échéance</label>
                    <input class="form-control datetimepicker" name="echeance" id="echeance"  type="text" value=" @if ($devis){{$devis->echeance}}  @endif" />
                </div>

                <div class="col-md-4">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="numero_devis">Nº de la devis</label>
                    <input class="form-control" id="numero_devis" name="numero_devis" type="text" value=" @if ($devis) {{$devis->numero_devis}} @endif" />
            </div>


              </div>
              <div class="row gx-3 col-md-12 d-flex justify-content-between mb-3">

                <div class="col-md-4">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="message">Message sur la devis</label>
                    <textarea name="message" id="" class="form-control" cols="30" id="message" rows="4"> @if ($devis) {{$devis->message}} @endif</textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="message_affiche">Message affiché sur le relevé</label>
                    <textarea name="message_affiche" id="" class="form-control" cols="30" id="message_affiche" rows="4"> @if ($devis) {{$devis->message_affiche}} @endif</textarea>
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
                      @foreach ($DepensePaniers as $article)
                      <tr>
                        <td class="align-middle">
                          <h6 class="mb-0 text-nowrap">{{$article->designation}}</h6>
                          {{-- <p class="mb-0">Down 35mb, Up 100mb</p> --}}
                        </td>
                        <td class="align-middle text-center">{{$article->description}}</td>
                        <td class="align-middle text-end">{{$article->montant}}</td>
                        @if ($article->taxe_id >0)
                        <td class="align-middle text-end">{{$Taxes->find($article->taxe_id)->taux}}%</td>
                        @else
                        <td class="align-middle text-end">-</td>
                        @endif
                        <td class="align-middle text-end">
                            <a href="{{route('admin.devis.panier.delete', $article->id)}}">
                            <i class="fa fa-trash text-danger"></i></a></td>
                      </tr>
                      @endforeach

                    <tr>
                        <td class="align-middle">
                          <h6 class="mb-0 text-nowrap">

                          </h6>


                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#error-modal"> Ajouter une ligne</button>
                            <div class="modal " id="error-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 45vw">
                                <div class="modal-content position-relative" >
                                    <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">

                                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-0">
                                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                        <h4 class="mb-1" id="modalExampleDemoLabel">Ajouter un produit ou service à devisr</h4>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <form action="{{route('entreprise.devis.addArticletoDepense')}}" method="POST" class="col-md-12 row"> @csrf
                                               <div class="col-md-12">
                                                    <select class="form-select mb-3" name="article_id" aria-label="Default select example">
                                                        <option >Choisir un <article></article></option>
                                                        @foreach ($Articles as $article)
                                                        <option value="{{$article->id}}">{{$article->nom}}</option>
                                                        @endforeach
                                                    </select>
                                               </div>
                                               <div class="mt-3 col-md-6">
                                                    <select class="form-select mb-3" name="taxe_id" aria-label="Default select example">
                                                        <option value="-1">pas de taxe</option>
                                                        @foreach ($Taxes as $taxe)
                                                        <option value="{{$taxe->id}}">{{$taxe->nom}} ({{$taxe->taux}}%)</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mt-3 col-md-6">
                                                    <input class="form-control" hidden name="devis_id" type="text" min="1" value="{{$devis->id}}" />

                                                    <input class="form-control" id="qte" placeholder="Quantité" name="qte" type="text" min="1" value="1" />
                                                </div>


                                               <div class="col-md-6 d-flex mb-4 justify-content-between">
                                                <button type="submit" style="width: 65% ; margin-right:5px !important" class=" btn btn-success mt-3 mr-2">Ajouter</button>
                                                <button style="width: 65%; margin-left:5px !important" type="button"  data-bs-dismiss="modal" class=" ml-2 btn btn-danger mt-3">Annuler</button>
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
                      <td class="fw-semi-bold">{{$DepensePaniers->where('devis_id', $devis->id)->sum('montant')}} </td>
                    </tr>
                    <tr>
                      <th class="text-900">Taxe {{$DepensePaniers->where('devis_id', $devis->id)->sum('taux_taxe')??0/$DepensePaniers->where('devis_id', $devis->id)->count()}}%:</th>
                      <td class="fw-semi-bold">{{$DepensePaniers->where('devis_id', $devis->id)->sum('montant_taxe')??0}} Fcfa*</td>
                    </tr>

                    <tr class="border-top border-top-2 fw-bolder text-900">
                      <th>SOLDE À PAYER :</th>
                      <td>{{$DepensePaniers->where('devis_id', $devis->id)->sum('total')}} FCFA*</td>
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



  </div>
@endsection

@section('scripts')
<script src="{{asset('assets/admin/js/flatpickr.js')}}"></script>
<script type="text/javascript">
    function submitform() {   document.depenseUp.submit(); }
</script>
@endsection
