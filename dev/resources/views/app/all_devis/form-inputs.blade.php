@php $editing = isset($devis) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="entreprise_id" label="Entreprise" required>
            @php $selected = old('entreprise_id', ($editing ? $devis->entreprise_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Entreprise</option>
            @foreach($entreprises as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="clients_entreprise_id"
            label="Clients Entreprise"
        >
            @php $selected = old('clients_entreprise_id', ($editing ? $devis->clients_entreprise_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Clients Entreprise</option>
            @foreach($clientsEntreprises as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="cc_cci" label="Cc Cci" maxlength="255"
            >{{ old('cc_cci', ($editing ? $devis->cc_cci : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="adresse_facturation"
            label="Adresse Facturation"
            maxlength="255"
            required
            >{{ old('adresse_facturation', ($editing ?
            $devis->adresse_facturation : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="expiration"
            label="Expiration"
            value="{{ old('expiration', ($editing ? optional($devis->expiration)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="numero_devis"
            label="Numero Devis"
            value="{{ old('numero_devis', ($editing ? $devis->numero_devis : '')) }}"
            maxlength="255"
            placeholder="Numero Devis"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="message_devis"
            label="Message Devis"
            maxlength="255"
            >{{ old('message_devis', ($editing ? $devis->message_devis : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="message_releve"
            label="Message Releve"
            maxlength="255"
            >{{ old('message_releve', ($editing ? $devis->message_releve : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="status"
            label="Status"
            value="{{ old('status', ($editing ? $devis->status : 'deivis')) }}"
            maxlength="255"
            placeholder="Status"
        ></x-inputs.text>
    </x-inputs.group>
</div>
