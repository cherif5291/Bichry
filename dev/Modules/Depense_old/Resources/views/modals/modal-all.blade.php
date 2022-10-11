{{-- Modal Update  --}}

<div id="depenseFactureUpdate" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @livewire('depense::facture.update')
</div>

<div id="depenseUpdate" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @livewire('depense::depense-simple.update')
</div>

<div id="chequeUpdate" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @livewire('depense::cheque.update')
</div>

<div id="creditUpdate" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @livewire('depense::credit-fournisseur.update')
</div>

{{-- Modal Add  --}}

<div id="depenseFactureAdd" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @livewire('depense::facture.add')
</div>

<div id="depenseAdd" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @livewire('depense::depense-simple.add')
</div>

<div id="chequeAdd" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @livewire('depense::cheque.add')
</div>

<div id="creditAdd" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @livewire('depense::credit-fournisseur.add')
</div>

{{-- Ajout Express Modal --}}

@include('depense::modals.add-compte')

@include('depense::modals.add-client')

@include('depense::modals.add-article')

@include('depense::modals.add-compte-paiement')
