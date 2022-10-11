<!-- Recupération automatique du numéro de facture -->

<script>
    $('#numero_facture').keyup(function () {
      $('#get_facture_number').text($(this).val());
    });

    // Recupération automatique du date d'échéance

    $('#date_facturation').change(function(e){
        e.preventDefault();
        Date.prototype.addDays = function (days) {
            const date = new Date(this.valueOf());
            date.setDate(date.getDate() + days);
            return date;
        };
        var date = document.getElementById('date_facturation').value;
        var echeance = new Date(date);
        var net = document.getElementById('paiements_modalite_id').value;
        const Modalites = JSON.parse(document.getElementById('ModalitesPop2').value);
        var date_echeance = '';

        var date_echeance = '';

        Modalites.map(function(value, index){
            if(value.id == net){
                date_echeance = echeance.addDays(value.duree).toISOString().slice(0, 10);
            }
        });

        $('#echeance').val(date_echeance);
    });

    $('#paiements_modalite_id').change(function(e){
        e.preventDefault();
        Date.prototype.addDays = function (days) {
            const date = new Date(this.valueOf());
            date.setDate(date.getDate() + days);
            return date;
        };
        var date = document.getElementById('date_facturation').value;
        var echeance = new Date(date);
        var net = document.getElementById('paiements_modalite_id').value;
        const Modalites = JSON.parse(document.getElementById('ModalitesPop2').value);
        var date_echeance = '';

        var date_echeance = '';

        Modalites.map(function(value, index){
            if(value.id == net){
                date_echeance = echeance.addDays(value.duree).toISOString().slice(0, 10);
            }
        });
        $('#echeance').val(date_echeance);
    });

    // Fin recupération echéance
</script>


<!-- Ajout de nouveau ligne de catégorie -->

<script>

    var taxe_option = document.getElementById('taxe_facture_depense').value;
    var Articles = document.getElementById('articles_facture_depense').value;
    var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });

    function addRowFacdep(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var colCount = table.rows[0].cells.length;



        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;

        row.id = 'row_factureAr_'+rowCount;

        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;
        }

        var listitems= row.getElementsByTagName("input")
        for (i=0; i<listitems.length; i++) {
            listitems[i].setAttribute("oninput", "calculateDepfac('"+row.id+"')");
            var nam = listitems[i].getAttribute("name");
            listitems[i].setAttribute("id", nam+"_factureAr_"+rowCount);
        }

        var tab = $('#facture-article').find('.trash_dep_fac')
        for (i=0; i<tab.length; i++) {
            tab[i].setAttribute("data-fac", i);
        }

        var listSelect= row.getElementsByTagName("select")
        for (i=0; i<listSelect.length; i++) {
            listSelect[i].setAttribute("oninput", "calculateDepfac('"+row.id+"')");
            var nam = listSelect[i].getAttribute("name");
            listSelect[i].setAttribute("id", nam+"_factureAr_"+rowCount);
        }
    }

    function calculateDepfac(elementID) {
        var mainRow = document.getElementById(elementID);
        var rowID = elementID.split('row_factureAr_')[1];

        var article = $('#facture-article').find("select[id='article_id[]_factureAr_"+rowID+"']")[0].value;
        var qte = $('#facture-article').find("input[id='qte_article[]_factureAr_"+rowID+"']")[0].value;
        var montant = $('#facture-article').find("input[id='montant_article[]_factureAr_"+rowID+"']")[0];
        var taxe_id = $('#facture-article').find("select[id='taxe_article[]_factureAr_"+rowID+"']")[0].value;

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

        $(".total_ht_com").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe_com").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc_com").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MTTC += parseFloat(this.value);
            }
        });

        $(".total_sans_taxe").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
        $(".taxe_value").html(MT.toFixed(2) + " {{getCurrency()->sigle}}");
        $(".total_ttc").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#amount_depense_facture_pay").html(formatNumber.format(MTTC));


    }

    $(document).on("click", "#trash_dep_fac", function (e) {
        var table = document.getElementById('facture-article');
        var rowCount = table.rows.length;
        const _this = $(this);
        const classroom_id = _this.attr('data-fac');
        var ttc = $('#facture-article').find("input[id='ttc_dep_factureAr_"+classroom_id+"']");
        var taxe_value = $('#facture-article').find("input[id='total_taxe_dep_factureAr_"+classroom_id+"']");
        var HT_value = $('#facture-article').find("input[id='total_ht_dep_factureAr_"+classroom_id+"']");

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
                $("#amount_depense_facture_pay").html(formatNumber.format(TTC));
            }
            _this.parent().parent().remove();
        }
    });

</script>

<script>

    var taxe_option = document.getElementById('taxe_value').value;
    var CompteComptables = document.getElementById('compte_compta').value;
    var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });

    function addRowCom(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var colCount = table.rows[0].cells.length;



        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;

        row.id = 'row_com_'+rowCount;

        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;
        }

        var listitems= row.getElementsByTagName("input")
        for (i=0; i<listitems.length; i++) {
            listitems[i].setAttribute("oninput", "calculateCom('"+row.id+"')");
            var nam = listitems[i].getAttribute("name");
            listitems[i].setAttribute("id", nam+"_"+rowCount);
        }

        var tab = $('#test-body').find('.trash_com')

        for (i=0; i<tab.length; i++) {
            tab[i].setAttribute("data-com", i);
        }

        var listSelect= row.getElementsByTagName("select")
        for (i=0; i<listSelect.length; i++) {
            listSelect[i].setAttribute("oninput", "calculateCom('"+row.id+"')");
            var nam = listSelect[i].getAttribute("name");
            listSelect[i].setAttribute("id", nam+"_"+rowCount);
        }
    }

    function calculateCom(elementID) {
        var mainRow = document.getElementById(elementID);
        var rowID = elementID.split('row_com_')[1];

        //var article = $('#test-body').find("select[id='comptes_comptable_id[]"+rowID+"']")[0].value;
        var qte = $('#test-body').find("input[id='qte[]_"+rowID+"']")[0].value;
        var montant = $('#test-body').find("input[id='montant[]_"+rowID+"']")[0].value;
        var taxe_id = $('#test-body').find("select[id='taxe_id[]_"+rowID+"']")[0].value;


        var total_ht = mainRow.querySelectorAll('[name=total_ht]')[0];
        var total_taxe = mainRow.querySelectorAll('[name=total_taxe]')[0];
        var total_ttc = mainRow.querySelectorAll('[name=ttc]')[0];
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

        // For compte comptable

        $(".total_ht_com").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe_com").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc_com").each(function () {
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

        $(".total_sans_taxe").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
        $(".taxe_value").html(MT.toFixed(2) + " {{getCurrency()->sigle}}");
        $(".total_ttc").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#amount_depense_facture_pay").html(formatNumber.format(MTTC));


    }

    $(document).on("click", ".trash_com", function (e) {
        var table = document.getElementById('test-body');
        var rowCount = table.rows.length;
        const _this = $(this);
        const classroom_id = _this.attr('data-com');

        var ttc = $('#test-body').find("input[id='ttc_"+classroom_id+"']");
        var taxe_value = $('#test-body').find("input[id='total_taxe_"+classroom_id+"']");
        var HT_value = $('#test-body').find("input[id='total_ht_"+classroom_id+"']");

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
                $("#amount_depense_facture_pay").html(formatNumber.format(TTC));
            }
            _this.parent().parent().remove();
        }
    });

</script>

