<script>

    var taxe_option = document.getElementById('taxe_value').value;
    var Articles = document.getElementById('articles').value;
    var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });

    function addRow(tableID) {

        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var colCount = table.rows[0].cells.length;



        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;

        row.id = 'row_'+rowCount;

        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;
        }

        var listitems= row.getElementsByTagName("input")
        for (i=0; i<listitems.length; i++) {
            listitems[i].setAttribute("oninput", "calculate('"+row.id+"')");
            var nam = listitems[i].getAttribute("name");
            listitems[i].setAttribute("id", nam+"_"+rowCount);
        }

        var tab = $('#dataTable').find('.trash')

        for (i=0; i<tab.length; i++) {
            tab[i].setAttribute("data-id", i);
        }

        var listSelect= row.getElementsByTagName("select")
        for (i=0; i<listSelect.length; i++) {
            listSelect[i].setAttribute("oninput", "calculate('"+row.id+"')");
            var nam = listSelect[i].getAttribute("name");
            listSelect[i].setAttribute("id", nam+"_"+rowCount);
        }
    }

    function calculate(elementID) {
        var mainRow = document.getElementById(elementID);
        var rowID = elementID.split('row_')[1];

        var article = $('#dataTable').find("select[id='article_id[]_"+rowID+"']")[0].value;
        var qte = $('#dataTable').find("input[id='qte[]_"+rowID+"']")[0].value;
        var montant = $('#dataTable').find("input[id='montant[]_"+rowID+"']")[0];
        var taxe_id = $('#dataTable').find("select[id='taxe_id[]_"+rowID+"']")[0].value;


        var total_ht = mainRow.querySelectorAll('[name=total_ht]')[0];
        var total_taxe = mainRow.querySelectorAll('[name=total_taxe]')[0];
        var total_ttc = mainRow.querySelectorAll('[name=ttc]')[0];

        var myResult1 = 0;

        var montant_tab = JSON.parse(Articles);
        montant_tab.map(function(value, index){
            if(value.id == article){
                montant.value = value.prix_unitaire;
                myResult1 = qte * value.prix_unitaire;
            }
        });

        var taxe_tab = JSON.parse(taxe_option);
        taxe_tab.map(function(value, index){
            if(value.id == taxe_id){
                total_taxe.value = (myResult1 * value.taux)/100;
                result_taxe = total_taxe.value;
            }
        });

        //var myResult1 = qte * montant;
        var result_taxe = 0;
        total_ht.value = myResult1;
        total_ttc.value = Number(result_taxe) + Number(myResult1);

        var MHT = 0;
        var MT = 0;
        var MTTC = 0;

        $(".total_ht").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MTTC += parseFloat(this.value);
            }
        });

        $(".total_sans_taxe").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
        $(".taxe_value").html(MT.toFixed(2) + " {{getCurrency()->sigle}}");
        $(".total_ttc").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#amount_commercial_devis_pay").html(formatNumber.format(MTTC));


    }

    $(document).on("click", ".trash", function (e) {
        var table = document.getElementById('dataTable');
        var rowCount = table.rows.length;
        const _this = $(this);
        const classroom_id = _this.attr('data-id');
        var ttc = $('#dataTable').find("input[id='ttc_"+classroom_id+"']");
        var taxe_value = $('#dataTable').find("input[id='total_taxe_"+classroom_id+"']");
        var HT_value = $('#dataTable').find("input[id='total_ht_"+classroom_id+"']");


        if(rowCount > 1){
            var TTC = parseFloat($('.total_ttc').html()) - parseFloat(ttc[0].value);
            var MHT = parseFloat($('.total_sans_taxe').html()) - parseFloat(HT_value[0].value);
            var Taxe = parseFloat($('.taxe_value').html()) - parseFloat(taxe_value[0].value);

            if(taxe_value[0].value == '' || isNaN(taxe_value[0].value)){
                Taxe = parseFloat($('.taxe_value').html());
            }

            if(!isNaN(TTC) && !isNaN(MHT) && !isNaN(Taxe)){
                $(".total_sans_taxe").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
                $(".taxe_value").html(Taxe.toFixed(2) + " {{getCurrency()->sigle}}");
                $(".total_ttc").html(TTC.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#amount_commercial_devis_pay").html(formatNumber.format(TTC));
            }
            _this.parent().parent().remove();
        }
    });

</script>
<!-- Recupération automatique du numéro de chèque -->

<script>
    $('#numero_devis').keyup(function () {
      $('#get_devis_number_commercial').text($(this).val());
    });

    // Recupération automatique du date d'échéance

    $('#date_facturation_devis').change(function(e){
        e.preventDefault();
        Date.prototype.addDays = function (days) {
            const date = new Date(this.valueOf());
            date.setDate(date.getDate() + days);
            return date;
        };
        var date = document.getElementById('date_facturation_devis').value;
        var echeance = new Date(date);
        var net = document.getElementById('paiements_modalite_id_devis').value;
        const Modalites = JSON.parse(document.getElementById('Modalites').value);
        var date_echeance = '';

        var date_echeance = '';

        Modalites.map(function(value, index){
            if(value.id == net){
                date_echeance = echeance.addDays(value.duree).toISOString().slice(0, 10);
            }
        });

        $('#echeance_devis').val(date_echeance);
    });

    $('#paiements_modalite_id_devis').change(function(e){
        e.preventDefault();
        Date.prototype.addDays = function (days) {
            const date = new Date(this.valueOf());
            date.setDate(date.getDate() + days);
            return date;
        };
        var date = document.getElementById('date_facturation_devis').value;
        var echeance = new Date(date);
        var net = document.getElementById('paiements_modalite_id_devis').value;
        const Modalites = JSON.parse(document.getElementById('Modalites').value);
        var date_echeance = '';

        Modalites.map(function(value, index){
            if(value.id == net){
                date_echeance = echeance.addDays(value.duree).toISOString().slice(0, 10);
            }
        });

        $('#echeance_devis').val(date_echeance);
    });

    // Fin recupération echéance

</script>






