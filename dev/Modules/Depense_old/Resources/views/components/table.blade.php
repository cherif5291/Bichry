<div class="row" style="margin-bottom:5px;">
  <div class="col-md-12 justify-content-between">
    <button class="btn text-light bg-line-chart-gradient" href="#" data-toggle="modal" data-target="#Filtre">Filtre<span class="fas fa-filter me-1" data-fa-transform="shrink-3"></span></button>
  </div>
</div>
@if (isset($filtre))
  {{ $filtre }}
@endif
<div class="modal bd-example-modal-lg" id="Filtre" tabindex="-1" role="dialog" aria-labelledby="filtre" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel0">Filtrer la liste dépense</h5>
                <button type="reset" class="btn" aria-label="Close" data-dismiss="modal">
                    <i class="fas fa-times-circle"></i>
                </button>
            </div>
            {{-- <form wire:submit.prevent='filtreDepense'> --}}
              <form action="{{route('depenses.index')}}">
                @csrf
                <div class="modal-body">
                    <div class="row mb-2">
                      <div class="col-md-4">
                          <label class="form-label" for="fournisseur">Choisir Fournisseur <span class="text-danger">*</span></label>
                                  <select class="form-control" name="fournisseur_id" >
                                    <option value="" hidden>{{__('messages.chose')}}</option>
                                     @foreach ($data['Fournisseurs'] as $fournisseur)
                                        @php
                                        // $value = "F".$fournisseur->id;
                                        $value = $fournisseur->id;
                                        @endphp
                                        <option value="{{encrypt($value)}}">{{$fournisseur->entreprise}}</option>
                                     @endforeach
                                  </select>
                          @error('entreprise') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4">
                          <label class="form-label" for="fournisseur">Choisir Période <span class="text-danger">*</span></label>
                                  <select class="form-control" name="periode" id="periode" onchange="selectPeriode()">
                                    <option value="" >Choisir Période</option>
                                    <optgroup label="période courante">
                                      <option value="30">Mois courant</option>
                                      <option value="90">Trimestre courant</option>
                                      <option value="180">Semestre courant</option>
                                      <option value="365">Année courante</option>
                                    </optgroup>
                                    <optgroup label="période passée">
                                    <option value="-30">Mois dernier</option>
                                    <option value="-90">Trimestre dernier</option>
                                    <option value="-180">Semestre dernier</option>
                                    <option value="-365">Année derniére</option>
                                  </optgroup>

                                  </select>
                          @error('entreprise') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>

                      <div class="col-md-4">
                          <label class="form-label" for="date_debut">Date debut <span class="text-danger">*</span></label>
                          <input class="form-control form-control datetimepicker" type="date"  name="date_debut" id="date_debut" required=required/>
                          @error('date') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                      <div class="col-md-4">
                          <label class="form-label" for="date_fin">Date Fin <span class="text-danger">*</span></label>
                          <input class="form-control form-control datetimepicker" type="date" name="date_fin" id="date_fin" required=required/>
                          @error('date') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                    </div>
                </div>

                  <div class="modal-footer">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="filtre">Rechercher</button>
                  </div>
            </form>
        </div>
    </div>
</div>

