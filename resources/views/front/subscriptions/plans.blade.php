@extends('layouts.front.front')


@section('content')
<section class="py-0 overflow-hidden light" id="banner" style="height: 40vh !important">

    <div class="bg-holder overlay"
        style="background-image:url({{asset('assets/admin/img/generic/bg-2.jpg')}});background-position: center bottom; ">
    </div>
    <!--/.bg-holder-->

    <div class="container">
        <div class="row flex-center " style="padding-top: 6em !important; padding-bottom: 3em !importan">
            <div class="col-md-11 col-lg-8 col-xl-4 pb-7 pb-xl-9 text-center text-xl-start"><a
                    class="btn btn-outline-danger mb-4 fs--1 border-2 rounded-pill" href="#pricings"><span class="me-2"
                        role="img" aria-label="Gift">🎁</span>Voir nos Offres</a>
                <h1 class="text-white fw-light">Optez <span class="typed-text fw-bold"
                        data-typed-text='["le meilleur","du professionnalisme","la simplicité","Bilan Pro"]'></span><br />pour
                    votre entreprise.</h1>

            </div>
            <div class="col-xl-7 offset-xl-1 align-self-end mt-4 mt-xl-0"><a class=" rounded"
                    href="{{route('front.register')}}"><img class="img-fluid"
                        src="{{asset('assets/admin/img/generic/dashboard-alt.jpg')}}" style="height: 0vh !important"
                        alt="" /></a></div>
        </div>
    </div>
    <!-- end of .container-->

</section>

