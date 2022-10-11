@php $editing = isset($rupture) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="invitation_id" label="Invitation" required>
            @php $selected = old('invitation_id', ($editing ? $rupture->invitation_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Invitation</option>
            @foreach($invitations as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="entreprise_id" label="Entreprise" required>
            @php $selected = old('entreprise_id', ($editing ? $rupture->entreprise_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Entreprise</option>
            @foreach($entreprises as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="status"
            label="Status"
            value="{{ old('status', ($editing ? $rupture->status : '')) }}"
            maxlength="255"
            placeholder="Status"
        ></x-inputs.text>
    </x-inputs.group>
</div>
