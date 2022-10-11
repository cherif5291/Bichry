@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('transactions.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.transactions.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.transactions.inputs.banque_id')</h5>
                    <span
                        >{{ optional($transaction->banque)->nom ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.transactions.inputs.caisse_id')</h5>
                    <span
                        >{{ optional($transaction->caisse)->nom ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.transactions.inputs.motif')</h5>
                    <span>{{ $transaction->motif ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.transactions.inputs.montant')</h5>
                    <span>{{ $transaction->montant ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.transactions.inputs.pre_solde_banque')</h5>
                    <span>{{ $transaction->pre_solde_banque ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.transactions.inputs.post_solde_banque')</h5>
                    <span>{{ $transaction->post_solde_banque ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.transactions.inputs.pre_solde_caisse')</h5>
                    <span>{{ $transaction->pre_solde_caisse ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.transactions.inputs.post_solde_caisse')</h5>
                    <span>{{ $transaction->post_solde_caisse ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.transactions.inputs.type')</h5>
                    <span>{{ $transaction->type ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('transactions.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Transaction::class)
                <a
                    href="{{ route('transactions.create') }}"
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