<section>
    <div class="container d-flex justify-content-center">
        <div class="col-md-8 h-100">
            <div class="d-flex mb-4"><span class="fa-stack me-2 ms-n1"><svg
                        class="svg-inline--fa fa-circle fa-w-16 fa-stack-2x text-300" aria-hidden="true"
                        focusable="false" data-prefix="fas" data-icon="circle" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                    </svg><!-- <i class="fas fa-circle fa-stack-2x text-300"></i> Font Awesome fontawesome.com --><svg
                        class="svg-inline--fa fa-check-double fa-w-16 fa-inverse fa-stack-1x text-primary"
                        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-double" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M505 174.8l-39.6-39.6c-9.4-9.4-24.6-9.4-33.9 0L192 374.7 80.6 263.2c-9.4-9.4-24.6-9.4-33.9 0L7 302.9c-9.4 9.4-9.4 24.6 0 34L175 505c9.4 9.4 24.6 9.4 33.9 0l296-296.2c9.4-9.5 9.4-24.7.1-34zm-324.3 106c6.2 6.3 16.4 6.3 22.6 0l208-208.2c6.2-6.3 6.2-16.4 0-22.6L366.1 4.7c-6.2-6.3-16.4-6.3-22.6 0L192 156.2l-55.4-55.5c-6.2-6.3-16.4-6.3-22.6 0L68.7 146c-6.2 6.3-6.2 16.4 0 22.6l112 112.2z">
                        </path>
                    </svg>
                    <!-- <i class="fa-inverse fa-stack-1x text-primary fas fa-check-double"></i> Font Awesome fontawesome.com --></span>
                <div class="col">
                    <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">With
                            Validation</span><span
                            class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span>
                    </h5>
                    <p class="mb-0">You can easily show your stats content by using these cards.</p>
                </div>
            </div>
            <div class="card theme-wizard h-100 mb-5">
                <div class="card-header bg-light pt-3 pb-2">
                    <ul class="nav justify-content-between nav-wizard">
                        <li class="nav-item"><a class="nav-link active fw-semi-bold"
                                href="#bootstrap-wizard-validation-tab1" data-bs-toggle="tab"
                                data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span
                                        class="nav-item-circle"><svg class="svg-inline--fa fa-lock fa-w-14"
                                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="lock"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z">
                                            </path>
                                        </svg>
                                        <!-- <span class="fas fa-lock"></span> Font Awesome fontawesome.com --></span></span><span
                                    class="d-none d-md-block mt-1 fs--1">Account</span></a></li>
                        <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab2"
                                data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span
                                    class="nav-item-circle-parent"><span class="nav-item-circle"><svg
                                            class="svg-inline--fa fa-user fa-w-14" aria-hidden="true" focusable="false"
                                            data-prefix="fas" data-icon="user" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z">
                                            </path>
                                        </svg>
                                        <!-- <span class="fas fa-user"></span> Font Awesome fontawesome.com --></span></span><span
                                    class="d-none d-md-block mt-1 fs--1">Personal</span></a></li>
                        <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab3"
                                data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span
                                    class="nav-item-circle-parent"><span class="nav-item-circle"><svg
                                            class="svg-inline--fa fa-dollar-sign fa-w-9" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="dollar-sign" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 288 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M209.2 233.4l-108-31.6C88.7 198.2 80 186.5 80 173.5c0-16.3 13.2-29.5 29.5-29.5h66.3c12.2 0 24.2 3.7 34.2 10.5 6.1 4.1 14.3 3.1 19.5-2l34.8-34c7.1-6.9 6.1-18.4-1.8-24.5C238 74.8 207.4 64.1 176 64V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-2.5C45.8 64-5.4 118.7.5 183.6c4.2 46.1 39.4 83.6 83.8 96.6l102.5 30c12.5 3.7 21.2 15.3 21.2 28.3 0 16.3-13.2 29.5-29.5 29.5h-66.3C100 368 88 364.3 78 357.5c-6.1-4.1-14.3-3.1-19.5 2l-34.8 34c-7.1 6.9-6.1 18.4 1.8 24.5 24.5 19.2 55.1 29.9 86.5 30v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-48.2c46.6-.9 90.3-28.6 105.7-72.7 21.5-61.6-14.6-124.8-72.5-141.7z">
                                            </path>
                                        </svg>
                                        <!-- <span class="fas fa-dollar-sign"></span> Font Awesome fontawesome.com --></span></span><span
                                    class="d-none d-md-block mt-1 fs--1">Billing</span></a></li>
                        <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab4"
                                data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span
                                    class="nav-item-circle-parent"><span class="nav-item-circle"><svg
                                            class="svg-inline--fa fa-thumbs-up fa-w-16" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="thumbs-up" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M104 224H24c-13.255 0-24 10.745-24 24v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V248c0-13.255-10.745-24-24-24zM64 472c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zM384 81.452c0 42.416-25.97 66.208-33.277 94.548h101.723c33.397 0 59.397 27.746 59.553 58.098.084 17.938-7.546 37.249-19.439 49.197l-.11.11c9.836 23.337 8.237 56.037-9.308 79.469 8.681 25.895-.069 57.704-16.382 74.757 4.298 17.598 2.244 32.575-6.148 44.632C440.202 511.587 389.616 512 346.839 512l-2.845-.001c-48.287-.017-87.806-17.598-119.56-31.725-15.957-7.099-36.821-15.887-52.651-16.178-6.54-.12-11.783-5.457-11.783-11.998v-213.77c0-3.2 1.282-6.271 3.558-8.521 39.614-39.144 56.648-80.587 89.117-113.111 14.804-14.832 20.188-37.236 25.393-58.902C282.515 39.293 291.817 0 312 0c24 0 72 8 72 81.452z">
                                            </path>
                                        </svg>
                                        <!-- <span class="fas fa-thumbs-up"></span> Font Awesome fontawesome.com --></span></span><span
                                    class="d-none d-md-block mt-1 fs--1">Done</span></a></li>
                    </ul>
                </div>
                <div class="card-body py-4" id="wizard-controller">
                    <form class="needs-validation was-validated" action="{{route('front.payment')}}"
                        method="post" novalidate="novalidate"> @csrf



                        <div class="tab-content">
                            <div class="tab-pane active px-sm-3 px-md-5" role="tabpanel"
                                aria-labelledby="bootstrap-wizard-validation-tab1"
                                id="bootstrap-wizard-validation-tab1">
                                <div class="mb-3">
                                    <label class="form-label" for="nom_entreprise">Nom de votre entreprise</label>
                                    <input class="form-control" type="text" name="nom_entreprise"
                                        placeholder="exemple: Tractosen" id="nom_entreprise">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="email_entreprise">Email Professionnel
                                        entreprise*</label>
                                    <input class="form-control" type="email" name="email_entreprise"
                                        placeholder="Email address"
                                        pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$"
                                        required="required" id="email_entreprise" data-wizard-validate-email="true">
                                    <div class="invalid-feedback">Vous devez ajouter un email</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="telephone_entreprise">Téléphone Entreprise</label>
                                    <input class="form-control" type="text" name="telephone_entreprise"
                                        placeholder="exemple: Tractosen" id="telephone_entreprise">
                                </div>
                                <div class="row g-2" hidden>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="bootstrap-wizard-validation-wizard-password">Password*</label>
                                            <input class="form-control" type="password" name="passdddword" value="dd"
                                                placeholder="Password" required="required"
                                                id="bootstrap-wizard-validation-wizard-password"
                                                data-wizard-validate-password="true">
                                            <div class="invalid-feedback">Please enter password</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="bootstrap-wizard-validation-wizard-confirm-password">Confirm
                                                Password*</label>
                                            <input class="form-control" type="password" name="confidddrmPassword"
                                                value="ddd" placeholder="Confirm Password" required="required"
                                                id="bootstrap-wizard-validation-wizard-confirm-password"
                                                data-wizard-validate-confirm-password="true">
                                            <div class="invalid-feedback">Passwords need to match</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="terms" required="required"
                                        checked="checked" id="bootstrap-wizard-validation-wizard-checkbox">
                                    <label class="form-check-label"
                                        for="bootstrap-wizard-validation-wizard-checkbox">J'accepte les <a
                                            href="#!">termes </a>& <a href="#!">Conditions</a></label>
                                </div>

                            </div>
                            <div class="tab-pane px-sm-3 px-md-5" role="tabpanel"
                                aria-labelledby="bootstrap-wizard-validation-tab2"
                                id="bootstrap-wizard-validation-tab2">

                                <div class="mb-3">
                                    <label class="form-label" for="bootstrap-wizard-validation-wizard-phone">Votre
                                        prénom</label>
                                    <input class="form-control" type="text" name="prenom" placeholder="Phone"
                                        id="bootstrap-wizard-validation-wizard-phone">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="bootstrap-wizard-validation-wizard-phone">Nom</label>
                                    <input class="form-control" type="text" name="nom" placeholder="Phone"
                                        id="bootstrap-wizard-validation-wizard-phone">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"
                                        for="bootstrap-wizard-validation-wizard-phone">Email</label>
                                    <input class="form-control" type="text" name="email" placeholder="Phone"
                                        id="bootstrap-wizard-validation-wizard-phone">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"
                                        for="bootstrap-wizard-validation-wizard-phone">Téléphone</label>
                                    <input class="form-control" type="text" name="telephone" placeholder="Phone"
                                        id="bootstrap-wizard-validation-wizard-phone">
                                </div>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="bootstrap-wizard-validation-wizard-password">Mot de passe*</label>
                                            <input class="form-control" type="password" name="pass1"
                                                placeholder="Password" required="required"
                                                id="bootstrap-wizard-validation-wizard-password"
                                                data-wizard-validate-password="true">
                                            <div class="invalid-feedback">Please enter password</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="bootstrap-wizard-validation-wizard-confirm-password">Confirmation
                                                mot de passe*</label>
                                            <input class="form-control" type="password" name="pass2"
                                                placeholder="Confirm Password" required="required"
                                                id="bootstrap-wizard-validation-wizard-confirm-password"
                                                data-wizard-validate-confirm-password="true">
                                            <div class="invalid-feedback">Passwords need to match</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane px-sm-3 px-md-5 text-center" role="tabpanel"
                                aria-labelledby="bootstrap-wizard-validation-tab3"
                                id="bootstrap-wizard-validation-tab3">
                                <div class="d-flex justify-content-between">
                                    <div class="col-md-4">
                                        <div class="col-md-12">{{$plans->find(1)->title}}</div>
                                        <div class="col-md-12">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="inlineRadio1" type="radio"
                                                    name="pack" value="1" required/>
                                                <label class="form-check-label" for="inlineRadio1">Choisir</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="tab-pane text-center px-sm-3 px-md-5" role="tabpanel"
                                aria-labelledby="bootstrap-wizard-validation-tab4"
                                id="bootstrap-wizard-validation-tab4">
                                <div class="wizard-lottie-wrapper">
                                    <div class="lottie wizard-lottie mx-auto my-3"
                                        data-options="{{asset('assets/img/animated-icons/celebration.json')}}">
                                        <input type="hidden" name="priceId" value="price_1KFIgMCqfjPSAnLhsP5pcDOr" />

                                    </div>
                                </div>
                                <h4 class="mb-1">Your account is all set!</h4>
                                <p>Now you can access to your account</p>
                                <button class="btn btn-primary px-5 my-3" type="submit"> Valider L'inscription ($150)</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer bg-light">
                    <div class="px-sm-3 px-md-5">
                        <ul class="pager wizard list-inline mb-0">
                            <li class="previous">
                                <button class="btn btn-link ps-0 d-none" type="button"><svg
                                        class="svg-inline--fa fa-chevron-left fa-w-10 me-2" data-fa-transform="shrink-3"
                                        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left"
                                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                        data-fa-i2svg="" style="transform-origin: 0.3125em 0.5em;">
                                        <g transform="translate(160 256)">
                                            <g transform="translate(0, 0)  scale(0.8125, 0.8125)  rotate(0 0 0)">
                                                <path fill="currentColor"
                                                    d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"
                                                    transform="translate(-160 -256)"></path>
                                            </g>
                                        </g>
                                    </svg>
                                    <!-- <span class="fas fa-chevron-left me-2" data-fa-transform="shrink-3"></span> Font Awesome fontawesome.com -->Prev</button>
                            </li>
                            <li class="next">
                                <button class="btn btn-primary px-5 px-sm-6" type="submit">Next<svg
                                        class="svg-inline--fa fa-chevron-right fa-w-10 ms-2"
                                        data-fa-transform="shrink-3" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="chevron-right" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""
                                        style="transform-origin: 0.3125em 0.5em;">
                                        <g transform="translate(160 256)">
                                            <g transform="translate(0, 0)  scale(0.8125, 0.8125)  rotate(0 0 0)">
                                                <path fill="currentColor"
                                                    d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                                                    transform="translate(-160 -256)"></path>
                                            </g>
                                        </g>
                                    </svg>
                                    <!-- <span class="fas fa-chevron-right ms-2" data-fa-transform="shrink-3"> </span> Font Awesome fontawesome.com --></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('scripts')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    $(function() {
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                'input[type=text]', 'input[type=file]',
                'textarea'
            ].join(', '),
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;
        $errorMessage.addClass('hide');
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
            }
        });
        if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
        }
    });
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
});
</script>
@endsection
