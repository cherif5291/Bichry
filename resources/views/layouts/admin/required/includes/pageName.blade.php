<div class="card mb-3 ">
    <div class="bg-holder d-none d-lg-block bg-card"
        style="background-image:url({{asset('assets/admin/img/icons/spot-illustrations/corner-4.png')}});">
    </div>
    <!--/.bg-holder-->

    <div class="card-body position-relative">
        <div class="row">
            <div class="col-lg-8" style="height: 1.6em">

                <h4>
                    {{$PageName ?? "no page name (Déclarer la variable PageName sur le controlleur de cette view avec le
                    nom de la page.)"}}
                </h4>
                @include('layouts.admin.required.includes.messages')
                <br>
                {{-- @include('layouts.admin.required.includes.messages') --}}
            </div>
        </div>
    </div>

</div>
