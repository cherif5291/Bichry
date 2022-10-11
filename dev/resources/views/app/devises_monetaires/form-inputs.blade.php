@php $editing = isset($devisesMonetaire) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nom"
            label="Nom"
            value="{{ old('nom', ($editing ? $devisesMonetaire->nom : '')) }}"
            maxlength="255"
            placeholder="Nom"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="sigle"
            label="Sigle"
            value="{{ old('sigle', ($editing ? $devisesMonetaire->sigle : '')) }}"
            maxlength="255"
            placeholder="Sigle"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="taux_echange"
            label="Taux Echange"
            value="{{ old('taux_echange', ($editing ? $devisesMonetaire->taux_echange : '')) }}"
            max="255"
            step="0.01"
            placeholder="Taux Echange"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
