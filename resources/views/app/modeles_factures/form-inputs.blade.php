@php $editing = isset($modelesFacture) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nom"
            label="Nom"
            value="{{ old('nom', ($editing ? $modelesFacture->nom : '')) }}"
            maxlength="255"
            placeholder="Nom"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="contenu"
            label="Contenu"
            maxlength="255"
            required
            >{{ old('contenu', ($editing ? $modelesFacture->contenu : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
