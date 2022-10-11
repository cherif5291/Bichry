<script>

window.addEventListener('swal:confirm-delete-article-credit', event => {
    swal({
        title: event.detail.title,
        text: event.detail.text,
        icon: event.detail.type,
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            window.livewire.emit('deleteCompteCredit', event.detail.id);
        } else {
            swal("Suppression Annuler !");
        }
    });
});

window.addEventListener('swal:confirm-delete-credit', event => {
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
