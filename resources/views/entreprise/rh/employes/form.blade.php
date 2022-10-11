<div class="cd-popup-container ">
    <div class="card-body container">
        <form action="{{route('entreprise.employe.store')}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf

            <div class="d-flex mb-4 mr-3 justify-content-between">
                <h4>Formulaire d'ajout de nouveau employé <span id="get_depense_number" style="color: red!important"></span></h4>
                <div>
                    <button type="submit"  class="btn btn-success ">Enregistrer </button>

                </div>

            </div>


            <div class="col-md-6 row" >
                <div class="col-md-6">
                    <label class="form-label" for="prenom">Prénom</label>
                    <input class="form-control" name="prenom" id="prenom" type="text"required="" />
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="nom">Nom</label>
                    <input class="form-control" name="nom" id="nom" type="text"  required="" />
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" id="email" name="email" type="text"  required="" />
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="telephone">Téléphone</label>
                    <input class="form-control" name="telephone" id="telephone" type="text" required="" />
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="genre">Genre</label>
                    <select class="form-select" name="genre" id="genre" required="">
                        <option disabled="" value="">Chosir</option>
                        <option value="Sénégal">Homme</option>
                        <option value="Canada">Femme</option>

                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="date_naissance">Date de naissance</label>
                    <input class="form-control" name="date_naissance" id="date_naissance" type="text" required="" />
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="adresse">Adresse</label>
                    <input class="form-control" name="adresse" id="adresse" type="text" />
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="ville">Ville</label>
                    <input class="form-control" id="ville" name="ville" type="text" />
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="province">Province</label>
                    <input class="form-control" name="province" id="province" type="text"/>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="code_postale">Code Postal</label>
                    <input class="form-control" name="code_postale" id="code_postale" type="text" />
                </div>


                <div class="col-md-6">
                    <label class="form-label" for="pays">Pays</label>
                    <select class="form-select" name="pays" id="pays" required="">
                        <option selected="" disabled="" value="">Chosir</option>
                        <option value="Sénégal">Sénégal</option>
                        <option value="Canada">Canada</option>

                    </select>
                    <div class="invalid-feedback">Vous devez choisir un pays</div>
                </div>
            </div>
            <div class="col-md-6 row">

                <div class="col-md-6">
                    <label class="form-label" for="poste">Poste occupée</label>
                    <input class="form-control" name="poste" id="poste" type="text" required="" />
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="date_embauche">Date d'embauche</label>
                    <input class="form-control" name="date_embauche" id="date_embauche" type="date" required="" />
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="remuneration">Rémunération</label>
                    <input class="form-control" name="remuneration" id="remuneration" type="number"  required="" />
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="interval_paiement">Cette employé est payé par</label>
                    <select class="form-select" name="interval_paiement" id="interval_paiement" required="">
                        <option  value="1">Jour</option>
                        <option  value="7">Semaine</option>
                        <option selected="" value="30">Mois</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="paiements_mode_id">Mode de paiement souhaité</label>
                    <select class="form-select" name="paiements_mode_id" id="paiements_mode_id" required="">
                        <option disabled="" value="">Choisir</option>

                    @foreach ($ModesPaiements as $pmode)
                        <option   value="{{$pmode->id}}">{{$pmode->nom}}</option>
                    @endforeach
                    </select>
                    <div class="invalid-feedback">Vous devez choisir un mode de paiement</div>
                </div>


                <div class="col-md-6">
                    <label class="form-label" for="devises_monetaire_id">Devise monétaire</label>
                    <select class="form-select" name="devises_monetaire_id" id="devises_monetaire_id" required="">
                        <option selected="" disabled="" value="">Choisir</option>
                        @foreach ($DevisesMonetaires as $devise)
                        <option  value="{{$devise->id}}">{{$devise->nom}} {{$devise->sigle}}</option>
                    @endforeach

                    </select>
                    <div class="invalid-feedback">Vous devez choisir une devise pour ce client</div>
                </div>
            </div>




        </form>
    </div>
    <a href="#0" class="cd-popup-close mt-3"></a>
</div> <!-- cd-popup-container -->

