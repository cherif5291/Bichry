
<!-- Recupération automatique du numéro de chèque -->

<script>
    $('#reference_depense').keyup(function () {
      $('#get_depense_number').text($(this).val());
    });
</script>

<script>

    var taxe_option = document.getElementById('taxe_value_cheque_input').value;
    //var Articles = document.getElementById('articles').value;
    var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });

    function addRowCheque(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var colCount = table.rows[0].cells.length;



        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;

        row.id = 'row_cheque_'+rowCount;

        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;
        }

        var listitems= row.getElementsByTagName("input")
        for (i=0; i<listitems.length; i++) {
            listitems[i].setAttribute("oninput", "calculateCheque('"+row.id+"')");
            var nam = listitems[i].getAttribute("name");
            listitems[i].setAttribute("id", nam+"_cheque_"+rowCount);
        }

        var tab = $('#cheque-categorie-table').find('.trash_cheque')

        for (i=0; i<tab.length; i++) {
            tab[i].setAttribute("data-cheque_id", i);
        }

        var listSelect= row.getElementsByTagName("select")
        for (i=0; i<listSelect.length; i++) {
            listSelect[i].setAttribute("oninput", "calculateCheque('"+row.id+"')");
            var nam = listSelect[i].getAttribute("name");
            listSelect[i].setAttribute("id", nam+"_cheque_"+rowCount);
        }
    }

    function calculateCheque(elementID) {
        var mainRow = document.getElementById(elementID);
        var rowID = elementID.split('row_cheque_')[1];

        var article = $('#cheque-categorie-table').find("select[id='comptes_comptable_id[]_cheque_"+rowID+"']")[0].value;
        var qte = $('#cheque-categorie-table').find("input[id='qte[]_cheque_"+rowID+"']")[0].value;
        var montant = $('#cheque-categorie-table').find("input[id='montant[]_cheque_"+rowID+"']")[0].value;
        var taxe_id = $('#cheque-categorie-table').find("select[id='taxe_id[]_cheque_"+rowID+"']")[0].value;


        var total_ht = mainRow.querySelectorAll('[name=htCheque]')[0];
        var total_taxe = mainRow.querySelectorAll('[name=taxeCheque]')[0];
        var total_ttc = mainRow.querySelectorAll('[name=ttcCheque]')[0];

        var myResult1 = qte * montant;



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

        $(".total_ht_cheque").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe_cheque").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc_cheque").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MTTC += parseFloat(this.value);
            }
        });

        // For ARticle

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

        $(".total_sans_taxe_cheque").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
        $(".taxe_value_cheque").html(MT.toFixed(2) + " {{getCurrency()->sigle}}");
        $(".total_ttc_cheque").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#amount_depense_cheque_pay").html(formatNumber.format(MTTC));


    }

    $(document).on("click", ".trash_cheque", function (e) {
        var table = document.getElementById('cheque-categorie-table');
        var rowCount = table.rows.length;
        const _this = $(this);
        const classroom_id = _this.attr('data-cheque_id');

        var ttc = $('#cheque-categorie-table').find("input[id='ttcCheque_cheque_"+classroom_id+"']");
        var taxe_value = $('#cheque-categorie-table').find("input[id='taxeCheque_cheque_"+classroom_id+"']");
        var HT_value = $('#cheque-categorie-table').find("input[id='htCheque_cheque_"+classroom_id+"']");

        if(rowCount > 1){
            var TTC = parseFloat($('.total_ttc_cheque').html()) - parseFloat(ttc[0].value);
            var MHT = parseFloat($('.total_sans_taxe_cheque').html()) - parseFloat(HT_value[0].value);
            var Taxe = parseFloat($('.taxe_value_cheque').html()) - parseFloat(taxe_value[0].value);

            if(taxe_value[0].value == '' || isNaN(taxe_value[0].value)){
                Taxe = parseFloat($('.taxe_value_cheque').html());
            }

            if(!isNaN(TTC) && !isNaN(MHT) && !isNaN(Taxe)){
                $(".total_sans_taxe_cheque").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
                $(".taxe_value_cheque").html(Taxe.toFixed(2) + " {{getCurrency()->sigle}}");
                $(".total_ttc_cheque").html(TTC.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#amount_depense_cheque_pay").html(formatNumber.format(TTC));
            }
            _this.parent().parent().remove();
        }
    });

</script>

<script>

    var taxe_option = document.getElementById('taxe_facture_depense').value;
    var Articles = document.getElementById('articles_cheque_depense2').value;
    var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });

    function addRowChequedep(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var colCount = table.rows[0].cells.length;



        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;

        row.id = 'row_cheque_ar_'+rowCount;

        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;
        }

        var listitems= row.getElementsByTagName("input")
        for (i=0; i<listitems.length; i++) {
            listitems[i].setAttribute("oninput", "calculateArCheq('"+row.id+"')");
            var nam = listitems[i].getAttribute("name");
            listitems[i].setAttribute("id", nam+"_archeque_"+rowCount);
        }

        var tab = $('#cheque-article').find('.trash_dep_chek')
        for (i=0; i<tab.length; i++) {
            tab[i].setAttribute("data-chek", i);
        }

        var listSelect= row.getElementsByTagName("select")
        for (i=0; i<listSelect.length; i++) {
            listSelect[i].setAttribute("oninput", "calculateArCheq('"+row.id+"')");
            var nam = listSelect[i].getAttribute("name");
            listSelect[i].setAttribute("id", nam+"_archeque_"+rowCount);
        }
    }

    function calculateArCheq(elementID) {
        var mainRow = document.getElementById(elementID);
        var rowID = elementID.split('row_cheque_ar_')[1];

        var article = $('#cheque-article').find("select[id='article_id[]_archeque_"+rowID+"']")[0].value;
        var qte = $('#cheque-article').find("input[id='qte_article[]_archeque_"+rowID+"']")[0].value;
        var montant = $('#cheque-article').find("input[id='montant_article[]_archeque_"+rowID+"']")[0];
        var taxe_id = $('#cheque-article').find("select[id='taxe_article[]_archeque_"+rowID+"']")[0].value;

        var total_ht = mainRow.querySelectorAll('[name=htChek]')[0];
        var total_taxe = mainRow.querySelectorAll('[name=taxeChek]')[0];
        var total_ttc = mainRow.querySelectorAll('[name=ttcChek]')[0];

        var myResult2 = 0;
        //alert(total_ht.value)
        var montant_tab2 = JSON.parse(Articles);
        montant_tab2.map(function(value, index){
            if(value.id == article){
                montant.value = value.prix_unitaire;
                myResult2 = qte * value.prix_unitaire;
                total_ht.value = qte * value.prix_unitaire;
                //alert(myResult2)
            }
        });

        var taxe_tab = JSON.parse(taxe_option);
        var result_taxe = 0;
        taxe_tab.map(function(value, index){
            if(value.id == taxe_id){
                total_taxe.value = (myResult2 * value.taux)/100;
                result_taxe = total_taxe.value;
            }
        });

        //console.log(total_taxe);
        //total_ht.value = myResult2;
        total_ttc.value = Number(result_taxe) + Number(myResult2);

        var MHT = 0;
        var MT = 0;
        var MTTC = 0;

        // For ARticle

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

        // For Compte Comptable

        $(".total_ht_cheque").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe_cheque").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc_cheque").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MTTC += parseFloat(this.value);
            }
        });

        $(".total_sans_taxe_cheque").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
        $(".taxe_value_cheque").html(MT.toFixed(2) + " {{getCurrency()->sigle}}");
        $(".total_ttc_cheque").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#amount_depense_cheque_pay").html(formatNumber.format(MTTC));


    }

    $(document).on("click", "#trash_dep_chek", function (e) {
        var table = document.getElementById('cheque-article');
        var rowCount = table.rows.length;
        const _this = $(this);
        const classroom_id = _this.attr('data-chek');
        var ttc = $('#cheque-article').find("input[id='ttcChek_archeque_"+classroom_id+"']");
        var taxe_value = $('#cheque-article').find("input[id='taxeChek_archeque_"+classroom_id+"']");
        var HT_value = $('#cheque-article').find("input[id='htChek_archeque_"+classroom_id+"']");

        if(rowCount > 1){
            var TTC = parseFloat($('.total_ttc_cheque').html()) - parseFloat(ttc[0].value);
            var MHT = parseFloat($('.total_sans_taxe_cheque').html()) - parseFloat(HT_value[0].value);
            var Taxe = parseFloat($('.taxe_value_cheque').html()) - parseFloat(taxe_value[0].value);

            if(taxe_value[0].value == '' || isNaN(taxe_value[0].value)){
                Taxe = parseFloat($('.taxe_value_cheque').html());
            }

            if(!isNaN(TTC) && !isNaN(MHT) && !isNaN(Taxe)){
                $(".total_sans_taxe_cheque").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
                $(".taxe_value_cheque").html(Taxe.toFixed(2) + " {{getCurrency()->sigle}}");
                $(".total_ttc_cheque").html(TTC.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#amount_depense_cheque_pay").html(formatNumber.format(TTC));
            }
            _this.parent().parent().remove();
        }
    });

</script>
