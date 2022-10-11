<script>
    $('#numero_recu_update').keyup(function () {
      $('#recu_number_update').text($(this).val());
    });

</script>

<script>

    var taxe_option = document.getElementById('taxe_value_recu').value;
    //var Articles = document.getElementById('articles').value;
    var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });

    function addRowRecuUpdate(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var colCount = table.rows[0].cells.length;



        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;

        row.id = 'row_recu_up_'+rowCount;

        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;
        }

        var listitems= row.getElementsByTagName("input")
        for (i=0; i<listitems.length; i++) {
            listitems[i].setAttribute("oninput", "calculateRecuUpdate('"+row.id+"')");
            var nam = listitems[i].getAttribute("name");
            listitems[i].setAttribute("id", nam+"_recu_up_"+rowCount);
        }

        var tab = $('#table-recu-update2').find('.trash_recu_update')

        for (i=0; i<tab.length; i++) {
            tab[i].setAttribute("data-recu_id_up", i);
        }

        var listSelect= row.getElementsByTagName("select")
        for (i=0; i<listSelect.length; i++) {
            listSelect[i].setAttribute("oninput", "calculateRecuUpdate('"+row.id+"')");
            var nam = listSelect[i].getAttribute("name");
            listSelect[i].setAttribute("id", nam+"_recu_up_"+rowCount);
        }
    }

    function calculateRecuUpdate(elementID) {
        var mainRow = document.getElementById(elementID);
        var rowID = elementID.split('row_recu_up_')[1];

        var article = $('#table-recu-update2').find("select[id='article_id[]_recu_up_"+rowID+"']")[0].value;
        var qte = $('#table-recu-update2').find("input[id='qte[]_recu_up_"+rowID+"']")[0].value;
        var montant = $('#table-recu-update2').find("input[id='montant[]_recu_up_"+rowID+"']")[0];
        var taxe_id = $('#table-recu-update2').find("select[id='taxe_id[]_recu_up_"+rowID+"']")[0].value;


        var total_ht = mainRow.querySelectorAll('[name=htRecuUpdate]')[0];
        var total_taxe = mainRow.querySelectorAll('[name=taxeRecuUpdate]')[0];
        var total_ttc = mainRow.querySelectorAll('[name=ttcRecuUpdate]')[0];

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

        var MHT = parseFloat(document.getElementById('tot_ht_recu_update').value.replace(/\s/g, ''));
        var MT = parseFloat(document.getElementById('tot_taxe_recu_update').value.replace(/\s/g, ''));
        var MTTC = parseFloat(document.getElementById('tsanstaxe_recu_update').value.replace(/\s/g, ''));

        $(".total_ht_recu_update").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe_recu_update").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc_recu_update").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MTTC += parseFloat(this.value);
            }
        });

        $("#total_sans_taxe_credit").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#taxe_credit").html(MT.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#total_credit").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#amount_commercial_recu_pay_update").html(formatNumber.format(MTTC));


    }

    $(document).on("click", ".trash_recu_update", function (e) {
        var table = document.getElementById('table-recu-update2');
        var rowCount = table.rows.length;
        const _this = $(this);
        const classroom_id = _this.attr('data-recu_id_up');

        var ttc = $('#table-recu-update2').find("input[id='ttcRecuUpdate_recu_up_"+classroom_id+"']");
        var taxe_value = $('#table-recu-update2').find("input[id='taxeRecuUpdate_recu_up_"+classroom_id+"']");
        var HT_value = $('#table-recu-update2').find("input[id='htRecuUpdate_recu_up_"+classroom_id+"']");


        if(rowCount > 1){
            var TTC = parseFloat($('#total_credit').html()) - parseFloat(ttc[0].value);
            var MHT = parseFloat($('#total_sans_taxe_credit').html()) - parseFloat(HT_value[0].value);
            var Taxe = parseFloat($('#taxe_credit').html()) - parseFloat(taxe_value[0].value);

            if(taxe_value[0].value == '' || isNaN(taxe_value[0].value)){
                Taxe = parseFloat($('#taxe_credit').html());
            }

            if(!isNaN(TTC) && !isNaN(MHT) && !isNaN(Taxe)){
                $("#total_sans_taxe_credit").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#taxe_credit").html(Taxe.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#total_credit").html(TTC.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#amount_commercial_recu_pay_update").html(formatNumber.format(MTTC));
            }


            _this.parent().parent().remove();
        }
    });

