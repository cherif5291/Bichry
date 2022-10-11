@php $editing = isset($caisse) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="entreprise_id" label="Entreprise" required>
            @php $selected = old('entreprise_id', ($editing ? $caisse->entreprise_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Entreprise</option>
            @foreach($entreprises as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nom"
            label="Nom"
            value="{{ old('nom', ($editing ? $caisse->nom : '')) }}"
            maxlength="255"
            placeholder="Nom"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="solde"
            label="Solde"
            value="{{ old('solde', ($editing ? $caisse->solde : '0')) }}"
            max="255"
            step="0.01"
            placeholder="Solde"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
