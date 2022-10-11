@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('recurrences.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.recurrences.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.recurrences.inputs.facture_id')</h5>
                    <span
                        >{{ optional($recurrence->facture)->cc_cci ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recurrences.inputs.paie_id')</h5>
                    <span
                        >{{ optional($recurrence->reglement)->date ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recurrences.inputs.interval_jour')</h5>
                    <span>{{ $recurrence->interval_jour ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recurrences.inputs.prochain_date')</h5>
                    <span>{{ $recurrence->prochain_date ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recurrences.inputs.regle_id')</h5>
                    <span
                        >{{ optional($recurrence->regle)->motif ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('recurrences.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Recurrence::class)
                <a
                    href="{{ route('recurrences.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
