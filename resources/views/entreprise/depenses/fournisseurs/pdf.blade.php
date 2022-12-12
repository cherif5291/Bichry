@extends('layouts.admin.admin')
@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
@endsection

@section('content')
@section('content')
    @if (Auth::user()->role == 'entreprise' or Auth::user()->role == 'admin' or Auth::user()->role == 'cabinet')
        @php
            $PackageEntreprise = $Abonnement->where('entreprise_id', Auth::user()->entreprise_id)->first()->package_id;
            // $PackageEntreprise = $Packages::where('package_id', $AbonnementEntreprise->package_id)->first();
            $ModuleEntreprise = $ModulePack->where('package_id', $PackageEntreprise);
        @endphp
    @endif
    @include('layouts.admin.required.includes.messages')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>       
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script>
 function generatePDF() {
             const element = document.getElementById('pdf');
             var opt = {
                filename:     'myfile.pdf',
                jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
                };
             html2pdf().set(opt).from(element).save();
             
         }
         </script>
         <div style="margin-left:10%; margin-right:10%">
          <button class="btn btn-primary" onclick="generatePDF()">Télécharger le pdf <i class="fa fa-download"></i></button>
        </div>
          <div class="card mb-3" id='pdf'style="margin-left:10%; margin-right:10%">
        <div class="card-header position-relative  mb-7 font-weight-bolder">
           <b class="text-dark"> Nom Entreprise: {{ getCompanyInfo()->nom_entreprise  }} </b><img
                src="{{ getCompanyInfo()->logo ?? 'assets/no-image.jpg' }}" style="height: 50px !important font-weight-bolder" alt="">
            <br>
            <b class="text-dark"> Adresse Entreprise: {{ getCompanyInfo()->adresse   }}</b>
            <img class="rounded-circle ml-3 float-end" src="{{ asset(getCompanyInfo()->logo ?? 'assets/no-image.jpg') }}"
                style="width: 70px !important; height: 70px !important; margin-left:2em! important" alt="" />
            <hr>
            <hr>
            <div class="text-center"> <b class="text-dark">  Adresse Facturation: </b></div>
            <div class="text-end text-dark"><b> En date du: {{now()->format('d-m-Y')}}</b> </div>
            <hr>
        </div>
        <div class="card-body">
            <table id="example" class="table is-striped" style="width:100%">
                <thead class="text-light" style="background-color: #006AA5">
                    <tr>
                        <th class="text-light">{{ __('messages.type') }}</th>
                        <th class="text-light">{{ __('messages.no') }}</th>
                        <th class="text-light">{{ __('messages.date') }}</th>
                        <th class="text-light">{{ __('messages.note') }}</th>
                        <th class="text-end text-light ">{{ __('messages.amount') }}</th>
                        <th class="text-light">{{ __('messages.status') }}</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($DepensesFournisseur as $depensesFournisseur)
                        <tr>
                            @if ($depensesFournisseur->type == 'facture')
                                <td class="text-dark"><b>{{ __('messages.invoice') }}</b></td>
                            @elseif($depensesFournisseur->type == 'credit')
                                <td class="text-dark"><b>{{ __('messages.vendor_credit') }}</b></td>
                            @elseif($depensesFournisseur->type == 'depense')
                                <td class="text-dark"><b>{{ __('messages.expense') }}</b></td>
                            @else
                                <td class="text-dark"><b>{{ __('messages.check') }}</b></td>
                            @endif
                            @if ($depensesFournisseur->type == 'credit')
                                <td class="text-dark"><b>{{ $depensesFournisseur->creditFournisseurs->reference ?? '--' }}</b></td>
                            @else
                                <td class="text-dark"><b>{{ $depensesFournisseur->facture->numero_facture ?? '--' }}</b></td>
                            @endif
                            @if ($depensesFournisseur->type == 'facture')
                                <td class="text-dark"><b>{{ $depensesFournisseur->facture->date_facturation ?? '--' }}</b></td>
                            @elseif($depensesFournisseur->type == 'credit')
                                <td class="text-dark"><b>{{ $depensesFournisseur->creditFournisseurs->date_paiement ?? '--' }}</b></td>
                            @else
                                <td class="text-dark"><b>{{ $depensesFournisseur->cheque->date_paiement ?? '--' }}</b></td>
                            @endif
                            <td class="text-dark"><b>{{ $depensesFournisseur->note ?? '--' }}</b></td>
                            @if ($depensesFournisseur->type == 'credit')
                                <td class="text-end text-danger"><b>
                                    -{{ formatpriceth($depensesFournisseur->total ?? '--', getCurrency()->sigle) }}</b>
                                    </td>
                            @else
                                <td class="text-end text-dark"><b>
                                    {{ formatpriceth($depensesFournisseur->total ?? '--', getCurrency()->sigle ) }}</b>
                                    </td>
                            @endif
                            @if ($depensesFournisseur->status == 'validated')
                                <td class="text-success"><b>Payée</b></td>
                            @else<td class="text-danger"><b>Impayée</b> </td>
                            @endif





                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="float-end"style="width:50%">
                <table id="example" class="table is-striped table-primary mr-1" >
                    <thead class="">
                        <th class="text-dark">Sous total impaye</th>
                        <th scope="col">--</th>
                        </thead>
                        <tbody>
                            <tr>
                              <th class="text-dark"scope="row"><b>Crédit</b></th>
                              <td class="text-danger"><b> -{{ formatpriceth($total_credit,getCurrency()->sigle) }} {{ getCurrency()->sigle }}</b></td>
                             
                            </tr>
                            <tr>
                              <th class="text-dark" scope="row"><b>Total Payé</b></th>
                              <td>--</td>
                            </tr>
                            <tr>
                                <th class="text-dark"scope="row"><b>Total Du</b></th>
                                <td>--</td>
                                </tr>
                        </table>
                    </div>  
                    
            <table id="" class="table is-striped float-start" style="width:100%">
                <thead class="text-light" style="background-color: #006AA5">
                    <tr>
                        <th class="text-light"></b>Chronologie</b></th>
                        <th class="text-light text-end"><b>Courant(-30j)</b></th>
                        <th class="text-light text-end"><b>31-60 jours</b></th>
                        <th class="text-light text-end"><b>61-90 jours</b></th>
                        <th class="text-end text-light "><b>+90 jours</b></th>
        
        
                    </tr>
                </thead>
                <tbody>
                    <td class="text-dark"><b>Montant</b></td>
                    @if($total_facture_courant>$total_credit_courant)
                    <td class="text-end text-dark"><b>{{formatpriceth($total_facture_courant-$total_credit_courant,getCurrency()->sigle)}}</b></td>
                    @else
                    <td  class="text-end text-dark"><b>{{formatpriceth($total_credit_courant-$total_facture_courant,getCurrency()->sigle)}}</b></td>
                    @endif

                    @if($total_facture_sup_trente>$total_credit_sup_trente)
                    <td class="text-end text-dark"><b>{{formatpriceth($total_facture_sup_trente-$total_credit_sup_trente,getCurrency()->sigle)}}</b></td>
                    @else
                    <td class="text-end text-dark"><b>{{formatpriceth($total_credit_sup_trente-$total_facture_sup_trente,getCurrency()->sigle)}}</b></td>
                    @endif

                    @if($total_facture_sup_soixante>$total_credit_sup_soixante)
                    <td class="text-end text-dark"><b>{{formatpriceth($total_facture_sup_soixante-$total_credit_sup_soixante,getCurrency()->sigle)}}</b></td>
                    @else
                    <td class="text-end text-dark"><b>{{formatpriceth($total_credit_sup_soixante-$total_facture_sup_soixante,getCurrency()->sigle)}}</b></td>
                    @endif

                    @if($total_facture_sup_90>$total_credit_sup_90)
                    <td class="text-end text-dark"><b>{{formatpriceth($total_facture_sup_90-$total_credit_sup_90,getCurrency()->sigle)}}</b></td>
                    @else 
                    <td class="text-end text-dark"><b>{{formatpriceth($total_credit_sup_90-$total_facture_sup_90,getCurrency()->sigle)}}</b></td>
                    @endif
                </tbody>
            </table>

      
    </div>
    </div>
</div>
</div>
@endsection
