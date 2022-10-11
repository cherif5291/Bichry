@php $editing = isset($piecesJointe) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="fichier"
            label="Fichier"
            maxlength="255"
            required
            >{{ old('fichier', ($editing ? $piecesJointe->fichier : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
