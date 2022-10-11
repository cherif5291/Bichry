@php $editing = isset($facturesArticle) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="article_id" label="Article" required>
            @php $selected = old('article_id', ($editing ? $facturesArticle->article_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Article</option>
            @foreach($articles as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="qte"
            label="Qte"
            value="{{ old('qte', ($editing ? $facturesArticle->qte : '1')) }}"
            max="255"
            placeholder="Qte"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="taux"
            label="Taux"
            value="{{ old('taux', ($editing ? $facturesArticle->taux : '')) }}"
            max="255"
            step="0.01"
            placeholder="Taux"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="total"
            label="Total"
            value="{{ old('total', ($editing ? $facturesArticle->total : '0')) }}"
            max="255"
            step="0.01"
            placeholder="Total"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="taxe_id" label="Taxe" required>
            @php $selected = old('taxe_id', ($editing ? $facturesArticle->taxe_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Taxe</option>
            @foreach($taxes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
