<script>
    window.addEventListener('swal:confirm-delete-compte-cheque', event => {
        swal({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.livewire.emit('deleteCompteCheque', event.detail.id);
            } else {
                swal("Suppression Annuler !");
            }
        });
    });

    window.addEventListener('swal:confirm-delete-article-cheque', event => {
        swal({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.livewire.emit('deleteCompteCheque', event.detail.id);
            } else {
                swal("Suppression Annuler !");
            }
        });
    });

    window.addEventListener('swal:confirm-delete-cheque', event => {
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
