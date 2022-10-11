<div>
    @include('depense::components.header')
    @include('depense::components.stats')
    @include('depense::modals.modal-all')

    <div class="card-body bg-light table-responsive scrollbar">
        @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 6)->first()->voir == "yes")
            @include('depense::components.table')
        @else
            @include('layouts.admin.required.includes.controle.accessDeniedShow')
        @endif

    </div>
</div>

@section('scripts')
    @include('depense::layouts.footer')
@endsection
