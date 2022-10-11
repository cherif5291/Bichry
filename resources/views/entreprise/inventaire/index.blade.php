@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
@endsection

@section('content')

@if (Auth::user()->role == "entreprise" OR Auth::user()->role == "admin" OR Auth::user()->role == "cabinet")
@php
$PackageEntreprise = $Abonnement->where('entreprise_id', Auth::user()->entreprise_id)->first()->package_id;
// $PackageEntreprise = $Packages::where('package_id', $AbonnementEntreprise->package_id)->first();
$ModuleEntreprise = $ModulePack->where('package_id', $PackageEntreprise);
@endphp
@endif
@include('layouts.admin.required.includes.messages')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
 
  <div class="row g-0">
    <div class="col-lg-4 pe-lg-2">
      <div class="card mb-3">
        <div class="card-header "  style="background-color: #232e3c">
          <h5 class="mb-0 text-light">{{__('messages.add_a')}} {{$choice}} </h5>
        </div>

        <div class="card-body">
           @if ($type === "add")
            @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 3)->first()->ajouter == "yes")
            <form action="{{route('entreprise.inventaire.article.store')}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                <div class="col-md-12">
                    <label class="form-label" for="nom">{{__('messages.name_of_article')}}</label>
                    <input class="form-control" name="nom" id="nom" type="text"  required="" />
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="nom">{{__('messages.prix_unitaire')}}</label>
                    <input class="form-control" name="prix_achat" min="1" value="0" id="prix_achat" type="number"  @if ($choice == "produit")  required="" @endif/>

                </div> 
                <div class="col-md-6">
                    <label class="form-label" for="nom">{{__('messages.quantity')}}</label>
                    <input class="form-control" name="stock" id="nom" type="number"  required="" />
                </div>
    
            <div class="col-md-6">
                <label class="form-label" for="nom">{{__('messages.type')}}</label>

            <input  class="form-control text-primary" name="type" value="{{$choiceStock}}" type="text" disabled required="" />
            <input  hidden class="form-control text-primary" name="type" value="{{$choiceStock}}" type="text"  required="" />

        </div>

       
                {{-- --}}
                {{-- @if ($choice == "stock")
                <div class="col-md-6">
                    <label class="form-label" for="nom">Quantité</label>
                <input   class="form-control " name="qte_initiale"  type="number"  required="" />
            </div>
            @endif --}}
                <div class="col-md-12">
                    <label class="form-label" for="nom">{{__('messages.description_of')}} {{$choice}}</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="3"></textarea>
                </div>


                <div class="">
                    <label class="form-label" for="comptes_comptable_id">{{__('Compte  comptable ')}}</label>
                    <select class="form-select" name="" id="" disabled>
                    <option value="">1040-Stock</option>
                    </select>

                    <select hidden class="form-select" name="comptes_comptable_id" id="comptes_comptable_id" >
                        @foreach ($ComptesComptables->where('nom',"Stock") as $cComptable)
                       <option value="{{$cComptable->id}}">{{ $cComptable->numero_compte }} - {{$cComptable->nom}}</option>
                       @endforeach 
                       </select>
                </div> 

                <div class="col-md-6">
                    {{-- <label class="form-label" for="comptes_vente_id">{{__('Compte  vente ')}}</label> --}}
                    <select hidden class="form-select" name="comptes_vente_id" id="comptes_vente_id"  >
                        @foreach ($ComptesComptables->where('nom',"Vente de marchandises") as $cComptable  )
                      <option value="{{$cComptable->id}}">{{ $cComptable->numero_compte }} - {{$cComptable->nom}}</option>
                      @endforeach 
                      </select>
                </div>  
                <div class="col-md-6">
                    {{-- <label class="form-label" for="comptes_achat_id">{{__('Compte  d\'achat ')}}</label> --}}
                    <select hidden class="form-select" name="comptes_achat_id" id="comptes_achat_id"  >
                      @foreach ($ComptesComptables->where('nom',"Achats") as $cComptable  )
                    <option  value="{{$cComptable->id}}">{{ $cComptable->numero_compte }} - {{$cComptable->nom}}</option>
                    @endforeach 
                    </select>
                </div> 
              
             
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
                <script type="text/javascript">         
                    $(document).ready(function() { 
                        var $checkbox = $('#someCheckbox');
                      

                        var $collapseContainer = $('#collapseContainer');
                       
                        
                        if(document.getElementById('someCheckbox').checked)
                            {
                                $checkbox.prop('checked', false);
                                $('#collapseContainer').hide()
                            }
                            $checkbox.change(function() { 
                            $collapseContainer.collapse('toggle');
                            $('#collapseContainer').show();
                        }); 
                    }); 
                </script>
          <div class="col-md-12">
            <label class="form-label" for="taxe_id">Solde d'ouverture</label>
                <input type="checkbox"checked id="someCheckbox" name="" />
                <div id="collapseContainer" >
                    <div class="row">
                        <div class="col-md-12" >
                            <label class="form-label" for="qte_initiale">Quantité initiale</label>
                            <input class="form-control" name='qte_initiale'id="qte_initiale" type="number" />
                            @error('qte_initiale') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="prix_unitaire">Prix unitaire</label>
                            <input class="form-control" name='prix_unitaire'  id="prix_unitaire" type="number" />
                            @error('prix_unitaire_stock') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="date_debut_stock"> En date de </label>
                            <input class="form-control datetimepicker"name="date_debut_stock"  id="date_debut_stock" type="Date" />
                            @error('date_debut_stock') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <br><br>                </div>
        </div>
     <div class="col-md-4-12">
        <label class="form-label" for="nom">{{__('messages.image_of')}} {{$choice}}</label>
        <input name="image" class="form-control" id="customFile" type="file" />

    </div> 

                <div class="col-12 d-flex  justify-content-between">
                    <button class="btn btn-success " type="submit">{{__('messages.add')}}</button>
                    <a href="{{route("entreprise.inventaire.stocks")}}" class="btn btn-primary mr-1  bg-line-chart-gradient " >{{__('messages.cancel')}}</a>

                </div>

            </form>
            @else
            @include('layouts.admin.required.includes.controle.accessDeniedAdd')

            @endif

                {{-- UPDATE DES ARTICLES --}}
           @elseif ($type === "edit")
           @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 3)->first()->ajouter == "yes")
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
           <script type="text/javascript">         
            $(document).ready(function() { 
                var $checkbox = $('#someCheckbox');
              
                
                var $collapseContainer = $('#collapseContainer');
               
                
                if(document.getElementById('someCheckbox').checked)
                    {
                        $checkbox.prop('checked', false);
                        $('#collapseContainer').hide()
                    }
                    $checkbox.change(function() { 
                    $collapseContainer.collapse('toggle');
                    $('#collapseContainer').show();
                }); 
                if(document.getElementById("prix_unitaire").value!=''){
                    $checkbox.prop('checked', true);
                    $collapseContainer.collapse('toggle');
                    $('#collapseContainer').show();
                }else{
                    $checkbox.prop('checked', false);
                    $('#collapseContainer').hide();
                }
            }); 
        </script>
           <form action="{{route('entreprise.inventaire.article.update', $Article->id)}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                    <label class="form-label" for="nom">{{__('messages.name_of_article')}} </label>
                    <input class="form-control" value="{{$Article->nom}}" name="nom" id="nom" type="text"  required="" />
              


                {{-- <input hidden class="form-control" name="type" value="stock" type="text"  required="" />
                <div class="col-md-6">
                    <label class="form-label" for="nom">{{__('messages.stock')}}</label>
                    <input class="form-control" name="stock" value="{{$Article->stock}}" id="nom" type="number"  required="" />
                </div> --}}
                <div class="col-md-6">
                    <label class="form-label" for="nom">{{__('messages.prix_unitaire')}}</label>
                    <input class="form-control" name="prix_achat" min="1" value="{{$Article->prix_achat}}" id="prix_achat" type="number"/>

                </div> 
                <div class="col-md-6">
                    <label class="form-label" for="nom">{{__('messages.quantity')}}</label>
                    <input class="form-control" name="stock" value="{{$Article->stock}}" id="nom" type="number"  required="" />

                </div>
                <input  hidden class="form-control text-primary" name="type" value="stock" type="text"  required="" />

                <div class="col-md-12">
                    <label class="form-label" for="nom">{{__('messages.description_of')}} {{$choice}}</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="3">{{$Article->description}}</textarea>
                </div>
                    <div class="">
                        <label class="form-label" for="comptes_comptable_id">{{__('Compte  comptable ')}}</label>
                        <select class="form-select" name="" id=""  disabled>
                            <option selected="" disabled="" value="">1040-Stock</option>
                        </select>

                        <select hidden class="form-select" name="comptes_comptable_id" id="comptes_comptable_id" >
                        @foreach ($ComptesComptables as $cComptable)
                        <option @if ($Article->comptes_comptable_id === $cComptable->id) selected  @endif value="{{$cComptable->id}}">{{$cComptable->nom}}</option>
                        @endforeach
                        </select>
                    </div>
                
                    <div class="col-md-6">
                        <label class="form-label" for="comptes_vente_id">{{__('Compte  vente ')}}</label>
                        <select hidden class="form-select" name="comptes_vente_id" id="comptes_vente_id" >
                            @foreach ($ComptesComptables->where('nom',"Vente de marchandises") as $cComptable  )
                            <option @if ($Article->comptes_vente_id === $cComptable->id) selected  @endif value="{{$cComptable->numero_compte}}">{{$cComptable->nom}}</option>
                            @endforeach 
                          </select>
                    </div>  
                    <div class="col-md-6">
                        <label hidden class="form-label" for="comptes_achat_id">{{__('Compte  d\'achat ')}}</label>
                        <select class="form-select" name="comptes_achat_id" id="comptes_achat_id" >
                          @foreach ($ComptesComptables->where('nom',"Achats") as $cComptable  )
                          <option @if ($Article->comptes_achat_id === $cComptable->id) selected  @endif value="{{$cComptable->numero_compte}}">{{$cComptable->nom}}</option>
                          @endforeach 
                        </select>
                    </div>  
                <div class="col-md-12">
                    <label class="form-label" for="taxe_id">Solde d'ouverture</label>
                        <input type="checkbox"checked id="someCheckbox" />
                        <div id="collapseContainer" >
                            <div class="row">
                                <div class="col-md-12" >
                                    <label class="form-label" for="qte_initiale">Quantité initiale</label>
                                    <input class="form-control" name='qte_initiale'id="0" value="{{$Article->qte_initiale}}" type="number" />
                                    @error('qte_initiale') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
        
                                <div class="col-md-12">
                                    <label class="form-label" for="prix_unitaire">Prix unitaire</label>
                                    <input class="form-control" name='prix_unitaire'  id="prix_unitaire"value="{{$Article->prix_unitaire}}"  type="number" />
                                    @error('prix_unitaire_stock') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
        
                                <div class="col-md-12">
                                    <label class="form-label" for="date_debut_stock"> En date de </label>
                                    <input class="form-control datetimepicker"name="date_debut_stock" value="{{$Article->date_debut_stock}}"   id="date_debut_stock" type="Date" />
                                    @error('date_debut_stock') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <br><br>                </div>
                </div>



                <div class="col-md-12 row mt-3 d-flex justify-content-between">
                    <div class="col-md-2">
                        <img src="{{asset($Article->image??'assets/no-image.jpg')}}" height="60px !important" alt="">

                    </div>
                    <div class="col-md-10">
                        {{-- <label class="form-label" for="nom">{{__('messages.image_of')}} {{$choice}}</label> --}}
                        <input name="image" class="form-control w-100" id="customFile" type="file" style="width: 100% !important" />
                    </div>
                </div>


                <div class="col-12 d-flex  justify-content-between table-responsive scrollbar">
                    <button class="btn btn-success mr-1 " type="submit" style="margin: 5px !important">{{__('messages.update')}}</button>
                    <a href="{{route("entreprise.inventaire.article.update", $Article->id)}}"  style="margin: 5px !important" class="btn btn-primary mr-1  bg-line-chart-gradient " >{{__('messages.cancel')}}</a>
                    <a href="{{route('entreprise.inventaire.article.destroy', $Article->id)}}"  style="margin: 5px !important"  class="btn mr-1 btn-danger" >{{__('messages.delete')}}</a>

                </div>
            </form>
            @else
                @include('layouts.admin.required.includes.controle.accessDeniedAdd')
            @endif
           @endif
        </div>
      </div>
  {{-- <div class="col-md-5">
                    <label class="form-label" for="categories_article_id">{{__('messages.category_of')}} {{$choice}}  </label>
                    <select class="form-select" name="categories_article_id" id="categories_article_id" >
                        <option selected="" disabled="" value="">{{__('messages.chose')}}</option>
                    @foreach ($Categories->where('type', $choice) as $categorie)
                    <option @if ($Article->categories_article_id === $categorie->id) selected  @endif value="{{$categorie->id}}">{{$categorie->nom}}</option>
                    @endforeach
                    </select>
                </div> --}}

    </div>
                                    {{-- TABLEAU --}}
    <div class="col-lg-8 ps-lg-2">
      <div class="">
        <div class="card mb-3" style="min-height: 90vh !important">
          <div class="card-header"  style="background-color: #232e3c">
            <h5 class="mb-0 text-light">{{__('messages.list_of')}} {{$choice}}</h5>
          </div>
          <div class="card-body bg-light table-responsive scrollbar">
            @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 3)->first()->voir == "yes")
            <table id="example" class="table table-striped table-bordered" style="width:100%" >
                <thead>
                    <tr>
                        <th>{{__('messages.image')}}</th>
                        <th>{{__('messages.name_of')}} {{$choice}}</th>
                        <th>{{__('messages.type')}}</th>
                        <th>{{__('messages.quantity')}}</th>
                        <th>{{__('messages.total')}}</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody >
                    @foreach ($Articles->where('type', $choice) as $article)
                    <tr>
                        <td><img src="{{asset($article->image??'assets/no-image.jpg')}}" width="40px" alt=""></td>
                        <td>{{$article->nom}} <br>
                           {{-- <strong style="color: black">{{__('messages.description')}}: <br></strong> {{$article->description}} --}}
                        </td>
                        {{--  --}}
                       

                        {{-- <td> {!!
                            formatpriceth($article->prix_unitaire, getCurrency()) !!}</td>

                        <td>
                            @if ($article->comptes_comptable_id)
                            {{getPlanComptable()->find($article->comptes_comptable_id)->nom}}
                            @else
                            --
                            @endif

                        </td> --}}
                        <td>{{$article->type}}</td>
                        <td>{{$article->stock+$article->qte_initiale}}</td>
                        <td>{{($article->stock+$article->qte_initiale)*(($article->prix_achat+$article->prix_unitaire)/2)}}</td>
                        

                        @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 3)->first()->modifier == "yes")
                        <td>
                            <small><a class="btn btn-primary bg-line-chart-gradient" href="{{route('entreprise.inventaire.article.edit', $article->id)}}"><i class="fas fa-pen-square"></i></a></small>
                        </td>
                        @else
                            @include('layouts.admin.required.includes.controle.accessDeniedBtnEdit')
                        @endif

                    </tr>
                    @endforeach


                </tbody>
                {{-- <tfoot>
                    <tr>
                        <th>Image</th>
                        <th>Nom du {{$choice}}</th>
                        <th>Catégorie</th>
                        <th>UGS</th>
                        <th>Prix/Tarif</th>
                        <th>C.Comptable</th>
                        <th>Taxes</th>
                        <th >Action</th>
                    </tr>
                </tfoot> --}}
            </table>
              @else
                  @include('layouts.admin.required.includes.controle.accessDeniedshow')
              @endif


        </div>
        </div>

      </div>
    </div>
  </div>

@endsection

