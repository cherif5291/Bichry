
<!-- Recupération automatique du numéro de chèque -->

<script>
    $('#reference').keyup(function () {
      $('#get_credit_number_edit').text($(this).val());
    });
</script>

<script>

    var taxe_option = document.getElementById('taxe_facture_depense').value;
    var Articles = document.getElementById('article_facture_depense').value;
    var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });

    function addCredRow(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var colCount = table.rows[0].cells.length;



        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;

        row.id = 'row_credfour_'+rowCount;

        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;
        }

        var listitems= row.getElementsByTagName("input")
        for (i=0; i<listitems.length; i++) {
            listitems[i].setAttribute("oninput", "calculateCreditAr('"+row.id+"')");
            var nam = listitems[i].getAttribute("name");
            listitems[i].setAttribute("id", nam+"_credfour_"+rowCount);
        }

        var tab = $('#credit-article-tab').find('.trash_dep_fac')
        for (i=0; i<tab.length; i++) {
            tab[i].setAttribute("data-fac", i);
        }

        var listSelect= row.getElementsByTagName("select")
        for (i=0; i<listSelect.length; i++) {
            listSelect[i].setAttribute("oninput", "calculateCreditAr('"+row.id+"')");
            var nam = listSelect[i].getAttribute("name");
            listSelect[i].setAttribute("id", nam+"_credfour_"+rowCount);
        }
    }

    function calculateCreditAr(elementID) {
        var mainRow = document.getElementById(elementID);
        var rowID = elementID.split('row_credfour_')[1];

        var article = $('#credit-article-tab').find("select[id='article_id[]_credfour_"+rowID+"']")[0].value;
        var qte = $('#credit-article-tab').find("input[id='qte_article[]_credfour_"+rowID+"']")[0].value;
        var montant = $('#credit-article-tab').find("input[id='montant_article[]_credfour_"+rowID+"']")[0];
        var taxe_id = $('#credit-article-tab').find("select[id='taxe_article[]_credfour_"+rowID+"']")[0].value;

        var total_ht = mainRow.querySelectorAll('[name=total_ht_dep]')[0];
        var total_taxe = mainRow.querySelectorAll('[name=total_taxe_dep]')[0];
        var total_ttc = mainRow.querySelectorAll('[name=ttc_dep]')[0];

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


        total_ht.value = myResult1;
        total_ttc.value = Number(result_taxe) + Number(myResult1);

        var MHT = 0;
        var MT = 0;
        var MTTC = 0;

        // For Article

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

        // For Compte comptable

        $(".total_ht_credit").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe_credit").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc_credit").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MTTC += parseFloat(this.value);
            }
        });

        $(".total_sans_taxe_credit").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
        $(".taxe_value_credit").html(MT.toFixed(2) + " {{getCurrency()->sigle}}");
        $(".total_ttc_recu").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#amount_depense_creditFournisseur_pay").html(formatNumber.format(MTTC));


    }

    $(document).on("click", "#trash_dep_fac", function (e) {
        var table = document.getElementById('credit-article-tab');
        var rowCount = table.rows.length;
        const _this = $(this);
        const classroom_id = _this.attr('data-fac');
        var ttc = $('#credit-article-tab').find("input[id='ttc_dep_"+classroom_id+"']");
        var taxe_value = $('#credit-article-tab').find("input[id='total_taxe_dep_"+classroom_id+"']");
        var HT_value = $('#credit-article-tab').find("input[id='total_ht_dep_"+classroom_id+"']");

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
                $("#amount_depense_creditFournisseur_pay").html(formatNumber.format(TTC));
            }
            _this.parent().parent().remove();
        }
    });

</script>

