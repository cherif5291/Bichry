@include('entreprise.commerciale.devis.devis.ajaxAdd')
@include('entreprise.commerciale.devis.devis.ajaxUpdate')

<script>
    $(document).ready(function() {


        // Bouton pour recupérer l'id dépense sur le tableau de la page index

        $(document).on('click', '.btn-paid-devis', function () {
            const _this = $(this);
            const devis_id = _this.attr('devis-id');
            finddevisCommercial(devis_id);

        });



        function finddevisCommercial(id){
            const Clients = JSON.parse(document.getElementById('Clients').value);
            const Articles = JSON.parse(document.getElementById('Articles').value);
            const Modalites = JSON.parse(document.getElementById('Modalites').value);

            var devis_id = id
            var clientSelectHTML = '<option  hidden>Choisir un client</option>';
            var modaliteSelectHTML = '<option  hidden>Choisir une modalite</option>';
            var depenseTableHTML = "";

            var route = '{{ route("entreprise.devis.get.devis", ":id") }}';
            url = route.replace(':id', devis_id);

            $.ajax({
                url:url,
                type:"GET",
                data:{
                    _token: '{{csrf_token()}}',
                    id:devis_id,
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

                    $('#id-devis-paiement').val(devis_id);
                    $("#clients_paiement").html(clientSelectHTML);
                    $("#modaliteSelect_paiement").html(modaliteSelectHTML);
                    $(".table-categorie-devis-com").html(depenseTableHTML);

                    var montant_payer = 0;
                    var montant_du = 0;

                    response.reglements.map(function (value, index) {
                        montant_payer += value.montant_recu;
                    });

                    montant_du = response.total - montant_payer;

                    $('#montant_devis_paiement').html(": " + response.total + " {{getCurrency()->sigle}}");
                    $('#montant_devis_a_payer_paiement').html(": " + montant_payer + " {{getCurrency()->sigle}}");
                    $('#montant_du_devis_paiement').html(": " + montant_du + " {{getCurrency()->sigle}}");

                    $('#devis_number_paiement_update').html(response.numero_devis);
                    $('#date_facturation_paiement').val(response.date_facturation);
                    $('#echeance_paiement').val(response.echeance);
                    $('#adresse_facturation_paiement').val(response.adresse_facturation);
                    $('#numero_devis_paiement').val(response.numero_devis);
                    $('#cc_cci_paiement').val(response.cc_cci);
                    $('#message_update').val(response.message);
                    $('#message_affiche_update').val(response.message_affiche);

                    $("#taux_taxe_paiement_devis").html("Taxe ("+taux_taxe+"%)");
                    $("#total_sans_taxe_paiement_devis").html(response.total_sans_taxe + " {{getCurrency()->sigle}}");
                    $("#taxe_paiement_devis").html(response.taxe + " {{getCurrency()->sigle}}");
                    $("#total_paiement_devis").html(response.total + " {{getCurrency()->sigle}}");


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
            const devis_id = _this.attr('cheque-id');

            deletePanierdevisCommercial(panier_id, devis_id);

        });

        function deletePanierdevisCommercial(id, devis_id){
            var route = '{{ route("admin.devis.panier.delete", ":id") }}';
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
                    finddevisCommercial(devis_id);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

    });
</script>
