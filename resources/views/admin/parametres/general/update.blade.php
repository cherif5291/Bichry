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
        @include('admin.parametres.index')
          <div class="tab-content border-x border-bottom p-3" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-home" role="tabpanel" aria-labelledby="home-tab">
                <form action="{{route('admin.parametres.update')}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                    <div class="col-md-4">
                        <label class="form-label" for="nom_plateforme">Nom entreprise</label>
                        <input class="form-control" name="nom_plateforme" value="{{$InfosSystem->nom_plateforme??""}}" id="nom_plateforme" type="text"required="" />
                    </div>

                    <div class="col-md-8">
                        <label class="form-label" for="slogan">Slogan</label>
                        <input class="form-control" name="slogan" id="slogan"  value="{{$InfosSystem->slogan??""}}" type="text"  required="" />
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="description">Apropos de l'application</label>
                        <textarea  class="form-control" name="description" id="description"  value="" cols="30" rows="10">{{$InfosSystem->description??""}}</textarea>
                    </div>


                    <div class="col-md-3">
                        <label class="form-label" for="telephone">Téléphone</label>
                        <input class="form-control" name="telephone" id="telephone"  value="{{$InfosSystem->telephone??""}}" type="text"  required="" />
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="whatsapp">Whatsapp</label>
                        <input class="form-control" name="whatsapp" id="whatsapp"  value="{{$InfosSystem->whatsapp??""}}" type="text" required="" />
                    </div>



                    <div class="col-md-3">
                        <label class="form-label" for="email_contact">Email contact</label>
                        <input class="form-control" name="email_contact"  value="{{$InfosSystem->email_contact??""}}" id="email_contact" type="text" />
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="email_support">Email support</label>
                        <input class="form-control" name="email_support"  value="{{$InfosSystem->email_support??""}}" id="email_support" type="text" />
                    </div>


                    <div class="col-md-3">
                        <label class="form-label" for="adresse">Adresse</label>
                        <input class="form-control" name="adresse"  value="{{$InfosSystem->adresse??""}}" id="adresse" type="text" />
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="ville">Ville</label>
                        <input class="form-control" id="ville"  value="{{$InfosSystem->ville??""}}" name="ville" type="text" />
                    </div>

                    <div class="col-md-3">
                        <label class="form-label" for="code_postale">Code Postal</label>
                        <input class="form-control"  value="{{$InfosSystem->code_postale??""}}" name="code_postale" id="code_postale" type="text" />
                    </div>


                    <div class="col-md-3">
                        <label class="form-label" for="pays">Pays</label>
                        <select class="form-select" name="pays" id="pays" required="">
                            <option selected="" disabled="" value="">Chosir</option>
                            <option value="Sénégal">Sénégal</option>
                            <option value="Canada">Canada</option>

                        </select>
                        <div class="invalid-feedback">Vous devez choisir un pays</div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="maplink_iframe">Lien Google Maps</label>
                        <input class="form-control"  value="{{$InfosSystem->maplink_iframe??""}}" name="maplink_iframe" id="maplink_iframe" type="text"/>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label" for="facebook">Facebook</label>
                        <input class="form-control"  value="{{$InfosSystem->facebook??""}}" name="facebook" id="facebook" type="text"/>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="instagram">Instagram</label>
                        <input class="form-control"  value="{{$InfosSystem->instagram??""}}" name="instagram" id="instagram" type="text"/>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="linkedIn">LinkedIn</label>
                        <input class="form-control"  value="{{$InfosSystem->linkedIn??""}}" name="linkedIn" id="linkedIn" type="text"/>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="twitter">Twitter</label>
                        <input class="form-control"  value="{{$InfosSystem->twitter??""}}" name="twitter" id="twitter" type="text"/>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label" for="adresse">Adresse</label>
                        <input class="form-control"  value="{{$InfosSystem->adresse??""}}" name="adresse" id="adresse" type="file" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="ville">Ville</label>
                        <input class="form-control"  value="{{$InfosSystem->ville??""}}" id="ville" name="ville" type="file" />
                    </div>

                    <div class="col-md-4">
                        <label class="form-label" for="code_postale">Code Postal</label>
                        <input class="form-control"  value="{{$InfosSystem->code_postale??""}}" name="code_postale" id="code_postale" type="file" />
                    </div>





                    <div class="col-md-12 mt-3" style="margin-top: 2em !important">
                        <button class="btn btn-primary" type="submit">Mettre a jours les informations systeme</button>
                    </div>
                </form>
            </div>

          </div>

    </div>
  </div>

</div>

@endsection

@section('scripts')
@include('layouts.admin.required.extensions.js.datatable')
@endsection
