<script src="{{asset('assets/admin/vendors/popper/popper.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/anchorjs/anchor.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/is/is.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/echarts/echarts.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/fontawesome/all.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/lodash/lodash.min.js')}}"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="{{asset('assets/admin/vendors/list.js/list.min.js')}}"></script>
<script src="{{asset('assets/admin/js/theme.js')}}"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
$('.js-example-basic-single').select2();
});
</script> --}}
@if (Session('success') || Session('error') || $errors->any())

{{-- <button hidden class="btn btn-primary" id="liveToastBtn" type="button">Show live toast</button> --}}

<script>
   var liveToast = new window.bootstrap.Toast(document.getElementById('liveToast'));
    liveToast && liveToast.show();
</script>

@endif

{{--
    <script src="{{asset('assets/admin/vendors/chart/chart.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/leaflet/leaflet.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/leaflet.markercluster/leaflet.markercluster.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/countup/countUp.umd.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/fullcalendar/main.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/flatpickr.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/dayjs/dayjs.min.js')}}"></script> --}}


    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

