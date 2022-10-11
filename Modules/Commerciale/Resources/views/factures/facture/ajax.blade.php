@include('entreprise.commerciale.factures.facture.ajaxAdd')
@include('entreprise.commerciale.factures.facture.ajaxUpdate')

<script>
    $(document).ready(function() {


        // Bouton pour recupérer l'id dépense sur le tableau de la page index

        $(document).on('click', '.btn-paid-facture', function () {
            const _this = $(this);
            const facture_id = _this.attr('facture-id');
            findFactureCommercial(facture_id);

        });



        function findFactureCommercial(id){
            const Clients = JSON.parse(document.getElementById('Clients').value);
            const Articles = JSON.parse(document.getElementById('Articles').value);
            const Modalites = JSON.parse(document.getElementById('Modalites').value);

            var facture_id = id
            var clientSelectHTML = '<option  hidden>Choisir un client</option>';
            var modaliteSelectHTML = '<option  hidden>Choisir une modalite</option>';
            var depenseTableHTML = "";

            var route = '{{ route("entreprise.factures.get.facture", ":id") }}';
            url = route.replace(':id', facture_id);

            $.ajax({
                url:url,
                type:"GET",
                data:{
                    _token: '{{csrf_token()}}',
                    id:facture_id,
                },
                success:function(response){

                    console.log(response)
                    var table = response.depenses_paniers;

                    Clients.map(function(value, index){
                        if(response.clients_entreprise_id > 0 && value.id == response.clients_entreprise_id ){
                            var is_fournisseur = 'selected';
                        }
                        clientSelectHTML += "<option value='C"+value.id+"'"+is_fournisseur+" >"+value.entreprise+"</option>";
                    });

                    Modalites.map(function(value, index){
                        modaliteSelectHTML += "<option value='"+value.id+"'"+(value.id == response.paiements_modalite_id ? 'selected' : '')+" >"+value.nom+"</option>";
                    });

                    var taux_taxe = 0;
                    table.map(function(value, index){
                        taux_taxe += value.taux_taxe;

                            Articles.map(function(art, index){
                                if(art.id == value.article_id){
                                    depenseTableHTML += "<tr><td class='align-middle'>"+art.nom+"</td>";
                                }
                            });

                        depenseTableHTML += "<td class='align-middle text-start'>"+value.description+"</td>"+
                                            "<td>"+value.qte+"</td>"+
                                            "<td>"+value.montant+"</td>"+
                                            "<td>"+value.taux_taxe+"%</td>";

                    });

                    $('#id-facture-paiement').val(facture_id);
                    $("#clients_paiement").html(clientSelectHTML);
                    $("#modaliteSelect_paiement").html(modaliteSelectHTML);
                    $(".table-categorie-facture-com").html(depenseTableHTML);

                    var montant_payer = 0;
                    var montant_du = 0;

                    response.reglements.map(function (value, index) {
                        montant_payer += value.montant_recu;
                    });

                    montant_du = response.total - montant_payer;

                    $('#montant_facture_paiement').html(": " + response.total + " {{getCurrency()->sigle}}");
                    $('#montant_facture_a_payer_paiement').html(": " + montant_payer + " {{getCurrency()->sigle}}");
                    $('#montant_du_facture_paiement').html(": " + montant_du + " {{getCurrency()->sigle}}");

                    $('#facture_number_paiement_update').html(response.numero_facture);
                    $('#date_facturation_paiement').val(response.date_facturation);
                    $('#echeance_paiement').val(response.echeance);
                    $('#adresse_facturation_paiement').val(response.adresse_facturation);
                    $('#numero_facture_paiement').val(response.numero_facture);
                    $('#cc_cci_paiement').val(response.cc_cci);
                    $('#message_update').val(response.message);
                    $('#message_affiche_update').val(response.message_affiche);

                    $("#taux_taxe_paiement_facture").html("Taxe ("+taux_taxe+"%)");
                    $("#total_sans_taxe_paiement_facture").html(response.total_sans_taxe + " {{getCurrency()->sigle}}");
                    $("#taxe_paiement_facture").html(response.taxe + " {{getCurrency()->sigle}}");
                    $("#total_paiement_facture").html(response.total + " {{getCurrency()->sigle}}");


                },
                error: function(error) {
                    console.log(error.responseJSON.message);
                }
            });
        }

        // Suppression Compte comptable

        $(document).on('click', '.delete-cheque', function (event) {
            event.preventDefault()
            const _this = $(this);
            const panier_id = _this.attr('btn-delete-id');
            const facture_id = _this.attr('cheque-id');

            deletePanierFactureCommercial(panier_id, facture_id);

        });

        function deletePanierFactureCommercial(id, facture_id){
            var route = '{{ route("admin.factures.panier.delete", ":id") }}';
            url = route.replace(':id', id);
            $.ajax({
                url: url,
                type:"GET",
                data:{
                    _token: '{{csrf_token()}}',
                    id:id,
                },
                success:function(response){
                    $('.alert-succes').removeClass('d-none')
                    findFactureCommercial(facture_id);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

    });
</script>
