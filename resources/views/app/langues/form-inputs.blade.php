@php $editing = isset($langue) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nom"
            label="Nom"
            value="{{ old('nom', ($editing ? $langue->nom : '')) }}"
            maxlength="255"
            placeholder="Nom"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="traduction"
            label="Traduction"
            maxlength="255"
            required
            >{{ old('traduction', ($editing ? $langue->traduction : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
