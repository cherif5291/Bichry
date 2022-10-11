<script src="{{asset('assets/admin/js/config.js')}}"></script>
<script src="{{asset('assets/admin/vendors/overlayscrollbars/OverlayScrollbars.min.js')}}"></script>
<!-- ===============================================-->
<!--    Stylesheets-->
<!-- ===============================================-->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
<link href="{{asset('assets/admin/vendors/overlayscrollbars/OverlayScrollbars.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/css/theme-rtl.min.css')}}" rel="stylesheet" id="style-rtl">
<link href="{{asset('assets/admin/css/theme.min.css')}}" rel="stylesheet" id="style-default">
<link href="{{asset('assets/admin/css/user-rtl.min.css')}}" rel="stylesheet" id="user-style-rtl">
<link href="{{asset('assets/admin/css/user.min.css')}}" rel="stylesheet" id="user-style-default">
<link href="{{asset('css/icon.css')}}" rel="stylesheet" id="user-style-default">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}

<script>
    var isRTL = JSON.parse(localStorage.getItem('isRTL'));
    if (isRTL) {
      var linkDefault = document.getElementById('style-default');
      var userLinkDefault = document.getElementById('user-style-default');
      linkDefault.setAttribute('disabled', true);
      userLinkDefault.setAttribute('disabled', true);
      document.querySelector('html').setAttribute('dir', 'rtl');
    } else {
      var linkRTL = document.getElementById('style-rtl');
      var userLinkRTL = document.getElementById('user-style-rtl');
      linkRTL.setAttribute('disabled', true);
      userLinkRTL.setAttribute('disabled', true);
    }



  </script>
