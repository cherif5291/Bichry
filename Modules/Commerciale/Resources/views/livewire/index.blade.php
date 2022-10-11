<div>
    @include('commerciale::components.header')
    @include('commerciale::components.stats')
    @include('commerciale::modals.modal-all')
    <div class="card-body bg-light table-responsive scrollbar" style="min-height: 69vh ">
        @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 4)->first()->voir == "yes")
            @include('commerciale::components.table')
        @else
            @include('layouts.admin.required.includes.controle.accessDeniedShow')
        @endif
    </div>
</div>

@section('scripts')
@include('commerciale::layouts.footer')
<script src="{{asset('js/sweetalert.min.js')}}"></script>
<script>
        window.addEventListener('openFactureUpdateModal', event => {
            event.preventDefault();
    	    $("#factureComPopup").addClass('is-visible');
        });

        window.addEventListener('openFactureAddModal', event => {
            event.preventDefault();
    	    $("#facture").addClass('is-visible');
        });

        window.addEventListener('openRecuUpdateModal', event => {
            event.preventDefault();
    	    $("#recuPopup").addClass('is-visible');
        });

        window.addEventListener('openRecuAddModal', event => {
            event.preventDefault();
    	    $("#recu").addClass('is-visible');
        });

        window.addEventListener('swal:modal', event => {
            swal({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
            })
        });

        window.addEventListener('swal:confirm-delete-article-recu', event => {
            swal({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.livewire.emit('deleteArticleRecu', event.detail.id);
                } else {
                    swal("Suppression Annuler !");
                }
            });
        });

        window.addEventListener('swal:confirm-delete-recu', event => {
            swal({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.livewire.emit('deleteFacture', event.detail.id, event.detail.typeFacture);
                } else {
                    swal("Suppression Annuler !");
                }
            });
        });

        window.addEventListener('swal:confirm-delete-article-facture', event => {
            swal({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.livewire.emit('deleteArticleFacture', event.detail.id);
                } else {
                    swal("Suppression Annuler !");
                }
            });
        });

        window.addEventListener('swal:confirm-delete-facture', event => {
            swal({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.livewire.emit('deleteFacture', event.detail.id, event.detail.typeFacture);
                } else {
                    swal("Suppression Annuler !");
                }
            });
        });

</script>
@endsection
