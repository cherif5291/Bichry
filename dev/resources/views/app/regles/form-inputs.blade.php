@php $editing = isset($regle) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="banque_id" label="Banque" required>
            @php $selected = old('banque_id', ($editing ? $regle->banque_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Banque</option>
            @foreach($banques as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="motif"
            label="Motif"
            value="{{ old('motif', ($editing ? $regle->motif : '')) }}"
            maxlength="255"
            placeholder="Motif"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="montant"
            label="Montant"
            value="{{ old('montant', ($editing ? $regle->montant : '')) }}"
            max="255"
            step="0.01"
            placeholder="Montant"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
