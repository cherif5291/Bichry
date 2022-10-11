<script>
window.addEventListener('swal:confirm-delete-compte-depense-simple', event => {
    swal({
        title: event.detail.title,
        text: event.detail.text,
        icon: event.detail.type,
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            window.livewire.emit('deleteCompteDepense', event.detail.id);
        } else {
            swal("Suppression Annuler !");
        }
    });
});

window.addEventListener('swal:confirm-delete-article-depense-simple', event => {
    swal({
        title: event.detail.title,
        text: event.detail.text,
        icon: event.detail.type,
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            window.livewire.emit('deleteCompteDepense', event.detail.id);
        } else {
            swal("Suppression Annuler !");
        }
    });
});

window.addEventListener('swal:confirm-delete-depense-simple', event => {
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
