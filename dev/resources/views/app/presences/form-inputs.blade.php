@php $editing = isset($presence) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="employes_entreprise_id"
            label="Employes Entreprise"
            required
        >
            @php $selected = old('employes_entreprise_id', ($editing ? $presence->employes_entreprise_id : '')) @endphp
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
            value="{{ old('date', ($editing ? optional($presence->date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="heure_arrive"
            label="Heure Arrive"
            value="{{ old('heure_arrive', ($editing ? $presence->heure_arrive : '')) }}"
            maxlength="255"
            placeholder="Heure Arrive"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="heure_depard"
            label="Heure Depard"
            value="{{ old('heure_depard', ($editing ? $presence->heure_depard : '')) }}"
            maxlength="255"
            placeholder="Heure Depard"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="temps_absence"
            label="Temps Absence"
            value="{{ old('temps_absence', ($editing ? $presence->temps_absence : '')) }}"
            max="255"
            placeholder="Temps Absence"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="est_present"
            label="Est Present"
            value="{{ old('est_present', ($editing ? $presence->est_present : 'yes')) }}"
            maxlength="255"
            placeholder="Est Present"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
