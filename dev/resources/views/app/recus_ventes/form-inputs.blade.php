@php $editing = isset($recusVente) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="clients_entreprise_id"
            label="Clients Entreprise"
            required
        >
            @php $selected = old('clients_entreprise_id', ($editing ? $recusVente->clients_entreprise_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Clients Entreprise</option>
            @foreach($clientsEntreprises as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="cc_cci" label="Cc Cci" maxlength="255"
            >{{ old('cc_cci', ($editing ? $recusVente->cc_cci : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="adresse_livraison"
            label="Adresse Livraison"
            maxlength="255"
            required
            >{{ old('adresse_livraison', ($editing ?
            $recusVente->adresse_livraison : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date_recu_vente"
            label="Date Recu Vente"
            value="{{ old('date_recu_vente', ($editing ? optional($recusVente->date_recu_vente)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="reference"
            label="Reference"
            value="{{ old('reference', ($editing ? $recusVente->reference : '')) }}"
            maxlength="255"
            placeholder="Reference"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="numero_recu"
            label="Numero Recu"
            value="{{ old('numero_recu', ($editing ? $recusVente->numero_recu : '')) }}"
            maxlength="255"
            placeholder="Numero Recu"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="article_id" label="Article" required>
            @php $selected = old('article_id', ($editing ? $recusVente->article_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Article</option>
            @foreach($articles as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="paiements_mode_id"
            label="Paiements Mode"
            required
        >
            @php $selected = old('paiements_mode_id', ($editing ? $recusVente->paiements_mode_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Paiements Mode</option>
            @foreach($paiementsModes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="message_recu"
            label="Message Recu"
            maxlength="255"
            required
            >{{ old('message_recu', ($editing ? $recusVente->message_recu : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="message_releve"
            label="Message Releve"
            maxlength="255"
            required
            >{{ old('message_releve', ($editing ? $recusVente->message_releve :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="depose_sur"
            label="Depose Sur"
            value="{{ old('depose_sur', ($editing ? $recusVente->depose_sur : '')) }}"
            maxlength="255"
            placeholder="Depose Sur"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="caisse_id" label="Caisse">
            @php $selected = old('caisse_id', ($editing ? $recusVente->caisse_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Caisse</option>
            @foreach($caisses as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="banque_id" label="Banque">
            @php $selected = old('banque_id', ($editing ? $recusVente->banque_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Banque</option>
            @foreach($banques as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="montant"
            label="Montant"
            value="{{ old('montant', ($editing ? $recusVente->montant : '')) }}"
            max="255"
            step="0.01"
            placeholder="Montant"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
