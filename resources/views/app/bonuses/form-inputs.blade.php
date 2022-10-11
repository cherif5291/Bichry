@php $editing = isset($bonus) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="type"
            label="Type"
            value="{{ old('type', ($editing ? $bonus->type : '')) }}"
            maxlength="255"
            placeholder="Type"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="duree"
            label="Duree"
            value="{{ old('duree', ($editing ? optional($bonus->duree)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="abonnement_id" label="Abonnement" required>
            @php $selected = old('abonnement_id', ($editing ? $bonus->abonnement_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Abonnement</option>
            @foreach($abonnements as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
