<script>
    window.addEventListener('openDepenseFactureUpdateModal', event => {
        event.preventDefault();
        $("#depenseFactureAdd").removeClass('is-visible');
        $("#depenseFactureUpdate").addClass('is-visible');
    });

    window.addEventListener('openDepenseUpdateModal', event => {
        event.preventDefault();
        $("#depenseAdd").removeClass('is-visible');
        $("#depenseUpdate").addClass('is-visible');
    });

    window.addEventListener('openChequeUpdateModal', event => {
        event.preventDefault();
        $("#chequeAdd").removeClass('is-visible');
        $("#chequeUpdate").addClass('is-visible');
    });

    window.addEventListener('openCreditUpdateModal', event => {
        event.preventDefault();
        $("#creditAdd").removeClass('is-visible');
        $("#creditUpdate").addClass('is-visible');
    });
</script>

{{-- Modal For Add --}}

<script>
     window.addEventListener('openDepenseFactureAddModal', event => {
        event.preventDefault();
        $("#depenseFactureUpdate").removeClass('is-visible');
        $("#depenseFactureAdd").addClass('is-visible');
    });

    window.addEventListener('openDepenseAddModal', event => {
        event.preventDefault();
        $("#depenseUpdate").removeClass('is-visible');
        $("#depenseAdd").addClass('is-visible');
    });

    window.addEventListener('openChequeAddModal', event => {
        event.preventDefault();
        $("#chequeUpdate").removeClass('is-visible');
        $("#chequeAdd").addClass('is-visible');
    });

    window.addEventListener('openCreditAddModal', event => {
        event.preventDefault();
        $("#creditUpdate").removeClass('is-visible');
        $("#creditAdd").addClass('is-visible');
    });

</script>
