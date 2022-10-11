@php $editing = isset($devisArticle) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="devis_id" label="Devis" required>
            @php $selected = old('devis_id', ($editing ? $devisArticle->devis_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Devis</option>
            @foreach($allDevis as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="taxe_id" label="Taxe" required>
            @php $selected = old('taxe_id', ($editing ? $devisArticle->taxe_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Taxe</option>
            @foreach($taxes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="article_id" label="Article" required>
            @php $selected = old('article_id', ($editing ? $devisArticle->article_id : '')) @endphp
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
            value="{{ old('qte', ($editing ? $devisArticle->qte : '1')) }}"
            max="255"
            placeholder="Qte"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="taux"
            label="Taux"
            value="{{ old('taux', ($editing ? $devisArticle->taux : '')) }}"
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
            value="{{ old('total', ($editing ? $devisArticle->total : '')) }}"
            max="255"
            step="0.01"
            placeholder="Total"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
