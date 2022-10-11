<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>

    </style>
</head>

<body>

    <div class="container">
        <div class="invoice-container" ref="document" id="html">

            <table style="width:100%; height:auto; background-color:#fff;padding:20px; font-size:12px; border: 1px solid #2c7be5; border-radius:5px 5px 0px 0px">
                <tbody>
                  <tr style="padding:20px;color:#000;font-size:15px">
                    <td style="font-weight: bold;padding:5px 0px">
                        <img src="{{getCompanyInfo()->logo}}" style="height: 50px !important" alt=""> <br>
                        {{$Facture->entreprise->nom_entreprise??""}}
                        @if ($Facture->entreprise->code_postale)
                        <br>   {{$Facture->entreprise->code_postale}}
                        @endif
                        @if ($Facture->entreprise->adresse)
                        <br> {{$Facture->entreprise->adresse}}
                        @endif
                        @if ($Facture->entreprise->ville)
                         <br> {{$Facture->entreprise->ville}}
                        @endif
                        @if ($Facture->entreprise->pays)
                        ,  {{$Facture->entreprise->pays}}
                        @endif

                        @if ($Facture->entreprise->telephone)
                        <br> {{$Facture->entreprise->telephone}}
                        @endif
                        @if ($Facture->entreprise->portable)
                        ,  {{$Facture->entreprise->portable}}
                        @endif


                         <br> Email: {{$Facture->entreprise->email??""}}
                        @if ($Facture->entreprise->website)
                        <br> Site web: {{$Facture->entreprise->website}}
                        @endif <br> <br>
                        Facture: {{$Facture->numero_facture ?? $Facture->numero_recu}}
                    </td>
                    <td style="text-align:right;padding:5px 0px;font-weight: bold;font-size:16px;">
                        {{$Facture->clientsEntreprise->nom_pro??$Facture->clientsEntreprise->nom}}<br>
                        Représenté par: {{$Facture->clientsEntreprise->nom ." ". $Facture->clientsEntreprise->prenom}}
                        @if ($Facture->clientsEntreprise->code_postale)
                        <br>   {{$Facture->clientsEntreprise->code_postale}}
                        @endif
                        @if ($Facture->clientsEntreprise->adresse)
                        <br> {{$Facture->clientsEntreprise->adresse}}
                        @endif
                        @if ($Facture->clientsEntreprise->ville)
                         <br> {{$Facture->clientsEntreprise->ville}}
                        @endif
                        @if ($Facture->clientsEntreprise->pays)
                        ,  {{$Facture->clientsEntreprise->pays}}
                        @endif


                        @if ($Facture->clientsEntreprise->telephone)
                        <br> {{$Facture->clientsEntreprise->telephone}}
                        @endif
                        @if ($Facture->clientsEntreprise->portable)
                        ,  {{$Facture->clientsEntreprise->portable}}
                        @endif
                        <br> Email: {{$Facture->clientsEntreprise->email??""}}
                        @if ($Facture->clientsEntreprise->website)
                        <br> Site web: {{$Facture->clientsEntreprise->website}}
                        @endif
                         <br>
                    </td>
                  </tr>


                </tbody>

              </table>
            <table
                style="width:100%; height:auto; background-color:#2c7be5;text-align:center; padding:10px; background:#2c7be5">
                <tbody>
                    <tr style="color:#6c757d; font-size: 20px;">
                        <td
                            style="border-right:1.5px dashed  #DCDCDC; width:25%;font-size:12px;font-weight:700;padding: 0px 0px 10px 0px; color:white">
                            Etat de la facture</td>
                        <td
                            style="border-right: 1.5px dashed  #DCDCDC ;width:25%;font-size:12px;font-weight:700;padding: 0px 0px 10px 0px;color:white">
                            Numéro de référence</td>
                        <td
                            style="border-right:1.5px dashed  #DCDCDC ;width:25%;font-size:12px;font-weight:700;padding: 0px 0px 10px 0px;color:white">
                            Date facturation</td>
                        <td style="width:25%;font-size:12px;font-weight:700;padding: 0px 0px 10px 0px;color:white">Date
                            d'échéance</td>
                    </tr>
                    <tr style="background-color:#fff; font-size:12px; color:#262626;">
                        <td
                            style="border-right:1.5px dashed  #DCDCDC ;width:25%; font-weight:bold;background: #fafafa;">
                            Impayé</td>
                        <td
                            style="border-right:1.5px dashed  #DCDCDC ;width:25% ; font-weight:bold;background: #fafafa;">

                            @if ($Facture->reference)
                             {{$Facture->reference}}
                            @endif
                        </td>
                        <td
                            style="border-right:1.5px dashed  #DCDCDC ;width:25%; font-weight:bold;background: #fafafa;">
                            @if ($Facture->date_facturation OR $Facture->date_recu )
                            {{$Facture->date_facturation ?? $Facture->date_recu}}
                           @endif</td>
                        <td style="width:25%; font-weight:bold;background: #fafafa;"> {{$Facture->echeance}}</td>
                    </tr>
                </tbody>
            </table>
            <table
                style="width:100%; height:auto; background-color:#fff; margin-top:0px;  padding:20px; font-size:12px; border: 1px solid #ebebeb; border-top:0px;">
                <thead>
                    <tr style=" color: #6c757d;font-weight: bold; padding: 5px;">
                        <td colspan="1" style="text-align: left; width:60%">Désignation</td>
                        <td style="text-align: start;">Prix unitaire</td>
                        <td style="padding: 10px;text-align:start;">Quantité</td>
                        <td style="padding: 10px;text-align:start;">Taxe</td>

                        <td style="text-align: right;">Total</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Facture->depensesPaniers as $article)
                    <tr>

                        <td style="margin-left:10px;text-align: start;">{{$article->designation}} <br>
                            {{$article->description}}</td>
                        <td style="padding: 10px; text-align:center;">{!! formatpriceth($article->montant, getCurrency()) !!}</td>
                        <td style="padding: 10px;text-align: center;">{{$article->qte}}</td>
                        <td style="padding: 10px;text-align: center;">
                            @if ($article->taux_taxe>0)
                            {{$article->taux_taxe}}%
                            @else
                            --
                            @endif
                        </td>

                        <td style=";font-weight: bold;font-size: 14px;">
                            <table style="width:100%;">
                                <tr>
                                    <td style="text-align:right ;font-size:13px;">{!! formatpriceth($article->total, getCurrency()) !!}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <table
                style="width:100%; height:auto; background-color:#fff;padding:20px; font-size:12px; border: 1px solid #ebebeb; border-top:0">
                <tbody>
                    <tr style="padding:20px;color:#000;font-size:15px">
                        <td style="text-align:right;padding:5px 0px;font-weight: bold;font-size:16px;">
                            <span>Sous Total: {!! formatpriceth($Facture->total_sans_taxe, getCurrency()) !!}</span> <br>
                            Taxe: {!! formatpriceth($Facture->taxe, getCurrency()) !!}<br>

                            <hr>
                            Total Général: {!! formatpriceth($Facture->total, getCurrency()) !!} <br>
                        </td>


                    </tr>

                    <tr>
                        <td colspan="2" style="font-weight:bold;"><span style="color:#2c7be5;font-weight: bold;">{{$Facture->entreprise->nom_entreprise}} Vous remercie de votre de votre confiance !</td>
                    </tr>

                </tbody>
                <tfoot style="padding-top:20px;font-weight: bold;">
                    <tr>
                        <td style="padding-top:20px;">
                            Vous avez besoin d'aide , y'a t'il une erreur de notre part ? <br> Contactez Entreprise sur <span style="color:#2c7be5"> {{$Facture->entreprise->email}}
                            </span> ou au téléphone au <span style="color:#2c7be5"> {{$Facture->entreprise->telephone}} </span><br>

                        </td>

                    </tr>
                </tfoot>
            </table>

            @if ($Facture->reglements->count()>0)
            <table
                style="width:100%; height:auto; background-color:#fff; margin-top:0px;  padding:20px; font-size:12px; border: 1px solid #ebebeb; border-top:0px;">
                <thead>
                    <tr style=" color: #6c757d;font-weight: bold; padding: 5px;">
                        <td colspan="1" style="text-align: left;">Réglement</td>

                        <td style="padding: 10px;text-align:start;">Montant dû Aujourd'hui</td>

                        <td style="text-align: right;">Date de paiement</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Facture->reglements as $reglement)
                    <tr>

                        <td style="margin-left:10px;text-align: start;"><strong style="color: green">{!! formatpriceth($reglement->montant_recu, getCurrency()) !!}</strong> paiement par {{$reglement->paiements_mode}}</td>
                        <td style="margin-left:10px;text-align: start;"> <strong style="color: red">{!! formatpriceth($Facture->total - $Facture->reglements->sum('montant_recu'), getCurrency()) !!}</strong></td>

                        <td style=";font-weight: bold;font-size: 14px;">
                            <table style="width:100%;">
                                <tr>
                                    <td style="text-align:right ;font-size:13px;">{{$reglement->created_at}}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            @endif
        </div>
    </div>
    <footer style="text-align: center; position: fixed;
    padding: 10px 10px 0px 10px;
    bottom: 0;
    width: 100%; font-size: 1em !important; ">
       Bilan Pro {{getInfosSystem()->nom_plateforme}} | Email <span style="color:#2c7be5"> {{getInfosSystem()->email_support}}
    </span> - téléphone au <span style="color:#2c7be5"> {{getInfosSystem()->telephone}} </span>
      </footer>
</body>

</html>
