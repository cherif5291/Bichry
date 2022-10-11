

    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{asset('assets/admin/vendors/popper/popper.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/anchorjs/anchor.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/is/is.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/swiper/swiper-bundle.min.js')}}"> </script>
    <script src="{{asset('assets/admin/vendors/typed.js/typed.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/fontawesome/all.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/lodash/lodash.min.js')}}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{asset('assets/admin/vendors/list.js/list.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/theme.js')}}"></script>
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

    </script>
    @yield('scripts')
</body>

</html>
