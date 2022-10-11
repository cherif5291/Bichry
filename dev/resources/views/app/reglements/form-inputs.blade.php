@php $editing = isset($reglement) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="clients_entreprise_id"
            label="Clients Entreprise"
            required
        >
            @php $selected = old('clients_entreprise_id', ($editing ? $reglement->clients_entreprise_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Clients Entreprise</option>
            @foreach($clientsEntreprises as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="facture_id" label="Facture">
            @php $selected = old('facture_id', ($editing ? $reglement->facture_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Facture</option>
            @foreach($factures as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="paiements_mode_id"
            label="Paiements Mode"
            required
        >
            @php $selected = old('paiements_mode_id', ($editing ? $reglement->paiements_mode_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Paiements Mode</option>
            @foreach($paiementsModes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="reference"
            label="Reference"
            value="{{ old('reference', ($editing ? $reglement->reference : '')) }}"
            maxlength="255"
            placeholder="Reference"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="cc_cci"
            label="Cc Cci"
            value="{{ old('cc_cci', ($editing ? $reglement->cc_cci : '')) }}"
            maxlength="255"
            placeholder="Cc Cci"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="approvisionnememnt"
            label="Approvisionnememnt"
            value="{{ old('approvisionnememnt', ($editing ? $reglement->approvisionnememnt : '')) }}"
            maxlength="255"
            placeholder="Approvisionnememnt"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="banque_id" label="Banque">
            @php $selected = old('banque_id', ($editing ? $reglement->banque_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Banque</option>
            @foreach($banques as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="caisse_id" label="Caisse">
            @php $selected = old('caisse_id', ($editing ? $reglement->caisse_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Caisse</option>
            @foreach($caisses as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="montant_recu"
            label="Montant Recu"
            value="{{ old('montant_recu', ($editing ? $reglement->montant_recu : '')) }}"
            max="255"
            step="0.01"
            placeholder="Montant Recu"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="note" label="Note" maxlength="255"
            >{{ old('note', ($editing ? $reglement->note : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