</script>

<!-- Modification et envoie de donnée au controlleur -->

<script>
    $(document).ready(function() {

        $(document).on('click', '.btn-recu-submit', function (e) {
            //e.preventDefault();
            var client = document.getElementById('fournisseur-recu').value;
            var numero_recu = document.getElementById('numero_recu_update').value;
            var reference = document.getElementById('reference_update').value;
            var date_facturation = document.getElementById('date_recu_update').value;
            var paiements_mode_id = document.getElementById('paiements_mode_recu').value;
            var paiements_source_id = document.getElementById('paiement_source_recu').value;
            var adresse_facturation = document.getElementById('adresse_facturation_recu').value;
            var cc_cci = document.getElementById('cc_cci_recu').value;
            var message = document.getElementById('message_recu_update').value;
            var message_affiche = document.getElementById('message_affiche_recu_update').value;
            var id_recu = document.getElementById('id-recu').value;
            var type = "recu";


            var articles = $("select[name='article_id[]']")
                .map(function() {
                    return $(this).val();
            }).toArray();

            var taxe = $("select[name='taxe_id[]']")
                .map(function() {
                    return $(this).val();
            }).toArray();

            var description = $("input[name='description[]']")
                .map(function() {
                    return $(this).val();
            }).toArray();

            var qte = $("input[name='qte[]']")
                .map(function() {
                    return $(this).val();
            }).toArray();

            var montant = $("input[name='montant[]']")
                .map(function() {
                    return $(this).val();
            }).toArray();

            var filtered_article = articles.filter(function(value, index, arr){
                return index > 1;
            });

            var filtered_taxe = taxe.filter(function(value, index, arr){
                return index > 1;
            });

            var filtered_description = description.filter(function(value, index, arr){
                return index > 1;
            });

            var filtered_qte = qte.filter(function(value, index, arr){
                return index > 1;
            });

            var filtered_montant = montant.filter(function(value, index, arr){
                return index > 1;
            });

            filtered_article.splice(-2,2)
            filtered_qte.splice(-2,2)
            filtered_taxe.splice(-2,2)
            filtered_montant.splice(-2,2)
            filtered_description.splice(-2,2)

            filtered_description.map(function(value, index) {
                if(value == ''){
                    filtered_description[index] = '-';
                }
            });

            filtered_taxe.map(function(value, index) {
                if(value == ''){
                    filtered_taxe[index] = -1;
                }
            });

            filtered_montant.map(function(value, index) {
                if(value == ''){
                    filtered_montant[index] = '0';
                }
            });

            filtered_qte.map(function(value, index) {
                if(value == ''){
                    filtered_qte[index] = '0';
                }
            });

            console.log(taxe);
            console.log(filtered_taxe);
            if(filtered_article[0] == ''){
                filtered_article = null;
            }

            $.ajax({
                url:"{{route('entreprise.factures.update.facture')}}",
                type:"POST",
                data:{
                    _token: '{{csrf_token()}}',
                    id: id_recu,
                    fournisseur: client,
                    type: type,
                    date_facturation: date_facturation,
                    numero_recu: numero_recu,
                    reference: reference,
                    adresse_facturation: adresse_facturation,
                    paiements_mode_id: paiements_mode_id,
                    paiements_source_id: paiements_source_id,
                    cc_cci: cc_cci,
                    message: message,
                    message_affiche: message_affiche,
                    article_id: filtered_article,
                    montant: filtered_montant,
                    qte: filtered_qte,
                    taxe_id: filtered_taxe,
                    description: filtered_description


                },
                success:function(response){
                    alert('Mise à jour avec  succès')
                    //console.log(response)
                },
                error: function(error) {
                    alert(error.responseJSON.message)
                    console.log(error.responseJSON);
                }
            });

        });
    });
</script>

