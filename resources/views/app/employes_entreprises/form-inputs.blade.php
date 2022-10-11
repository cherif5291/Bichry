@php $editing = isset($employesEntreprise) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="entreprise_id" label="Entreprise" required>
            @php $selected = old('entreprise_id', ($editing ? $employesEntreprise->entreprise_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Entreprise</option>
            @foreach($entreprises as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $employesEntreprise->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="prenom"
            label="Prenom"
            value="{{ old('prenom', ($editing ? $employesEntreprise->prenom : '')) }}"
            maxlength="255"
            placeholder="Prenom"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nom"
            label="Nom"
            value="{{ old('nom', ($editing ? $employesEntreprise->nom : '')) }}"
            maxlength="255"
            placeholder="Nom"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="initial"
            label="Initial"
            value="{{ old('initial', ($editing ? $employesEntreprise->initial : '')) }}"
            maxlength="255"
            placeholder="Initial"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            value="{{ old('email', ($editing ? $employesEntreprise->email : '')) }}"
            maxlength="255"
            placeholder="Email"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="telephone"
            label="Telephone"
            value="{{ old('telephone', ($editing ? $employesEntreprise->telephone : '')) }}"
            maxlength="255"
            placeholder="Telephone"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="data_embauche"
            label="Data Embauche"
            value="{{ old('data_embauche', ($editing ? optional($employesEntreprise->data_embauche)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="interval_paiement"
            label="Interval Paiement"
            value="{{ old('interval_paiement', ($editing ? $employesEntreprise->interval_paiement : 'jour')) }}"
            maxlength="255"
            placeholder="Interval Paiement"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="duree_interval"
            label="Duree Interval"
            value="{{ old('duree_interval', ($editing ? $employesEntreprise->duree_interval : '')) }}"
            max="255"
            placeholder="Duree Interval"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="remuneration"
            label="Remuneration"
            value="{{ old('remuneration', ($editing ? $employesEntreprise->remuneration : '')) }}"
            max="255"
            step="0.01"
            placeholder="Remuneration"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
