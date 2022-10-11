@php $editing = isset($clientsEntreprise) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="entreprise_id" label="Entreprise" required>
            @php $selected = old('entreprise_id', ($editing ? $clientsEntreprise->entreprise_id : '')) @endphp
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
            value="{{ old('nom', ($editing ? $clientsEntreprise->nom : '')) }}"
            maxlength="255"
            placeholder="Nom"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="prenom"
            label="Prenom"
            value="{{ old('prenom', ($editing ? $clientsEntreprise->prenom : '')) }}"
            maxlength="255"
            placeholder="Prenom"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="entreprise"
            label="Entreprise"
            value="{{ old('entreprise', ($editing ? $clientsEntreprise->entreprise : '')) }}"
            maxlength="255"
            placeholder="Entreprise"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            value="{{ old('email', ($editing ? $clientsEntreprise->email : '')) }}"
            maxlength="255"
            placeholder="Email"
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="telephone"
            label="Telephone"
            maxlength="255"
            required
            >{{ old('telephone', ($editing ? $clientsEntreprise->telephone :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="portable" label="Portable" maxlength="255"
            >{{ old('portable', ($editing ? $clientsEntreprise->portable : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nom_pro"
            label="Nom Pro"
            value="{{ old('nom_pro', ($editing ? $clientsEntreprise->nom_pro : '')) }}"
            maxlength="255"
            placeholder="Nom Pro"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nom_chequier"
            label="Nom Chequier"
            value="{{ old('nom_chequier', ($editing ? $clientsEntreprise->nom_chequier : '')) }}"
            maxlength="255"
            placeholder="Nom Chequier"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="titre"
            label="Titre"
            value="{{ old('titre', ($editing ? $clientsEntreprise->titre : '')) }}"
            maxlength="255"
            placeholder="Titre"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="telecopie"
            label="Telecopie"
            value="{{ old('telecopie', ($editing ? $clientsEntreprise->telecopie : '')) }}"
            maxlength="255"
            placeholder="Telecopie"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="website"
            label="Website"
            value="{{ old('website', ($editing ? $clientsEntreprise->website : '')) }}"
            maxlength="255"
            placeholder="Website"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="adresse"
            label="Adresse"
            maxlength="255"
            required
            >{{ old('adresse', ($editing ? $clientsEntreprise->adresse : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="ville"
            label="Ville"
            value="{{ old('ville', ($editing ? $clientsEntreprise->ville : '')) }}"
            maxlength="255"
            placeholder="Ville"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="province"
            label="Province"
            value="{{ old('province', ($editing ? $clientsEntreprise->province : '')) }}"
            maxlength="255"
            placeholder="Province"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="code_postale"
            label="Code Postale"
            value="{{ old('code_postale', ($editing ? $clientsEntreprise->code_postale : '')) }}"
            maxlength="255"
            placeholder="Code Postale"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="pays"
            label="Pays"
            value="{{ old('pays', ($editing ? $clientsEntreprise->pays : '')) }}"
            maxlength="255"
            placeholder="Pays"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="note" label="Note" maxlength="255"
            >{{ old('note', ($editing ? $clientsEntreprise->note : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="paiements_mode_id" label="Paiements Mode">
            @php $selected = old('paiements_mode_id', ($editing ? $clientsEntreprise->paiements_mode_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Paiements Mode</option>
            @foreach($paiementsModes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="paiements_modalite_id"
            label="Paiements Modalite"
        >
            @php $selected = old('paiements_modalite_id', ($editing ? $clientsEntreprise->paiements_modalite_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Paiements Modalite</option>
            @foreach($paiementsModalites as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="devises_monetaire_id" label="Devises Monetaire">
            @php $selected = old('devises_monetaire_id', ($editing ? $clientsEntreprise->devises_monetaire_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Devises Monetaire</option>
            @foreach($devisesMonetaires as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="logo"
            label="Logo"
            value="{{ old('logo', ($editing ? $clientsEntreprise->logo : '')) }}"
            maxlength="255"
            placeholder="Logo"
        ></x-inputs.text>
    </x-inputs.group>
</div>