<script>

    var taxe_option = document.getElementById('taxe_value_credit_input').value;
    //var Articles = document.getElementById('articles').value;
    var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });

    function addRowCredit(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var colCount = table.rows[0].cells.length;



        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;

        row.id = 'row_credit_'+rowCount;

        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;
        }

        var listitems= row.getElementsByTagName("input")
        for (i=0; i<listitems.length; i++) {
            listitems[i].setAttribute("oninput", "calculateCredit('"+row.id+"')");
            var nam = listitems[i].getAttribute("name");
            listitems[i].setAttribute("id", nam+"_credit_"+rowCount);
        }

        var tab = $('#credit-categorie-table').find('.trash_credit')

        for (i=0; i<tab.length; i++) {
            tab[i].setAttribute("data-credit_id", i);
        }

        var listSelect= row.getElementsByTagName("select")
        for (i=0; i<listSelect.length; i++) {
            listSelect[i].setAttribute("oninput", "calculateCredit('"+row.id+"')");
            var nam = listSelect[i].getAttribute("name");
            listSelect[i].setAttribute("id", nam+"_credit_"+rowCount);
        }
    }

    function calculateCredit(elementID) {
        var mainRow = document.getElementById(elementID);
        var rowID = elementID.split('row_credit_')[1];

        var article = $('#credit-categorie-table').find("select[id='comptes_comptable_id[]_credit_"+rowID+"']")[0].value;
        var qte = $('#credit-categorie-table').find("input[id='qte[]_credit_"+rowID+"']")[0].value;
        var montant = $('#credit-categorie-table').find("input[id='montant[]_credit_"+rowID+"']")[0].value;
        var taxe_id = $('#credit-categorie-table').find("select[id='taxe_id[]_credit_"+rowID+"']")[0].value;


        var total_ht = mainRow.querySelectorAll('[name=htCredit]')[0];
        var total_taxe = mainRow.querySelectorAll('[name=taxeCredit]')[0];
        var total_ttc = mainRow.querySelectorAll('[name=ttcCredit]')[0];

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

        // For Compte comptable

        $(".total_ht_credit").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe_credit").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc_credit").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MTTC += parseFloat(this.value);
            }
        });

        // For Article

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

        $(".total_sans_taxe_credit").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
        $(".taxe_value_credit").html(MT.toFixed(2) + " {{getCurrency()->sigle}}");
        $(".total_ttc_recu").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#amount_depense_creditFournisseur_pay").html(formatNumber.format(MTTC));


    }

    $(document).on("click", ".trash_credit", function (e) {
        var table = document.getElementById('credit-categorie-table');
        var rowCount = table.rows.length;
        const _this = $(this);
        const classroom_id = _this.attr('data-credit_id');

        var ttc = $('#credit-categorie-table').find("input[id='ttcCredit_credit_"+classroom_id+"']");
        var taxe_value = $('#credit-categorie-table').find("input[id='taxeCredit_credit_"+classroom_id+"']");
        var HT_value = $('#credit-categorie-table').find("input[id='htCredit_credit_"+classroom_id+"']");

        if(rowCount > 1){
            var TTC = parseFloat($('.total_ttc_recu').html()) - parseFloat(ttc[0].value);
            var MHT = parseFloat($('.total_sans_taxe_credit').html()) - parseFloat(HT_value[0].value);
            var Taxe = parseFloat($('.taxe_value_credit').html()) - parseFloat(taxe_value[0].value);

            if(taxe_value[0].value == '' || isNaN(taxe_value[0].value)){
                Taxe = parseFloat($('.taxe_value_credit').html());
            }

            if(!isNaN(TTC) && !isNaN(MHT) && !isNaN(Taxe)){
                $(".total_sans_taxe_credit").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
                $(".taxe_value_credit").html(Taxe.toFixed(2) + " {{getCurrency()->sigle}}");
                $(".total_ttc_recu").html(TTC.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#amount_depense_creditFournisseur_pay").html(formatNumber.format(TTC));
            }
            _this.parent().parent().remove();
        }
    });

</script>



<!-- Ajout de nouveau ligne de catégorie sur popup update-->


