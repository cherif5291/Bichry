@php $editing = isset($taxe) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nom"
            label="Nom"
            value="{{ old('nom', ($editing ? $taxe->nom : '')) }}"
            maxlength="255"
            placeholder="Nom"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="taux"
            label="Taux"
            value="{{ old('taux', ($editing ? $taxe->taux : '')) }}"
            max="255"
            step="0.01"
            placeholder="Taux"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
