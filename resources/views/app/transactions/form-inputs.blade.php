@php $editing = isset($transaction) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="banque_id" label="Banque" required>
            @php $selected = old('banque_id', ($editing ? $transaction->banque_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Banque</option>
            @foreach($banques as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="caisse_id" label="Caisse" required>
            @php $selected = old('caisse_id', ($editing ? $transaction->caisse_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Caisse</option>
            @foreach($caisses as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="motif" label="Motif" maxlength="255" required
            >{{ old('motif', ($editing ? $transaction->motif : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="montant"
            label="Montant"
            value="{{ old('montant', ($editing ? $transaction->montant : '')) }}"
            max="255"
            step="0.01"
            placeholder="Montant"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="pre_solde_banque"
            label="Pre Solde Banque"
            value="{{ old('pre_solde_banque', ($editing ? $transaction->pre_solde_banque : '')) }}"
            max="255"
            step="0.01"
            placeholder="Pre Solde Banque"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="post_solde_banque"
            label="Post Solde Banque"
            value="{{ old('post_solde_banque', ($editing ? $transaction->post_solde_banque : '')) }}"
            max="255"
            step="0.01"
            placeholder="Post Solde Banque"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="pre_solde_caisse"
            label="Pre Solde Caisse"
            value="{{ old('pre_solde_caisse', ($editing ? $transaction->pre_solde_caisse : '')) }}"
            max="255"
            step="0.01"
            placeholder="Pre Solde Caisse"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="post_solde_caisse"
            label="Post Solde Caisse"
            value="{{ old('post_solde_caisse', ($editing ? $transaction->post_solde_caisse : '')) }}"
            max="255"
            step="0.01"
            placeholder="Post Solde Caisse"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="type"
            label="Type"
            value="{{ old('type', ($editing ? $transaction->type : '')) }}"
            maxlength="255"
            placeholder="Type"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
