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
          @include('layouts.admin.required.includes.messages')
        </div>
      </div>
    </div>
    <div class="card-body bg-light">
        @include('admin.parametres.index')
          <div class="tab-content border-x border-bottom p-3" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="col-lg-12 pe-lg-2">
                      <div class=" mb-3">
                        <div class="card-header bg-light">
                          <h5 class="mb-0">Configuration des modules contenu du package d'abonnement: {{$Package->nom}}</h5>
                        </div>

                        <div class="card-body">
                           <form action="{{route('admin.parametres.packages.modules.update', $Package->id)}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf

                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 1)->first()) bg-success @endif" value="1" name="clients" id="fffdd" type="checkbox"  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 1)->first()) checked @endif />
                                <label class="form-check-label" for="fffdd">{{$Modules->where('id', 1)->first()->nom}}</label>
                            </div>

                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 2)->first()) bg-success @endif" value="1" name="fournisseurs" id="fffdd" type="checkbox"  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 2)->first()) checked @endif />
                                <label class="form-check-label" for="fffdd">{{$Modules->where('id', 2)->first()->nom}}</label>
                            </div>
                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 3)->first()) bg-success @endif" value="1" name="produits_services" id="fffdd" type="checkbox"  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 3)->first()) checked @endif />
                                <label class="form-check-label" for="fffdd">{{$Modules->where('id', 3)->first()->nom}}</label>
                            </div>
                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 4)->first()) bg-success @endif" value="1" name="factures" id="fffdd" type="checkbox"  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 4)->first()) checked @endif />
                                <label class="form-check-label" for="fffdd">{{$Modules->where('id', 4)->first()->nom}}</label>
                            </div>
                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 5)->first()) bg-success @endif" value="1" name="devis" id="fffdd" type="checkbox"  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 5)->first()) checked @endif />
                                <label class="form-check-label" for="fffdd">{{$Modules->where('id', 5)->first()->nom}}</label>
                            </div>
                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 6)->first()) bg-success @endif" value="1" name="depenses" id="fffdd" type="checkbox"  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 6)->first()) checked @endif />
                                <label class="form-check-label" for="fffdd">{{$Modules->where('id', 6)->first()->nom}}</label>
                            </div>
                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 7)->first()) bg-success @endif" value="1" name="employes" id="fffdd" type="checkbox"  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 7)->first()) checked @endif />
                                <label class="form-check-label" for="fffdd">{{$Modules->where('id', 7)->first()->nom}}</label>
                            </div>
                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 8)->first()) bg-success @endif" value="1" name="paie" id="fffdd" type="checkbox"  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 8)->first()) checked @endif />
                                <label class="form-check-label" for="fffdd">{{$Modules->where('id', 8)->first()->nom}}</label>
                            </div>
                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 9)->first()) bg-success @endif" value="1" name="banques_caisses" id="fffdd" type="checkbox"  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 9)->first()) checked @endif />
                                <label class="form-check-label" for="fffdd">{{$Modules->where('id', 9)->first()->nom}}</label>
                            </div>
                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 10)->first()) bg-success @endif" value="1" name="contrats" id="fffdd" type="checkbox"  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 10)->first()) checked @endif />
                                <label class="form-check-label" for="fffdd">{{$Modules->where('id', 10)->first()->nom}}</label>
                            </div>
                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 11)->first()) bg-success @endif" value="1" name="rapports" id="fffdd" type="checkbox"  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 11)->first()) checked @endif />
                                <label class="form-check-label" for="fffdd">{{$Modules->where('id', 11)->first()->nom}}</label>
                            </div>
                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 12)->first()) bg-success @endif" value="1" name="activites" id="fffdd" type="checkbox"  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 12)->first()) checked @endif />
                                <label class="form-check-label" for="fffdd">{{$Modules->where('id', 12)->first()->nom}}</label>
                            </div>
                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 13)->first()) bg-success @endif" value="1" name="cabinet" id="fffdd" type="checkbox"  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 13)->first()) checked @endif />
                                <label class="form-check-label" for="fffdd">{{$Modules->where('id', 13)->first()->nom}}</label>
                            </div>
                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 14)->first()) bg-success @endif" value="1" name="comptable" id="fffdd" type="checkbox"  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 14)->first()) checked @endif />
                                <label class="form-check-label" for="fffdd">{{$Modules->where('id', 14)->first()->nom}}</label>
                            </div>
                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 15)->first()) bg-success @endif" value="1" name="reglement" id="fffdd" type="checkbox"  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 15)->first()) checked @endif />
                                <label class="form-check-label" for="fffdd">{{$Modules->where('id', 15)->first()->nom}}</label>
                            </div>
                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 16)->first()) bg-success @endif" value="1" name="acceptation_paiement" id="fffdd" type="checkbox"  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 16)->first()) checked @endif />
                                <label class="form-check-label" for="fffdd">{{$Modules->where('id', 16)->first()->nom}}</label>
                            </div>
                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 17)->first()) bg-success @endif" value="1" name="regle" id="fffdd" type="checkbox"  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 17)->first()) checked @endif />
                                <label class="form-check-label" for="fffdd">{{$Modules->where('id', 17)->first()->nom}}</label>
                            </div>
                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 18)->first()) bg-success @endif" value="1" name="recurence" id="fffdd" type="checkbox"  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 18)->first()) checked @endif />
                                <label class="form-check-label" for="fffdd">{{$Modules->where('id', 18)->first()->nom}}</label>
                            </div>

                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 19)->first()) bg-success @endif" value="1" name="reglement" id="fffdd" type="checkbox"  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 19)->first()) checked @endif />
                                <label class="form-check-label" for="fffdd">{{$Modules->where('id', 19)->first()->nom}}</label>
                            </div>
                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 20)->first()) bg-success @endif" value="1" name="acceptation_paiement" id="fffdd" type="checkbox"  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 19)->first()) checked @endif />
                                <label class="form-check-label" for="fffdd">{{$Modules->where('id', 20)->first()->nom}}</label>
                            </div>
                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 21)->first()) bg-success @endif" value="1" name="regle" id="fffdd" type="checkbox"  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 21)->first()) checked @endif />
                                <label class="form-check-label" for="fffdd">{{$Modules->where('id', 21)->first()->nom}}</label>
                            </div>
                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 22)->first()) bg-success @endif" value="1" name="recurence" id="fffdd" type="checkbox"  @if ($ModulePack->where('package_id', $Package->id)->where('module_id', 22)->first()) checked @endif />
                                <label class="form-check-label" for="fffdd">{{$Modules->where('id', 22)->first()->nom}}</label>
                            </div>







                            {{-- @foreach ($Modules as $module)
                            <div class="ml-5 col-md-4 form-check form-switch">
                                <input class="form-check-input" name="{{"module".$module->id}}" value="1" id="{{"module".$module->id}}" type="checkbox" />
                                <label class="form-check-label" for="{{"module".$module->id}}">{{$module->nom}}</label>
                            </div>
                            @endforeach --}}


                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Ajouter</button>
                            </div>
                        </form>

                        </div>
                      </div>


                    </div>

            </div>
          </div>

    </div>
  </div>

</div>

@endsection

@section('scripts')
@include('layouts.admin.required.extensions.js.datatable')
@endsection
