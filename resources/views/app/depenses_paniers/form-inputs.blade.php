@php $editing = isset($depensesPanier) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="clients_entreprise_id"
            label="Clients Entreprises"
            required
        >
            @php $selected = old('clients_entreprise_id', ($editing ? $depensesPanier->clients_entreprise_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Clients Entreprise</option>
            @foreach($clientsEntreprises as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="depense_id" label="Depense" required>
            @php $selected = old('depense_id', ($editing ? $depensesPanier->depense_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Depense</option>
            @foreach($depenses as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
