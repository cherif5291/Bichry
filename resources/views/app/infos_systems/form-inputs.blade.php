@php $editing = isset($infosSystem) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nom_plateforme"
            label="Nom Plateforme"
            value="{{ old('nom_plateforme', ($editing ? $infosSystem->nom_plateforme : '')) }}"
            maxlength="255"
            placeholder="Nom Plateforme"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            >{{ old('description', ($editing ? $infosSystem->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="website"
            label="Website"
            value="{{ old('website', ($editing ? $infosSystem->website : '')) }}"
            maxlength="255"
            placeholder="Website"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="telephone"
            label="Telephone"
            value="{{ old('telephone', ($editing ? $infosSystem->telephone : '')) }}"
            maxlength="255"
            placeholder="Telephone"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="portable"
            label="Portable"
            value="{{ old('portable', ($editing ? $infosSystem->portable : '')) }}"
            maxlength="255"
            placeholder="Portable"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="logo_couleur"
            label="Logo Couleur"
            value="{{ old('logo_couleur', ($editing ? $infosSystem->logo_couleur : '')) }}"
            maxlength="255"
            placeholder="Logo Couleur"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="logo_blanc"
            label="Logo Blanc"
            value="{{ old('logo_blanc', ($editing ? $infosSystem->logo_blanc : '')) }}"
            maxlength="255"
            placeholder="Logo Blanc"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="fav_icon"
            label="Fav Icon"
            value="{{ old('fav_icon', ($editing ? $infosSystem->fav_icon : '')) }}"
            maxlength="255"
            placeholder="Fav Icon"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="email_contact"
            label="Email Contact"
            value="{{ old('email_contact', ($editing ? $infosSystem->email_contact : '')) }}"
            maxlength="255"
            placeholder="Email Contact"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="email_support"
            label="Email Support"
            value="{{ old('email_support', ($editing ? $infosSystem->email_support : '')) }}"
            maxlength="255"
            placeholder="Email Support"
        ></x-inputs.text>
    </x-inputs.group>
</div>
