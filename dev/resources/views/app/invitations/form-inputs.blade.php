@php $editing = isset($invitation) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="invitant_id"
            label="Invitant Id"
            value="{{ old('invitant_id', ($editing ? $invitation->invitant_id : '')) }}"
            max="255"
            placeholder="Invitant Id"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="invite_id"
            label="Invite Id"
            value="{{ old('invite_id', ($editing ? $invitation->invite_id : '')) }}"
            max="255"
            placeholder="Invite Id"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
