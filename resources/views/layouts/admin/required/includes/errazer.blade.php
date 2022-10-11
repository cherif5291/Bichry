@if ($PageName == "Nouvelle dépense")
    <a class="btn btn-danger" href="{{route('admin.depense.depenseSimple.delete', $Depense->id)}}">Effacer</a>
@endif

@if ($PageName == "Nouvelle facture à payer")
    <a class="btn btn-danger" href="{{route('admin.depense.facture.delete', $Depense->id)}}">Effacer</a>
@endif

@if ($PageName == "Nouveau Chèque")
    <a class="btn btn-danger" href="{{route('admin.depense.cheque.delete', $Depense->id)}}">Effacer</a>
@endif

@if ($PageName == "Nouveau crédit fournisseur")
    <a class="btn btn-danger" href="{{route('admin.depense.depenseSimple.delete', $Depense->id)}}">Effacer</a>
@endif



@if ($PageName == "Nouvelle facture commerciale")
    <a class="btn btn-danger" href="{{route('admin.factures.factures.delete', $Facture->id)}}">Effacer</a>
@endif

@if ($PageName == "Nouveau reçu de vent")
    <a class="btn btn-danger" href="{{route('admin.factures.recu.delete', $Facture->id)}}">Effacer</a>
@endif
