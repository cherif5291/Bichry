
<!DOCTYPE html>
<html lang="fr-FR" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Activation</title>

   @include('layouts.admin.required.styles')

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container" data-layout="container">
        <script>
          var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
        </script>
        <div class="row flex-center min-vh-100 py-6 text-center">

          <div class="col-md-8">
              <a class="d-flex flex-center mb-4" href="/"><span class="font-sans-serif fw-bolder fs-5 d-inline-block">Bilan-Pro</span></a>
            <div class="card">
                <div class="card-body d-flex justify-content-between col-md-12">
                        <div class="col-md-6">
                        <img src="{{asset('assets/activation.png')}}" class="mt-4" style="width: 100% " alt="">

                      </div>
                      <div class=" col-md-6 p-4 p-sm-5">
                        @include('front.messages')
                        <p class="lead mt-4 text-800 font-sans-serif fw-semi-bold w-md-75 w-xl-100 "><strong>{{__('messages.hello')}} {{$User->prenom}} {{$User->nom}}</strong> <br> {{__('messages.invalide_account')}}</p>
                        <hr/>
                        <p>{{__('messages.activation_tips')}} <br> <span class="mt-2 mb-2" style="margin-top: 4px !important; margin-bottom:4px !important">{{__('messages.email')}}:  <strong>{{$User->email}}</strong></span> <br> {{__('messages.if_problem')}}, <a href="mailto:info@exmaple.com">{{__('messages.contact_us')}}</a>.</p>
                        <div class="d-flex justify-content-around">
                            <a class="btn btn-primary btn mt-3" href="{{route('sendActivattion', $User->id)}}"><span class="fas fa-mail-bulk me-2"></span>Renvoyer le mail</a>
                            <a class="btn btn-danger btn mt-3" href="/"><span class="fas fa-home me-2"></span>Accueil</a>

                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    @include('layouts.admin.required.scripts')
  </body>

</html>
