@php $editing = isset($facture) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="clients_entreprise_id"
            label="Clients Entreprise"
            required
        >
            @php $selected = old('clients_entreprise_id', ($editing ? $facture->clients_entreprise_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Clients Entreprise</option>
            @foreach($clientsEntreprises as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="paiements_modalite_id"
            label="Paiements Modalite"
            required
        >
            @php $selected = old('paiements_modalite_id', ($editing ? $facture->paiements_modalite_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Paiements Modalite</option>
            @foreach($paiementsModalites as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="factures_article_id"
            label="Factures Article"
            required
        >
            @php $selected = old('factures_article_id', ($editing ? $facture->factures_article_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Factures Article</option>
            @foreach($facturesArticles as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="cc_cci" label="Cc Cci" maxlength="255" required
            >{{ old('cc_cci', ($editing ? $facture->cc_cci : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="echeance"
            label="Echeance"
            value="{{ old('echeance', ($editing ? optional($facture->echeance)->format('Y-m-d') : '')) }}"
            max="255"
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="adresse_facturation"
            label="Adresse Facturation"
            maxlength="255"
            required
            >{{ old('adresse_facturation', ($editing ?
            $facture->adresse_facturation : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="numero_facture"
            label="Numero Facture"
            value="{{ old('numero_facture', ($editing ? $facture->numero_facture : '')) }}"
            maxlength="255"
            placeholder="Numero Facture"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="messsage" label="Messsage" maxlength="255"
            >{{ old('messsage', ($editing ? $facture->messsage : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="message_affiche"
            label="Message Affiche"
            maxlength="255"
            >{{ old('message_affiche', ($editing ? $facture->message_affiche :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="has_taxe"
            label="Has Taxe"
            value="{{ old('has_taxe', ($editing ? $facture->has_taxe : 'no')) }}"
            maxlength="255"
            placeholder="Has Taxe"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="fournisseur_id" label="Fournisseur" required>
            @php $selected = old('fournisseur_id', ($editing ? $facture->fournisseur_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Fournisseur</option>
            @foreach($fournisseurs as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="type"
            label="Type"
            value="{{ old('type', ($editing ? $facture->type : '')) }}"
            maxlength="255"
            placeholder="Type"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
