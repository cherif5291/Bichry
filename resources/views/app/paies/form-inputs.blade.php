@php $editing = isset($paie) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="employes_entreprise_id"
            label="Employes Entreprise"
            required
        >
            @php $selected = old('employes_entreprise_id', ($editing ? $paie->employes_entreprise_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Employes Entreprise</option>
            @foreach($employesEntreprises as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date"
            label="Date"
            value="{{ old('date', ($editing ? optional($paie->date)->format('Y-m-d') : '')) }}"
            max="255"
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="montant_paye"
            label="Montant Paye"
            value="{{ old('montant_paye', ($editing ? $paie->montant_paye : '')) }}"
            max="255"
            step="0.01"
            placeholder="Montant Paye"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="restant"
            label="Restant"
            value="{{ old('restant', ($editing ? $paie->restant : '0')) }}"
            max="255"
            step="0.01"
            placeholder="Restant"
        ></x-inputs.number>
    </x-inputs.group>
</div>
