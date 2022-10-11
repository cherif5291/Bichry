@php $editing = isset($modulePack) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="package_id" label="Package" required>
            @php $selected = old('package_id', ($editing ? $modulePack->package_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Package</option>
            @foreach($packages as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="module_id" label="Module" required>
            @php $selected = old('module_id', ($editing ? $modulePack->module_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Module</option>
            @foreach($modules as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
