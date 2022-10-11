
<!-- Recupération automatique du numéro de chèque -->

<script>
    $('#numero_cheque').keyup(function () {
      $('#get_cheque_number').text($(this).val());
    });
</script>

<script>

    var taxe_option = document.getElementById('taxe_value_dep_panier').value;
    //var Articles = document.getElementById('articles').value;
    var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });

    function addRowDepPan(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var colCount = table.rows[0].cells.length;



        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;

        row.id = 'row_dep_sim_'+rowCount;

        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;
        }

        var listitems= row.getElementsByTagName("input")
        for (i=0; i<listitems.length; i++) {
            listitems[i].setAttribute("oninput", "calculateDepSim('"+row.id+"')");
            var nam = listitems[i].getAttribute("name");
            listitems[i].setAttribute("id", nam+"_dep_sim_"+rowCount);
        }

        var tab = $('#test-body2').find('.trash_dep_sim')

        for (i=0; i<tab.length; i++) {
            tab[i].setAttribute("data-dep_sim", i);
        }

        var listSelect= row.getElementsByTagName("select")
        for (i=0; i<listSelect.length; i++) {
            listSelect[i].setAttribute("oninput", "calculateDepSim('"+row.id+"')");
            var nam = listSelect[i].getAttribute("name");
            listSelect[i].setAttribute("id", nam+"_dep_sim_"+rowCount);
        }
    }

    function calculateDepSim(elementID) {
        var mainRow = document.getElementById(elementID);
        var rowID = elementID.split('row_dep_sim_')[1];

        var article = $('#test-body2').find("select[id='comptes_comptable_id[]_dep_sim_"+rowID+"']")[0].value;
        var qte = $('#test-body2').find("input[id='qte[]_dep_sim_"+rowID+"']")[0].value;
        var montant = $('#test-body2').find("input[id='montant[]_dep_sim_"+rowID+"']")[0].value;
        var taxe_id = $('#test-body2').find("select[id='taxe_id[]_dep_sim_"+rowID+"']")[0].value;


        var total_ht = mainRow.querySelectorAll('[name=htDepSim]')[0];
        var total_taxe = mainRow.querySelectorAll('[name=taxeDepSim]')[0];
        var total_ttc = mainRow.querySelectorAll('[name=ttcDepSim]')[0];

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

        $(".total_ht_dep_sim").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe_dep_sim").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc_dep_sim").each(function () {
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

        $(".total_sans_taxe_dep_sim").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
        $(".taxe_value_dep_sim").html(MT.toFixed(2) + " {{getCurrency()->sigle}}");
        $(".total_ttc_dep_sim").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#amount_depense_depenseSimple_pay").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");


    }

    $(document).on("click", ".trash_dep_sim", function (e) {
        var table = document.getElementById('test-body2');
        var rowCount = table.rows.length;
        const _this = $(this);
        const classroom_id = _this.attr('data-dep_sim');

        var ttc = $('#test-body2').find("input[id='ttcDepSim_dep_sim_"+classroom_id+"']");
        var taxe_value = $('#test-body2').find("input[id='taxeDepSim_dep_sim_"+classroom_id+"']");
        var HT_value = $('#test-body2').find("input[id='htDepSim_dep_sim_"+classroom_id+"']");
        if(rowCount > 1){
            var TTC = parseFloat($('.total_ttc_dep_sim').html()) - parseFloat(ttc[0].value);
            var MHT = parseFloat($('.total_sans_taxe_dep_sim').html()) - parseFloat(HT_value[0].value);
            var Taxe = parseFloat($('.taxe_value_dep_sim').html()) - parseFloat(taxe_value[0].value);

            if(taxe_value[0].value == '' || isNaN(taxe_value[0].value)){
                Taxe = parseFloat($('.taxe_value_dep_sim').html());
            }

            if(!isNaN(TTC) && !isNaN(MHT) && !isNaN(Taxe)){
                $(".total_sans_taxe_dep_sim").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
                $(".taxe_value_dep_sim").html(Taxe.toFixed(2) + " {{getCurrency()->sigle}}");
                $(".total_ttc_dep_sim").html(TTC.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#amount_depense_depenseSimple_pay").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");
            }
            _this.parent().parent().remove();
        }
    });

</script>

<script>

    var taxe_option = document.getElementById('taxe_facture_depense').value;
    var Articles = document.getElementById('articles_facture_depense').value;
    var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });

    function addRowDepSimpUp(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var colCount = table.rows[0].cells.length;



        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;

        row.id = 'row_simAr_'+rowCount;

        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;
        }

        var listitems= row.getElementsByTagName("input")
        for (i=0; i<listitems.length; i++) {
            listitems[i].setAttribute("oninput", "calculateDepSimpUp('"+row.id+"')");
            var nam = listitems[i].getAttribute("name");
            listitems[i].setAttribute("id", nam+"_"+rowCount);
        }

        var tab = $('#dep-simp-article').find('.trash_dep_fac')
        for (i=0; i<tab.length; i++) {
            tab[i].setAttribute("data-fac", i);
        }

        var listSelect= row.getElementsByTagName("select")
        for (i=0; i<listSelect.length; i++) {
            listSelect[i].setAttribute("oninput", "calculateDepSimpUp('"+row.id+"')");
            var nam = listSelect[i].getAttribute("name");
            listSelect[i].setAttribute("id", nam+"_"+rowCount);
        }
    }

    function calculateDepSimpUp(elementID) {
        var mainRow = document.getElementById(elementID);
        var rowID = elementID.split('row_simAr_')[1];

        var article = $('#dep-simp-article').find("select[id='article_id[]_"+rowID+"']")[0].value;
        var qte = $('#dep-simp-article').find("input[id='qte_article[]_"+rowID+"']")[0].value;
        var montant = $('#dep-simp-article').find("input[id='montant_article[]_"+rowID+"']")[0];
        var taxe_id = $('#dep-simp-article').find("select[id='taxe_article[]_"+rowID+"']")[0].value;

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

        // For compte comptable

        $(".total_ht_dep_sim").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe_dep_sim").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc_dep_sim").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MTTC += parseFloat(this.value);
            }
        });

        $(".total_sans_taxe_dep_sim").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
        $(".taxe_value_dep_sim").html(MT.toFixed(2) + " {{getCurrency()->sigle}}");
        $(".total_ttc_dep_sim").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#amount_depense_depenseSimple_pay").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");


    }

    $(document).on("click", "#trash_dep_fac", function (e) {
        var table = document.getElementById('dep-simp-article');
        var rowCount = table.rows.length;
        const _this = $(this);
        const classroom_id = _this.attr('data-fac');
        var ttc = $('#dep-simp-article').find("input[id='ttc_dep_"+classroom_id+"']");
        var taxe_value = $('#dep-simp-article').find("input[id='total_taxe_dep_"+classroom_id+"']");
        var HT_value = $('#dep-simp-article').find("input[id='total_ht_dep_"+classroom_id+"']");

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
                $("#amount_depense_depenseSimple_pay").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");
            }
            _this.parent().parent().remove();
        }
    });

</script>
