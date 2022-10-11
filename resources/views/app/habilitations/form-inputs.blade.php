@php $editing = isset($habilitation) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $habilitation->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="habilitation"
            label="Habilitation"
            maxlength="255"
            required
            >{{ old('habilitation', ($editing ? $habilitation->habilitation :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="module_id" label="Module" required>
            @php $selected = old('module_id', ($editing ? $habilitation->module_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Module</option>
            @foreach($modules as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="fonctionnalite_id"
            label="Fonctionnalite"
            required
        >
            @php $selected = old('fonctionnalite_id', ($editing ? $habilitation->fonctionnalite_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Fonctionnalite</option>
            @foreach($fonctionnalites as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
