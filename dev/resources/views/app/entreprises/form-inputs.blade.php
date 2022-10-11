@php $editing = isset($entreprise) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $entreprise->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nom_entreprise"
            label="Nom Entreprise"
            value="{{ old('nom_entreprise', ($editing ? $entreprise->nom_entreprise : '')) }}"
            maxlength="255"
            placeholder="Nom Entreprise"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="a_propos"
            label="A Propos"
            maxlength="255"
            required
            >{{ old('a_propos', ($editing ? $entreprise->a_propos : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            value="{{ old('email', ($editing ? $entreprise->email : '')) }}"
            maxlength="255"
            placeholder="Email"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="telephone"
            label="Telephone"
            value="{{ old('telephone', ($editing ? $entreprise->telephone : '')) }}"
            maxlength="255"
            placeholder="Telephone"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="portable"
            label="Portable"
            value="{{ old('portable', ($editing ? $entreprise->portable : '')) }}"
            maxlength="255"
            placeholder="Portable"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="adresse"
            label="Adresse"
            maxlength="255"
            required
            >{{ old('adresse', ($editing ? $entreprise->adresse : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="capital"
            label="Capital"
            value="{{ old('capital', ($editing ? $entreprise->capital : '')) }}"
            max="255"
            step="0.01"
            placeholder="Capital"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="logo"
            label="Logo"
            value="{{ old('logo', ($editing ? $entreprise->logo : '')) }}"
            maxlength="255"
            placeholder="Logo"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="modeles_devis_id" label="Modeles Devis" required>
            @php $selected = old('modeles_devis_id', ($editing ? $entreprise->modeles_devis_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Modeles Devis</option>
            @foreach($allModelesDevis as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="modeles_facture_id"
            label="Modeles Facture"
            required
        >
            @php $selected = old('modeles_facture_id', ($editing ? $entreprise->modeles_facture_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Modeles Facture</option>
            @foreach($modelesFactures as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="modeles_recu_id" label="Modeles Recu" required>
            @php $selected = old('modeles_recu_id', ($editing ? $entreprise->modeles_recu_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Modeles Recu</option>
            @foreach($modelesRecus as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="devises_monetaire_id"
            label="Devises Monetaire"
            required
        >
            @php $selected = old('devises_monetaire_id', ($editing ? $entreprise->devises_monetaire_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Devises Monetaire</option>
            @foreach($devisesMonetaires as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="couleur_primaire"
            label="Couleur Primaire"
            value="{{ old('couleur_primaire', ($editing ? $entreprise->couleur_primaire : '')) }}"
            maxlength="255"
            placeholder="Couleur Primaire"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="couleur_secondaire"
            label="Couleur Secondaire"
            value="{{ old('couleur_secondaire', ($editing ? $entreprise->couleur_secondaire : '')) }}"
            maxlength="255"
            placeholder="Couleur Secondaire"
        ></x-inputs.text>
    </x-inputs.group>
</div>
