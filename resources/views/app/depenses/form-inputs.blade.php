@php $editing = isset($depense) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="client_id" label="Client" required>
            @php $selected = old('client_id', ($editing ? $depense->client_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Entreprise</option>
            @foreach($entreprises as $value => $label)
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
            @php $selected = old('paiements_mode_id', ($editing ? $depense->paiements_mode_id : '')) @endphp
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
            value="{{ old('reference', ($editing ? $depense->reference : '')) }}"
            maxlength="255"
            placeholder="Reference"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="note" label="Note" maxlength="255" required
            >{{ old('note', ($editing ? $depense->note : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="source"
            label="Source"
            value="{{ old('source', ($editing ? $depense->source : '')) }}"
            maxlength="255"
            placeholder="Source"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
