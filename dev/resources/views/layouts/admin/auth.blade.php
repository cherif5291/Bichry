<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
   @include('layouts.admin.required.meta')
   @include('layouts.admin.required.styles')
   @livewireStyles
  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container-fluid" style="background-image: url('{{asset('assets/admin/img/login_lg.jpeg')}}'); background-size:cover; background-position:center">
        <div class="row min-vh-100 flex-center g-0" >
          <div class="col-lg-8 col-xxl-5 py-3 position-relative">
              <img class="bg-auth-circle-shape" src="../../../assets/img/icons/spot-illustrations/bg-shape.png" alt="" width="250"><img class="bg-auth-circle-shape-2" src="../../../assets/img/icons/spot-illustrations/shape-1.png" alt="" width="150">
            <div class="card overflow-hidden z-index-1">
              <div class="card-body p-0">
                <div class="row g-0 h-100">
                  <div class="col-md-5 text-center" style="background-image: url('{{asset('assets/admin/img/login_sm.jpeg')}}'); background-size:cover; background-position:center">
                    <div class="position-relative p-4 pt-md-5 pb-md-7 light" >
                      <div class="bg-holder bg-auth-card-shape" style="background-image:url(../../../assets/img/icons/spot-illustrations/half-circle.png);">
                      </div>
                      <!--/.bg-holder-->

                      <div class="z-index-1 position-relative"><a class="link-light mb-4 font-sans-serif fs-4 d-inline-block fw-bolder">BilanPro</a>
                      </div>
                    </div>
                    <div class="">
                      <p class="text-danger" style="margin-top: 30vh"></p>
                      <p class="mb-4 mt-md-5 fs--1 fw-semi-bold  opacity-75" style="color: black; ">
                        <span >
                            Vous n'avez pas de compte ?<br><a class="text-decoration-underline" href="">Choisir un abonnement</a>
                        </span> <br>
                        <span style="margin-top: 1em !important">
                            Voir les  <a class="text-decoration-underline " href="#!" style="color: black">termes</a> & <a class="text-decoration-underline" href="#!" style="color: black">conditions </a>
                        </span>
                       </p>
                    </div>
                  </div>
                  <div class="col-md-7 d-flex flex-center">
                    <div class="p-4 p-md-5 flex-grow-1">
                        @include('front.messages')
                        @yield('form')
                      {{-- <div class="position-relative mt-4">
                        <hr class="bg-300" />
                        <div class="divider-content-center">- se connecter via -</div>
                      </div>
                      <div class="row g-2 mt-2">
                        <div class="col-sm-6"><a href="{{route('2fa')}}" class="btn btn-outline-google-plus btn-sm d-block w-100" ><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> 2FA</a></div>
                        <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" ><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> facebook</a></div>
                      </div> --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    @include('layouts.admin.required.scripts')
    @livewireScripts
  </body>

</html>
