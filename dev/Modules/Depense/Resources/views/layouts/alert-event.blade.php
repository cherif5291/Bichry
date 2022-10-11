<script>
    window.addEventListener('swal:modal', event => {
        swal({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
        })
    });
</script>

@include('depense::scripts.facture-event')
@include('depense::scripts.credit-event')
@include('depense::scripts.cheque-event')
@include('depense::scripts.depense-event')
