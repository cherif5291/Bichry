
<!-- Recupération automatique du numéro de chèque -->

<script>
    $('#numero_recu').keyup(function () {
      $('#get_recu_number').text($(this).val());
    });
</script>

<script>

    var taxe_option = document.getElementById('taxe_value_recu').value;
    //var Articles = document.getElementById('articles').value;
    var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });

    function addRowRecu(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var colCount = table.rows[0].cells.length;



        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;

        row.id = 'row_recu_'+rowCount;

        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;
        }

        var listitems= row.getElementsByTagName("input")
        for (i=0; i<listitems.length; i++) {
            listitems[i].setAttribute("oninput", "calculateRecu('"+row.id+"')");
            var nam = listitems[i].getAttribute("name");
            listitems[i].setAttribute("id", nam+"_recu_"+rowCount);
        }

        var tab = $('#table-recu').find('.trash_recu')

        for (i=0; i<tab.length; i++) {
            tab[i].setAttribute("data-recu_id", i);
        }

        var listSelect= row.getElementsByTagName("select")
        for (i=0; i<listSelect.length; i++) {
            listSelect[i].setAttribute("oninput", "calculateRecu('"+row.id+"')");
            var nam = listSelect[i].getAttribute("name");
            listSelect[i].setAttribute("id", nam+"_recu_"+rowCount);
        }
    }

    function calculateRecu(elementID) {
        var mainRow = document.getElementById(elementID);
        var rowID = elementID.split('row_recu_')[1];

        var article = $('#table-recu').find("select[id='article_id[]_recu_"+rowID+"']")[0].value;
        var qte = $('#table-recu').find("input[id='qte[]_recu_"+rowID+"']")[0].value;
        var montant = $('#table-recu').find("input[id='montant[]_recu_"+rowID+"']")[0];
        var taxe_id = $('#table-recu').find("select[id='taxe_id[]_recu_"+rowID+"']")[0].value;


        var total_ht = mainRow.querySelectorAll('[name=htRecu]')[0];
        var total_taxe = mainRow.querySelectorAll('[name=taxeRecu]')[0];
        var total_ttc = mainRow.querySelectorAll('[name=ttcRecu]')[0];

        //var myResult1 = qte * montant;
        var myResult1 = 0;

        var montant_tab = JSON.parse(Articles);
        montant_tab.map(function(value, index){
            if(value.id == article){
                montant.value = value.prix_unitaire;
                myResult1 = qte * value.prix_unitaire;
            }
        });


        var taxe_tab = JSON.parse(taxe_option);
        var result_taxe = 0;
        taxe_tab.map(function(value, index){
            if(value.id == taxe_id){
                total_taxe.value = (myResult1 * value.taux)/100;
                result_taxe = total_taxe.value;
            }
        });

        //var myResult1 = qte * montant;
        total_ht.value = myResult1;
        total_ttc.value = Number(result_taxe) + Number(myResult1);

        var MHT = 0;
        var MT = 0;
        var MTTC = 0;

        $(".total_ht_recu").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe_recu").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc_recu").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MTTC += parseFloat(this.value);
            }
        });

        $(".total_sans_taxe_recu").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
        $(".taxe_value_recu").html(MT.toFixed(2) + " {{getCurrency()->sigle}}");
        $(".total_ttc_recu").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#amount_commercial_recu_pay").html(formatNumber.format(MTTC));


    }

    $(document).on("click", ".trash_recu", function (e) {
        var table = document.getElementById('table-recu');
        var rowCount = table.rows.length;
        const _this = $(this);
        const classroom_id = _this.attr('data-recu_id');

        var ttc = $('#table-recu').find("input[id='ttcRecu_recu_"+classroom_id+"']");
        var taxe_value = $('#table-recu').find("input[id='taxeRecu_recu_"+classroom_id+"']");
        var HT_value = $('#table-recu').find("input[id='htRecu_recu_"+classroom_id+"']");

        if(rowCount > 1){
            var TTC = parseFloat($('.total_ttc_recu').html()) - parseFloat(ttc[0].value);
            var MHT = parseFloat($('.total_sans_taxe_recu').html()) - parseFloat(HT_value[0].value);
            var Taxe = parseFloat($('.taxe_value_recu').html()) - parseFloat(taxe_value[0].value);

            if(taxe_value[0].value == '' || isNaN(taxe_value[0].value)){
                Taxe = parseFloat($('.taxe_value_recu').html());
            }

            if(!isNaN(TTC) && !isNaN(MHT) && !isNaN(Taxe)){
                $(".total_sans_taxe_recu").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
                $(".taxe_value_recu").html(Taxe.toFixed(2) + " {{getCurrency()->sigle}}");
                $(".total_ttc_recu").html(TTC.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#amount_commercial_recu_pay").html(formatNumber.format(MTTC));
            }
            _this.parent().parent().remove();
        }
    });

</script>

<script>
    $(document).ready(function() {

        $(document).on('click', '.btn-edit-recu', function () {
            const _this = $(this);
            const recu_id = _this.attr('recu-id');
            //alert(recu_id)
            findRecu(recu_id);

        });



        function findRecu(id){
            var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });
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
                        var mHT = value.qte * value.montant;
                        var mTaxe = (mHT * value.taux_taxe)/100;
                        var mTTC = mHT + mTaxe;

                        Articles.map(function(art, index){
                                if(art.id == value.article_id){
                                    depenseTableHTML += "<tr><td class='align-middle'>"+art.nom+"</td>";
                                }
                            });

                        depenseTableHTML += "<td class='align-middle text-start'>"+value.description+"</td>"+
                                            "<td>"+value.qte+"</td>"+
                                            "<td>"+formatNumber.format(value.montant)+"</td>"+
                                            //"<td>"+formatNumber.format(mHT)+"</td>"+
                                            "<td>"+value.taux_taxe+"%</td>"+
                                            //"<td>"+formatNumber.format(mTaxe)+"</td>"+
                                            "<td>"+formatNumber.format(mTTC)+"</td>"+
                                            "<td><a href='' class='deleteRecu' recu-id='"+recu_id+"' btn-delete-id='"+value.id+"'><i class='fa fa-trash text-danger'></i></a></td></tr>";

                    });

                    let route_delete = "{{route('admin.factures.recu.delete', 'recu-id')}}";
                    $('#id_route_recu').attr('href', route_delete.replace('recu-id', recu_id));

                    if (response.pieces_jointes.length > 0) {
                        let piece = "{{ asset('data') }}";
                        $('#pj_facture_recu').attr('src', piece.replace('data', response.pieces_jointes[0].fichier));
                    }


                    $("#fournisseur-recu").html(clientSelectHTML);
                    $("#paiements_mode_recu").html(paymentmodeSelectHTML);
                    $("#paiement_source_recu").html(sourcepaymentSelectHTML);
                    $("#table-recu-update").html(depenseTableHTML);

                    $('#recu_number_update').html(response.numero_recu);
                    $('#numero_recu_update').val(response.numero_recu);
                    $('#reference_update').val(response.reference);
                    $('#date_recu_update').val(response.date_recu);
                    $('#adresse_facturation_recu').val(response.adresse_facturation);
                    $('#cc_cci_recu').val(response.cc_cci);

                    $('#message_recu_update').val(response.message);
                    $('#message_affiche_recu_update').val(response.message_affiche);
                    $('#id-recu').val(response.id);

                    //$("#taux_taxe_credit").html("Taxe ("+taux_taxe+"%)");
                    $(".taux_taxe_credit").val(taux_taxe);
                    $("#total_sans_taxe_credit").html(response.total_sans_taxe + " {{getCurrency()->sigle}}");
                    $(".total_sans_taxe_credit").val(response.total_sans_taxe);
                    $("#taxe_credit").html(response.taxe + " {{getCurrency()->sigle}}");
                    $(".taxe_credit").val(response.taxe);
                    $("#total_credit").html(response.total + " {{getCurrency()->sigle}}");
                    $(".total_credit").val(response.total);
                    $("#amount_commercial_recu_pay_update").html(formatNumber.format(response.total));


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
                    findRecu(recu_id);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }


    });
</script>
