@include('entreprise.commerciale.factures.recu.ajaxAdd')
@include('entreprise.commerciale.factures.recu.ajaxUpdate')

<script>
    $(document).ready(function() {

        $(document).on('click', '.btn-paid-recu', function () {
            const _this = $(this);
            const recu_id = _this.attr('recu-id');
            //alert(recu_id)
            findRecuPaiement(recu_id);

        });



        function findRecuPaiement(id){
            const Clients = JSON.parse(document.getElementById('Clients-recu').value);
            const Mode_paiement = JSON.parse(document.getElementById('Mode-paiement-recu').value);
            const Source_paiement = JSON.parse(document.getElementById('Sources-paiement-recu').value);
            const Compte_comptables = JSON.parse(document.getElementById('ComptesComptables-recu').value);
            const Taxes = JSON.parse(document.getElementById('Taxes-recu').value);
            const Articles = JSON.parse(document.getElementById('Articles').value);

            var recu_id = id
            var clientSelectHTML = '<option value="" hidden>Choisir un client</option>';
            var paymentmodeSelectHTML = '<option value="" hidden>Choisir mode de paiement</option>';
            var sourcepaymentSelectHTML = '<option value="" hidden>Choisir mode de paiement</option>';
            var depenseTableHTML = "";

            var route = '{{ route("entreprise.factures.get.facture", ":id") }}';
            url = route.replace(':id', id);

            $.ajax({
                url: url,
                type:"GET",
                data:{
                    _token: '{{csrf_token()}}',
                    id:recu_id,
                },
                success:function(response){

                    var table = response.depenses_paniers;
                    console.log(response)
                    Clients.map(function(value, index){
                        clientSelectHTML += "<option value='C"+value.id+"'"+(value.id == response.clients_entreprise_id ? 'selected' : '')+" >"+value.entreprise+"</option>";
                    });


                    Mode_paiement.map(function(value, index){
                        paymentmodeSelectHTML += "<option value='"+value.id+"'"+(value.id == response.paiements_mode_id ? 'selected' : '')+">"+value.nom+"</option>";
                    });

                    Source_paiement.map(function(value, index){
                        sourcepaymentSelectHTML += "<option value='"+value.id+"'"+(value.id == response.paiement_source_id ? 'selected' : '')+">("+value.type+") "+value.nom+"</option>";
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

                    $("#fournisseur-recu-paiement").html(clientSelectHTML);
                    $("#paiements_mode_recu_paiement").html(paymentmodeSelectHTML);
                    $("#paiement_source_recu_paiement").html(sourcepaymentSelectHTML);
                    $("#table-recu-update-paiement").html(depenseTableHTML);

                    var montant_payer = 0;
                    var montant_du = 0;

                    response.reglements.map(function (value, index) {
                        montant_payer += value.montant_recu;
                    });

                    montant_du = response.total - montant_payer;
                    $('#montant_recu_paiement').html(": " + response.total + " {{getCurrency()->sigle}}");
                    $('#montant_recu_a_payer_paiement').html(": " + montant_payer + " {{getCurrency()->sigle}}");
                    $('#montant_du_recu_paiement').html(": " + montant_du + " {{getCurrency()->sigle}}");

                    $('#recu_number_update_paiement').html(response.numero_recu);
                    $('#numero_recu_update_paiement').val(response.numero_recu);
                    $('#reference_update_paiement').val(response.reference);
                    $('#date_recu_update_paiement').val(response.date_recu);
                    $('#adresse_facturation_recu_paiement').val(response.adresse_facturation);
                    $('#cc_cci_recu_paiement').val(response.cc_cci);

                    $('#message_recu_update_paiement').val(response.message);
                    $('#message_affiche_recu_update_paiement').val(response.message_affiche);
                    $('#id-recu-paiement').val(response.id);

                    $("#taux_taxe_credit_paiement").html("Taxe ("+taux_taxe+"%)");
                    $("#total_sans_taxe_credit_paiement").html(response.total_sans_taxe + " {{getCurrency()->sigle}}");
                    $("#taxe_credit_paiement").html(response.taxe + " {{getCurrency()->sigle}}");
                    $("#total_credit_paiement").html(response.total + " {{getCurrency()->sigle}}");


                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

         $(document).on('click', '.deleteRecu', function (event) {
            event.preventDefault()
            const _this = $(this);
            const panier_id = _this.attr('btn-delete-id');
            const recu_id = _this.attr('recu-id');

            deleteRecuPanier(panier_id, recu_id);

        });

        function deleteRecuPanier(id, recu_id){
            var route = '{{ route("admin.factures.panier.delete", ":id") }}';
            url = route.replace(':id', id);
            $.ajax({
                url:url,
                type:"GET",
                data:{
                    _token: '{{csrf_token()}}',
                    id:id,
                },
                success:function(response){
                    $('.alert-succes').removeClass('d-none')
                    findRecuPaiement(recu_id);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }


    });
</script>