<table id="example" class="table table-hover table-striped overflow-hidden" style="width:100%">
    <thead class="text-light" style="background-color: #232e3c">
        <tr>
            <th>{{__('messages.date')}}</th>
            <th>{{__('messages.type')}}</th>
            <th>{{__('messages.beneficiary')}}</th>
            <th>{{__('messages.noFact')}}</th>
            <th>{{__('messages.note')}}</th>
            <th>{{__('messages.sub_total')}}</th>
            <th>{{__('messages.taxes')}}</th>
            <th>{{__('messages.total')}}</th>
            <th style="width: 2%">{{__('messages.action')}}</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($Depenses->where('status', '!=', "draft") as $depense)


        <tr>
        @if ($depense->type == "facture")
            <td>{{$depense->facture->date_facturation??"-- " }}</td>
            @endif
            @if ($depense->type == "credit")
            <td>{{$depense->credit->date_paiement??"-- "}}</td>
            @endif
            @if ($depense->type == "depense")
            <td>{{$depense->depensesSimple->date_paiement??"-- " }}</td>
            @endif
            @if ($depense->type == "cheque")
            <td>{{$depense->cheque->date_paiement??"-- " }}</td>
            @endif
            @if ($depense->type == "credit")
            <td>{{__('messages.vendors_credit')}}</td>
            @elseif ($depense->type == "facture")
            <td>{{__('messages.invoice')}}</td>
            @elseif ($depense->type == "depense")
            <td>{{__('messages.expense')}}</td>
            @elseif ($depense->type == "cheque")
            <td>{{__('messages.check')}}</td>
            @endif
            @if ($depense->fournisseur_id)
            <td>{{$depense->fournisseur->entreprise??"ff"}}</td>

            @elseif ($depense->clients_entreprise_id)
            <td>{{$depense->clientsEntreprise->entreprise}}</td>

            @endif
            @if ($depense->type == "facture")
            <td>{{$depense->facture->numero_facture ??"-- "}}</td>
            @elseif ($depense->type == "depense")
            <td>{{$depense->depensesSimple->reference ??"--"}}</td>
            @elseif ($depense->type == "cheque")
            <td>{{$depense->cheque->numero_cheque??"--"}}</td>
            @elseif ($depense->type == "credit")
            <td>{{$depense->fournisseursCredit->note ??""}}</td>
            @endif
            @if ($depense->type == "facture")
            <td>{{$depense->message}}</td>
            @elseif ($depense->type == "depense")
            <td>{{$depense->note}}</td>
            @elseif ($depense->type == "cheque")
            <td>{{$depense->note}}</td>
            @elseif ($depense->type == "credit")
            <td>{{$depense->note}}</td>
            @endif
            <td>{!! formatpriceth($depense->total_sans_taxe??0, getCurrency()) !!}</td>
            <td>{!! formatpriceth($depense->taxe??0, getCurrency()) !!}</td>
            <td>{!! formatpriceth($depense->total??0, getCurrency()) !!}</td>
            @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 6)->first()->modifier == "yes")
            <td>
                <button class="btn btn-primary bg-line-chart-gradient btn-edit-facture" wire:click="openUpdateDepenseModal({{ $depense->id }}, '{{$depense->type}}')"
                    >{{__('messages.edit')}}
                </button>
            </td>
            @else
            @include('layouts.admin.required.includes.controle.accessDeniedBtnEdit')
            @endif

        </tr>
        @endforeach


    </tbody>
    {{-- <tfoot>
        <tr>
            <th>{{__('messages.date')}}</th>
            <th>{{__('messages.type')}}</th>
            <th>{{__('messages.beneficiary')}}</th>
            <th>{{__('messages.no')}}</th>
            <th>{{__('messages.note')}}</th>
            <th>{{__('messages.sub_total')}}</th>
            <th>{{__('messages.taxes')}}</th>
            <th>{{__('messages.total')}}</th>
            <th style="width: 2%">{{__('messages.action')}}</th>

        </tr>
    </tfoot> --}}
