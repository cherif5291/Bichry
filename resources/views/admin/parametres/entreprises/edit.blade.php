@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
@endsection

@section('content')

@include('layouts.admin.required.includes.messages')

<div class="card mb-3">

    <div class="card-body bg-light">
        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel"
                aria-labelledby="tab-dom-f6012467-4a1f-4b44-baf9-8005e8007fac"
                id="dom-f6012467-4a1f-4b44-baf9-8005e8007fac">
                <div class="row mb-4 flex-between-end">
                    <div class="col-auto align-self-center">
                        <h4 >
                            {{$PageName ?? "no page name (Déclarer la variable PageName sur le controlleur de cette view avec le nom de la page.)"}}
                        </h4>
                    </div>
                   
                </div>
                <form action="{{route('admin.client.update', $Entreprise->id)}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                    <div class="col-md-4">
                        <label class="form-label" for="entreprise">{{__('messages.client_name')}}</label>
                        <input class="form-control" name="entreprise" id="entreprise" type="text" value="{{$Entreprise->entreprise}}" required="" />
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>

                    </div>


                    <div class="col-md-3">
                        <label class="form-label" for="prenom">{{__('messages.vendor_user_first_name')}}</label>
                        <input class="form-control" name="prenom" id="prenom" type="text" value="{{$Entreprise->prenom}}" required="" />
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>

                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="nom">{{__('messages.vendor_user_last_name')}}</label>
                        <input class="form-control" name="nom" id="nom" type="text" value="{{$Entreprise->nom}}" required="" />
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>

                    </div>
                    <div class="col-md-2">
                        <label class="form-label" for="titre">{{__('messages.vendor_user_position')}}</label>
                        <input class="form-control" name="titre" id="titre" type="text" value="{{$Entreprise->titre}}" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="telephone">{{__('messages.telephone')}}</label>
                        <input class="form-control" name="telephone" id="telephone" type="text" value="{{$Entreprise->telephone}}" required="" />
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>

                    </div>


                    <div class="col-md-4">
                        <label class="form-label" for="email">{{__('messages.email')}}</label>
                        <input class="form-control" name="email" id="email" type="text" value="{{$Entreprise->email}}" required=""/>
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>

                    </div>


                    <div class="col-md-6">
                        <label class="form-label" for="adresse">{{__('messages.address')}}</label>
                        <input class="form-control" name="adresse" id="adresse" type="text" value="{{$Entreprise->adresse}}"/>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="ville">{{__('messages.town')}}</label>
                        <input class="form-control" id="ville" name="ville" type="text" value="{{$Entreprise->ville}}"/>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label" for="province">{{__('messages.province')}}</label>
                        <input class="form-control" name="province" id="province" type="text" value="{{$Entreprise->province}}"/>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="code_postal">{{__('messages.postal_code')}}</label>
                        <input class="form-control" name="code_postale" id="code_postale" type="text" value="{{$Entreprise->code_postale}}"/>
                    </div>


                    <div class="col-md-3">
                        <label class="form-label" for="pays">{{__('messages.country')}}</label>
                        <select class="form-select js-example-basic-single" id="example-select" name="pays" id="pays" required="">
                            <option selected="" disabled="" value="">{{__('messages.chose')}}</option>
                            @foreach (getPays() as $pays)
                            <option @if ($Entreprise->pays == $pays->nom) selected  @endif  value="{{$pays->nom}}">{{$pays->nom}}</option>
                            @endforeach

                        </select>
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>
                    </div>


                    {{-- <div class="col-md-3">
                        <label class="form-label" for="devises_monetaire_id">{{__('messages.currency')}}</label>
                        <select class="form-select" name="devises_monetaire_id" id="devises_monetaire_id" required="">
                            <option selected="" disabled="" value="">{{__('messages.chose')}}</option>
                            @foreach ($DevisesMonetaires as $devise)
                            <option  @if ($Entreprise->devises_monetaire_id === $devise->id) selected  @endif value="{{$devise->id}}">{{$devise->nom}} ({{$devise->sigle}})</option>
                        @endforeach

                        </select>
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>
                    </div> --}}

                    <div class="col-md-3">
                        <label class="form-label" for="paiements_modalite_id">{{__('messages.payment_modality')}} {{__('messages.wishes')}}</label>
                        <select class="form-select" name="comptescomptable_id" id="comptescomptable_id" >
                            <option disabled="" value="">{{__('messages.chose')}}</option>

                        @foreach ($ModalitePaiements as $modalite)
                            <option  @if ($Entreprise->paiements_modalite_id === $modalite->id) selected  @endif value="{{$modalite->id}}">{{$modalite->nom}}</option>
                        @endforeach
                        </select>
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="paiements_mode_id">{{__('messages.payment_mode')}} {{__('messages.wishes')}}</label>
                        <select class="form-select" name="paiements_mode_id" id="paiements_mode_id" >
                            <option disabled="" value="">{{__('messages.chose')}}</option>

                        @foreach ($ModesPaiements as $pmode)
                            <option  @if ($Entreprise->paiements_mode_id === $pmode->id) selected  @endif value="{{$pmode->id}}">{{$pmode->nom}}</option>
                        @endforeach
                        </select>
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="validationCustom05">{{__('messages.note')}}</label>
                        <textarea  class="form-control" name="note" id="" cols="30" rows="10">{{$Entreprise->note}}</textarea>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">{{__('messages.update')}}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection

