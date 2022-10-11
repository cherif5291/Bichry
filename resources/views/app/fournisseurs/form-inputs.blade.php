@php $editing = isset($fournisseur) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="entreprise_id" label="Entreprise" required>
            @php $selected = old('entreprise_id', ($editing ? $fournisseur->entreprise_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Entreprise</option>
            @foreach($entreprises as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="prenom"
            label="Prenom"
            value="{{ old('prenom', ($editing ? $fournisseur->prenom : '')) }}"
            maxlength="255"
            placeholder="Prenom"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nom"
            label="Nom"
            value="{{ old('nom', ($editing ? $fournisseur->nom : '')) }}"
            maxlength="255"
            placeholder="Nom"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="entreprise"
            label="Entreprise"
            value="{{ old('entreprise', ($editing ? $fournisseur->entreprise : '')) }}"
            maxlength="255"
            placeholder="Entreprise"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nom_pro"
            label="Nom Pro"
            value="{{ old('nom_pro', ($editing ? $fournisseur->nom_pro : '')) }}"
            maxlength="255"
            placeholder="Nom Pro"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nom_chequier"
            label="Nom Chequier"
            value="{{ old('nom_chequier', ($editing ? $fournisseur->nom_chequier : '')) }}"
            maxlength="255"
            placeholder="Nom Chequier"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            value="{{ old('email', ($editing ? $fournisseur->email : '')) }}"
            maxlength="255"
            placeholder="Email"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="telephone"
            label="Telephone"
            value="{{ old('telephone', ($editing ? $fournisseur->telephone : '')) }}"
            maxlength="255"
            placeholder="Telephone"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="portable"
            label="Portable"
            value="{{ old('portable', ($editing ? $fournisseur->portable : '')) }}"
            maxlength="255"
            placeholder="Portable"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="telecopie"
            label="Telecopie"
            value="{{ old('telecopie', ($editing ? $fournisseur->telecopie : '')) }}"
            maxlength="255"
            placeholder="Telecopie"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="website"
            label="Website"
            value="{{ old('website', ($editing ? $fournisseur->website : '')) }}"
            maxlength="255"
            placeholder="Website"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="titre"
            label="Titre"
            value="{{ old('titre', ($editing ? $fournisseur->titre : '')) }}"
            maxlength="255"
            placeholder="Titre"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="adresse"
            label="Adresse"
            value="{{ old('adresse', ($editing ? $fournisseur->adresse : '')) }}"
            maxlength="255"
            placeholder="Adresse"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="ville"
            label="Ville"
            value="{{ old('ville', ($editing ? $fournisseur->ville : '')) }}"
            maxlength="255"
            placeholder="Ville"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="province"
            label="Province"
            value="{{ old('province', ($editing ? $fournisseur->province : '')) }}"
            maxlength="255"
            placeholder="Province"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="code_postal"
            label="Code Postal"
            value="{{ old('code_postal', ($editing ? $fournisseur->code_postal : '')) }}"
            maxlength="255"
            placeholder="Code Postal"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="pays"
            label="Pays"
            value="{{ old('pays', ($editing ? $fournisseur->pays : '')) }}"
            maxlength="255"
            placeholder="Pays"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="note" label="Note" maxlength="255"
            >{{ old('note', ($editing ? $fournisseur->note : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="paiements_modalite_id"
            label="Paiements Modalite"
        >
            @php $selected = old('paiements_modalite_id', ($editing ? $fournisseur->paiements_modalite_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Paiements Modalite</option>
            @foreach($paiementsModalites as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="numero_compte"
            label="Numero Compte"
            value="{{ old('numero_compte', ($editing ? $fournisseur->numero_compte : '')) }}"
            maxlength="255"
            placeholder="Numero Compte"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="comptescomptable_id" label="Comptescomptable">
            @php $selected = old('comptescomptable_id', ($editing ? $fournisseur->comptescomptable_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Comptescomptable</option>
            @foreach($comptescomptables as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="solde_ouverture"
            label="Solde Ouverture"
            value="{{ old('solde_ouverture', ($editing ? $fournisseur->solde_ouverture : '')) }}"
            max="255"
            step="0.01"
            placeholder="Solde Ouverture"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date_ouverture"
            label="Date Ouverture"
            value="{{ old('date_ouverture', ($editing ? optional($fournisseur->date_ouverture)->format('Y-m-d') : '')) }}"
            max="255"
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="devises_monetaire_id"
            label="Devises Monetaire"
            required
        >
            @php $selected = old('devises_monetaire_id', ($editing ? $fournisseur->devises_monetaire_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Devises Monetaire</option>
            @foreach($devisesMonetaires as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
