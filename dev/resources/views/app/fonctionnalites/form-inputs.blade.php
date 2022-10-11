@php $editing = isset($fonctionnalite) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="module_id" label="Module" required>
            @php $selected = old('module_id', ($editing ? $fonctionnalite->module_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Module</option>
            @foreach($modules as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nom"
            label="Nom"
            value="{{ old('nom', ($editing ? $fonctionnalite->nom : '')) }}"
            maxlength="255"
            placeholder="Nom"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $fonctionnalite->description :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="voir"
            label="Voir"
            value="{{ old('voir', ($editing ? $fonctionnalite->voir : '')) }}"
            maxlength="255"
            placeholder="Voir"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="ajouter"
            label="Ajouter"
            value="{{ old('ajouter', ($editing ? $fonctionnalite->ajouter : '')) }}"
            maxlength="255"
            placeholder="Ajouter"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="supprimer"
            label="Supprimer"
            value="{{ old('supprimer', ($editing ? $fonctionnalite->supprimer : '')) }}"
            maxlength="255"
            placeholder="Supprimer"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="modifier"
            label="Modifier"
            value="{{ old('modifier', ($editing ? $fonctionnalite->modifier : '')) }}"
            maxlength="255"
            placeholder="Modifier"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="exporter"
            label="Exporter"
            value="{{ old('exporter', ($editing ? $fonctionnalite->exporter : '')) }}"
            maxlength="255"
            placeholder="Exporter"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
