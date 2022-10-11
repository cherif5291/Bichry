@php $editing = isset($recurrence) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="facture_id" label="Facture">
            @php $selected = old('facture_id', ($editing ? $recurrence->facture_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Facture</option>
            @foreach($factures as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="paie_id" label="Reglement">
            @php $selected = old('paie_id', ($editing ? $recurrence->paie_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Paie</option>
            @foreach($paies as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="interval_jour"
            label="Interval Jour"
            value="{{ old('interval_jour', ($editing ? $recurrence->interval_jour : '')) }}"
            max="255"
            placeholder="Interval Jour"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="prochain_date"
            label="Prochain Date"
            value="{{ old('prochain_date', ($editing ? optional($recurrence->prochain_date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="regle_id" label="Regle" required>
            @php $selected = old('regle_id', ($editing ? $recurrence->regle_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Regle</option>
            @foreach($regles as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