</table>
<script>
function selectPeriode(){
  const mois_31 = [1,3,5,7,8,10,12];//recuperation des mois 31 jours
  const mois_30 = [4,6,9,11];//recuperation des mois 30 jours
  var mois_fevrier = 2;

  const trimestre_1 = [1,2,3];
  const trimestre_2 = [4,5,6];
  const trimestre_3 = [7,8,9];
  const trimestre_4 = [10,11,12];

  const d = new Date();
  var an_courant = d.getFullYear();
  var mois_courant = d.getMonth()+1;
  var jj_courant = d.getDate();
  var jj_debutfiltre ="01";
  var periode = document.getElementById("periode").value;

  switch (periode)
    {
      //filtre  mois courant : on cherche le mois courant le filtre commence du 01 au à la fin du moi
      // on prends en charge pour les mois 30 / 31/ et fevrier qui peut etre soit 28 soit 29 dependants des années
      case "30":
          if (mois_courant<10) {
            var mois_debutfiltre ="0"+mois_courant;
            var mois_finfiltre ="0"+mois_courant;
          }
          else {
            var mois_debutfiltre =mois_courant;
            var mois_finfiltre =mois_courant;
          }

        if (mois_30.includes(mois_courant) === true) { //on s'arrete à 30 jour
          var jj_finfiltre ="30";
        }
        else if (mois_31.includes(mois_courant) === true) { //on s'arrete à 31 jour
          var jj_finfiltre ="31";
        }
        else if (mois_fevrier === mois_courant) {
          if (an_courant % 4 == 0) { //on s'arrete à 29 jour
            var jj_finfiltre ="29";
          }
          else { //on s'arrete à 28 jour
            var jj_finfiltre ="28";
          }
        }

        var periode_debutfiltre = an_courant+"-"+mois_debutfiltre+"-"+jj_debutfiltre;
        var periode_finfiltre = an_courant+"-"+mois_finfiltre+"-"+jj_finfiltre;

        document.getElementById("date_debut").value = periode_debutfiltre;
        document.getElementById("date_fin").value = periode_finfiltre;

       break;

      case "90": // filtre trimestre courant
          if (trimestre_1.includes(mois_courant) === true) { //on s'arrete à de janvier à 31 Mars
            var jj_finfiltre ="31";
            var mois_debutfiltre ="01";
            var mois_finfiltre = "03";
          }
          else if (trimestre_2.includes(mois_courant) === true) { //on s'arrete à de Avril à 30 Juin
            var jj_finfiltre ="30";
            var mois_debutfiltre ="04";
            var mois_finfiltre = "06";
          }
          else if (trimestre_3.includes(mois_courant) === true) { //on s'arrete à de Juillet au 30 Septembre
            var jj_finfiltre ="30";
            var mois_debutfiltre ="07";
            var mois_finfiltre = "09";
          }
          else if (trimestre_4.includes(mois_courant) === true) { //on s'arrete à de Octobre à 31 Decembre
            var jj_finfiltre ="31";
            var mois_debutfiltre ="10";
            var mois_finfiltre = "12";
          }

          var periode_debutfiltre = an_courant+"-"+mois_debutfiltre+"-"+jj_debutfiltre;
          var periode_finfiltre = an_courant+"-"+mois_finfiltre+"-"+jj_finfiltre;

          document.getElementById("date_debut").value = periode_debutfiltre;
          document.getElementById("date_fin").value = periode_finfiltre;

        break;

      case "180":// filtre semestre courant
          if (mois_courant<=6) { //1er semestre : janvier au 30 juin
            var jj_finfiltre ="30";
            var mois_debutfiltre ="01";
            var mois_finfiltre = "06";
          }else {
            var jj_finfiltre ="31";
            var mois_debutfiltre ="07";
            var mois_finfiltre = "12";
          }

          var periode_debutfiltre = an_courant+"-"+mois_debutfiltre+"-"+jj_debutfiltre;
          var periode_finfiltre = an_courant+"-"+mois_finfiltre+"-"+jj_finfiltre;

          document.getElementById("date_debut").value = periode_debutfiltre;
          document.getElementById("date_fin").value = periode_finfiltre;


        break;

      case "365":
        var periode_debutfiltre = an_courant+"-01-01";
        var periode_finfiltre = an_courant+"-12-31";

        document.getElementById("date_debut").value = periode_debutfiltre;
        document.getElementById("date_fin").value = periode_finfiltre;

        break;

        case "-30": // filtre mois dernier
            if (mois_courant<10) {
              if (mois_courant == 1) {//le cas de janvier son mois dernier c'est decembre de l'année passée
                var mois_debutfiltre ="12";
                var mois_finfiltre ="12";
                an_courant = an_courant-1;
              }else {
                var mois_debutfiltre ="0"+(mois_courant-1);
                var mois_finfiltre ="0"+(mois_courant-1);
              }

            }
            else {
              var mois_debutfiltre =mois_courant;
              var mois_finfiltre =mois_courant;
            }

          if (mois_30.includes(mois_courant) === true) { //on s'arrete à 30 jour
            var jj_finfiltre ="30";
          }
          else if (mois_31.includes(mois_courant) === true) { //on s'arrete à 31 jour
            if (mois_courant == 3) {
             if (an_courant % 4 == 0) { //on s'arrete à 29 jour
               var jj_finfiltre ="29";
             }
             else { //on s'arrete à 28 jour
               var jj_finfiltre ="28";
             }
           }
           else {
             var jj_finfiltre ="31";

           }
        }


          var periode_debutfiltre = an_courant+"-"+mois_debutfiltre+"-"+jj_debutfiltre;
          var periode_finfiltre = an_courant+"-"+mois_finfiltre+"-"+jj_finfiltre;

          document.getElementById("date_debut").value = periode_debutfiltre;
          document.getElementById("date_fin").value = periode_finfiltre;

         break;

        case "-90": // filtre trimestre dernier
            if (trimestre_1.includes(mois_courant) === true) { //1er trimestre on s'arrete à de octobre à 31 decembre de l'année passée
              var jj_finfiltre ="31";
              var mois_debutfiltre ="10";
              var mois_finfiltre = "12";
              an_courant = an_courant-1;
            }
            else if (trimestre_2.includes(mois_courant) === true) { //on s'arrete à de Janvier au 31 Mars
              var jj_finfiltre ="31";
              var mois_debutfiltre ="01";
              var mois_finfiltre = "03";
            }
            else if (trimestre_3.includes(mois_courant) === true) { //on s'arrete à de Avril à 30 Juin
              var jj_finfiltre ="30";
              var mois_debutfiltre ="04";
              var mois_finfiltre = "06";
            }
            else if (trimestre_4.includes(mois_courant) === true) { //on s'arrete à de Juillet au 30 Septembre
              var jj_finfiltre ="30";
              var mois_debutfiltre ="07";
              var mois_finfiltre = "09";
            }

            var periode_debutfiltre = an_courant+"-"+mois_debutfiltre+"-"+jj_debutfiltre;
            var periode_finfiltre = an_courant+"-"+mois_finfiltre+"-"+jj_finfiltre;

            document.getElementById("date_debut").value = periode_debutfiltre;
            document.getElementById("date_fin").value = periode_finfiltre;

          break;

        case "-180":// filtre semestre passé
            if (mois_courant<=6) { //1er semestre : janvier au 30 juin donc semestre dernier = juillet à decemre de l'année passée
              var jj_finfiltre ="31";
              var mois_debutfiltre ="07";
              var mois_finfiltre = "12";
              an_courant = an_courant-1;
            }else { //2em semestre : juillet au 31 decembre donc semestre dernier = janvier à juin de l'année en cour
              var jj_finfiltre ="30";
              var mois_debutfiltre ="01";
              var mois_finfiltre = "06";
            }

            var periode_debutfiltre = an_courant+"-"+mois_debutfiltre+"-"+jj_debutfiltre;
            var periode_finfiltre = an_courant+"-"+mois_finfiltre+"-"+jj_finfiltre;

            document.getElementById("date_debut").value = periode_debutfiltre;
            document.getElementById("date_fin").value = periode_finfiltre;

          break;

        case "-365":
          var periode_debutfiltre = an_courant-1+"-01-01";
          var periode_finfiltre = an_courant-1+"-12-31";

          document.getElementById("date_debut").value = periode_debutfiltre;
          document.getElementById("date_fin").value = periode_finfiltre;

          break;

          default:

      }
}

</script>
