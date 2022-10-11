@php $editing = isset($contratsType) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="entreprise_id" label="Entreprise" required>
            @php $selected = old('entreprise_id', ($editing ? $contratsType->entreprise_id : '')) @endphp
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
            value="{{ old('nom', ($editing ? $contratsType->nom : '')) }}"
            maxlength="255"
            placeholder="Nom"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
