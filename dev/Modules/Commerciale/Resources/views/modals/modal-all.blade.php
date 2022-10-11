<div id="factureComPopup" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @include('commerciale::modals.facture-update')
</div>
<div id="facture" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @include('commerciale::modals.facture-create')
</div>

<div id="recuPopup" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @include('commerciale::modals.recu-update')
</div>

<div id="recu" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @include('commerciale::modals.recu-create')
</div>
@include('commerciale::modals.add-client')
@include('commerciale::modals.add-article')


{{--  --}}
{{-- <div id="PaiementfacturePopup" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @include('entreprise.commerciale.factures.facture.paiementfacture')
</div>



<div id="PaiementRecuPopup" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @include('entreprise.commerciale.factures.recu.paiementrecu')
</div>
 --}}
