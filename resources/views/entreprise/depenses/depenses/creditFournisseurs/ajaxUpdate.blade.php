<script>
    $(document).ready(function() {

        // Bouton ajouter un fournisseur

        $(document).on("click", ".addFournisseur-depense", function () {
            $('#myModal').modal('show');
        });

        // Bouton ajouter modalité sur la liste d'option

        $('select[name=paiements_modalite_id]').change(function() {
            if ($(this).val() == 'addModalite')
            {
                $('#modaliteModal').modal('show');
            }
        });

        // Bouton pour recupérer l'id dépense sur le tableau de la page index

        $(document).on('click', '.btn-edit-credit', function () {
            const _this = $(this);
            const credit_id = _this.attr('credit-id');

            findDepense(credit_id);

        });

        // Suppression Compte comptable

        $(document).on('click', '.delete-credit', function (event) {
            event.preventDefault()
            const _this = $(this);
            const panier_id = _this.attr('btn-delete-id');
            const credit_id = _this.attr('credit-id');

            deletePanier(panier_id, credit_id);

        });

        function findDepense(id){
            var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });
            const Fournisseurs = JSON.parse(document.getElementById('Fournisseurs-depense').value);
            const Clients = JSON.parse(document.getElementById('Client-depense').value);
            const Articles = JSON.parse(document.getElementById('articles_cheque_depense').value);

            var credit_id = id
            var fournisseurSelectHTML = '<option value="" hidden>Choisir fournisseur</option>';
            var depenseTableHTML = "";
            var depenseTableHTML2 = "";

            var route = '{{ route("entreprise.depense.new.facture", ":id") }}';
            url = route.replace(':id', credit_id);

            $.ajax({
                url: url,
                type:"GET",
                data:{
                    _token: '{{csrf_token()}}',
                    id:credit_id,
                },
                success:function(response){

                    var table = response.depenses_paniers;
                    //console.log(response);

                    Fournisseurs.map(function(value, index){
                        if(response.credit_fournisseurs.fournisseur_id > 0 && value.id == response.credit_fournisseurs.fournisseur_id ){
                            var is_fournisseur = 'selected';
                        }
                        fournisseurSelectHTML += "<option value='F"+value.id+"'"+is_fournisseur+" >"+value.entreprise+"</option>";
                    });

                    Clients.map(function(value, index){
                        if(response.credit_fournisseurs.clients_entreprise_id > 0 && value.id == response.credit_fournisseurs.clients_entreprise_id){
                            var is_client = 'selected';
                        }
                        fournisseurSelectHTML += "<option value='C"+value.id+"'"+is_client+" >"+value.entreprise+"</option>";
                    });


                    var taux_taxe = 0;
                    table.map(function(value, index){
                        if(value.comptes_comptable_id){
                            taux_taxe += value.taux_taxe;
                            var mHT = value.montant;
                            var mTaxe = (mHT * value.taux_taxe)/100;
                            var mTTC = mHT + mTaxe;
                            depenseTableHTML += "<tr><td class='align-middle'>"+value.designation+"</td>"+
                                                "<td class='align-middle text-start'>"+value.description+"</td>"+
                                            // "<td>"+value.qte+"</td>"+
                                                "<td>"+formatNumber.format(value.montant)+"</td>"+
                                                //"<td>"+formatNumber.format(mHT)+"</td>"+
                                                "<td>"+value.taux_taxe+"%</td>"+
                                                //"<td>"+formatNumber.format(mTaxe)+"</td>"+
                                                "<td>"+formatNumber.format(mTTC)+"</td>"+
                                                "<td><a href='' class='delete-credit' credit-id='"+credit_id+"' btn-delete-id='"+value.id+"'><i class='fa fa-trash text-danger'></i></a></td></tr>";
                        }
                    });

                    var taux_taxe2 = 0;
                    table.map(function(value, index){

                        if(value.article_id){
                            taux_taxe2 += value.taux_taxe;
                            var montant = 0;
                            var mHT = value.montant;
                            var mTaxe = (value.montant * value.taux_taxe)/100;
                            var mTTC = mHT + mTaxe;

                            Articles.map(function(art, index){
                                if(art.id == value.article_id){
                                    depenseTableHTML2 += "<tr><td class='align-middle'>"+art.nom+"</td>";
                                    montant= art.prix_unitaire;
                                }
                            });

                            depenseTableHTML2 += "<td class='align-middle text-start'>"+value.description+"</td>"+
                                            "<td>"+value.qte+"</td>"+
                                            "<td>"+formatNumber.format(montant)+"</td>"+
                                            //"<td>"+formatNumber.format(mHT)+"</td>"+
                                            "<td>"+value.taux_taxe+"%</td>"+
                                            //"<td>"+formatNumber.format(mTaxe)+"</td>"+
                                            "<td>"+formatNumber.format(mTTC)+"</td>"+
                                            "<td><a href='' class='delete-credit' credit-id='"+credit_id+"' btn-delete-id='"+value.id+"'><i class='fa fa-trash text-danger'></i></a></td></tr>";
                        }
                    });
                    let route_delete = "{{route('depenses.delete', 'credit-id')}}";
                    $('#id_route_delete_credit').attr('href', route_delete.replace('credit-id', credit_id));

                    if(response.pieces_jointes.length > 0){
                        let piece = "{{ asset('data') }}";
                        $('#pj_depense_creditFournisseur').attr('src', piece.replace('data', response.pieces_jointes[0].fichier));
                    }
                    $('#id-credit-fournisseur').val(credit_id);
                    $("#fournisseur-credit").html(fournisseurSelectHTML);
                    $(".table-categorie-credit-update").html(depenseTableHTML);
                    $(".tableArticleCredit").html(depenseTableHTML2);

                    $('#credit_number_edit').html(response.credit_fournisseurs.reference);
                    $('#date_paiement_credit').val(response.credit_fournisseurs.date_paiement);
                    $('#adresse_postale_credit').val(response.credit_fournisseurs.adresse_postale);
                    $('#reference_credit').val(response.credit_fournisseurs.reference);
                    $('#memo_credit_update').val(response.credit_fournisseurs.note);
                    //$("#taux_taxe_credit").html("Taxe ("+taux_taxe+"%)");
                    $("#total_sans_taxe_credit_up").html(response.total_sans_taxe + " {{getCurrency()->sigle}}");
                    $(".tot_ht_credit_up").val(response.total_sans_taxe);
                    $("#taxe_credit_up").html(response.taxe + " {{getCurrency()->sigle}}");
                    $(".tax_credit_up").val(response.taxe);
                    $("#total_credit_up").html(response.total + " {{getCurrency()->sigle}}");
                    $(".tot_credit_up").val(response.total);
                    $("#amount_depense_creditFournisseur_pay_update").html(formatNumber.format(response.total));

                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function deletePanier(id, credit_id){

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
                    findDepense(credit_id);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

    });
</script>

<script>
    $('#reference_credit').keyup(function () {
      $('#credit_number_edit').text($(this).val());
    });
</script>

<script>

    var taxe_option = document.getElementById('taxe_value_credit_input').value;
    //var Articles = document.getElementById('articles').value;
    var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });

    function addRowCreditUp(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var colCount = table.rows[0].cells.length;



        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;

        row.id = 'row_credit_up_'+rowCount;

        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;
        }

        var listitems= row.getElementsByTagName("input")
        for (i=0; i<listitems.length; i++) {
            listitems[i].setAttribute("oninput", "calculateCreditUp('"+row.id+"')");
            var nam = listitems[i].getAttribute("name");
            listitems[i].setAttribute("id", nam+"_credit_up_"+rowCount);
        }

        var tab = $('#credit-categorie-table-up').find('.trash_credit_up')

        for (i=0; i<tab.length; i++) {
            tab[i].setAttribute("data-credit_id", i);
        }

        var listSelect= row.getElementsByTagName("select")
        for (i=0; i<listSelect.length; i++) {
            listSelect[i].setAttribute("oninput", "calculateCreditUp('"+row.id+"')");
            var nam = listSelect[i].getAttribute("name");
            listSelect[i].setAttribute("id", nam+"_credit_up_"+rowCount);
        }
    }

    function calculateCreditUp(elementID) {
        var mainRow = document.getElementById(elementID);
        var rowID = elementID.split('row_credit_up_')[1];

        var article = $('#credit-categorie-table-up').find("select[id='comptes_comptable_id[]_credit_up_"+rowID+"']")[0].value;
        var qte = $('#credit-categorie-table-up').find("input[id='qte[]_credit_up_"+rowID+"']")[0].value;
        var montant = $('#credit-categorie-table-up').find("input[id='montant[]_credit_up_"+rowID+"']")[0].value;
        var taxe_id = $('#credit-categorie-table-up').find("select[id='taxe_id[]_credit_up_"+rowID+"']")[0].value;


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

        var MHT = parseFloat(document.getElementById('total_ht_credit_up').value.replace(/\s/g, ''));
        var MT = parseFloat(document.getElementById('tax_credit_up').value.replace(/\s/g, ''));
        var MTTC = parseFloat(document.getElementById('tot_credit_up').value.replace(/\s/g, ''));

        // For compte comptable

        $(".total_ht_credit_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe_credit_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc_credit_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MTTC += parseFloat(this.value);
            }
        });

        // For Article

        $(".total_ht_credit_ar").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe_credit_ar").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc_credit_ar").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MTTC += parseFloat(this.value);
            }
        });

        $("#total_sans_taxe_credit_up").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#taxe_credit_up").html(MT.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#total_credit_up").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#amount_depense_creditFournisseur_pay_update").html(formatNumber.format(MTTC));


    }

    $(document).on("click", ".trash_credit_up", function (e) {
        var table = document.getElementById('credit-categorie-table-up');
        var rowCount = table.rows.length;
        const _this = $(this);
        const classroom_id = _this.attr('data-credit_id');

        var ttc = $('#credit-categorie-table-up').find("input[id='ttcCredit_credit_up_"+classroom_id+"']");
        var taxe_value = $('#credit-categorie-table-up').find("input[id='taxeCredit_credit_up_"+classroom_id+"']");
        var HT_value = $('#credit-categorie-table-up').find("input[id='htCredit_credit_up_"+classroom_id+"']");

        if(rowCount > 1){
            var TTC = parseFloat($('#total_credit_up').html()) - parseFloat(ttc[0].value);
            var MHT = parseFloat($('#total_sans_taxe_credit_up').html()) - parseFloat(HT_value[0].value);
            var Taxe = parseFloat($('#taxe_credit_up').html()) - parseFloat(taxe_value[0].value);

            if(taxe_value[0].value == '' || isNaN(taxe_value[0].value)){
                Taxe = parseFloat($('#taxe_credit_up').html());
            }

            if(!isNaN(TTC) && !isNaN(MHT) && !isNaN(Taxe)){
                $("#total_sans_taxe_credit_up").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#taxe_credit_up").html(Taxe.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#total_credit_up").html(TTC.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#amount_depense_creditFournisseur_pay_update").html(formatNumber.format(TTC));
            }
            _this.parent().parent().remove();
        }
    });

</script>

<script>

    var taxe_option = document.getElementById('taxe_value').value;
    var Articles = document.getElementById('articles_cheque_depense').value;
    var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });

    function addRowArCreditUp(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var colCount = table.rows[0].cells.length;



        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;

        row.id = 'row_creditarup_'+rowCount;

        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;
        }

        var listitems= row.getElementsByTagName("input")
        for (i=0; i<listitems.length; i++) {
            listitems[i].setAttribute("oninput", "calculateArCreditUp('"+row.id+"')");
            var nam = listitems[i].getAttribute("name");
            listitems[i].setAttribute("id", nam+"_creditarup_"+rowCount);
        }

        var tab = $('#credit-article-up').find('.trash_creditarup_up')

        for (i=0; i<tab.length; i++) {
            tab[i].setAttribute("data-creditar-up", i);
        }

        var listSelect= row.getElementsByTagName("select")
        for (i=0; i<listSelect.length; i++) {
            listSelect[i].setAttribute("oninput", "calculateArCreditUp('"+row.id+"')");
            var nam = listSelect[i].getAttribute("name");
            listSelect[i].setAttribute("id", nam+"_creditarup_"+rowCount);
        }
    }

    function calculateArCreditUp(elementID) {
        var mainRow = document.getElementById(elementID);
        var rowID = elementID.split('row_creditarup_')[1];

        var article = $('#credit-article-up').find("select[id='article_id[]_creditarup_"+rowID+"']")[0].value;
        var qte = $('#credit-article-up').find("input[id='qte_article[]_creditarup_"+rowID+"']")[0].value;
        var montant = $('#credit-article-up').find("input[id='montant_article[]_creditarup_"+rowID+"']")[0];
        var taxe_id = $('#credit-article-up').find("select[id='taxe_article[]_creditarup_"+rowID+"']")[0].value;


        var total_ht = mainRow.querySelectorAll('[name=ht]')[0];
        var total_taxe = mainRow.querySelectorAll('[name=taxe]')[0];
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

        var MHT = parseFloat(document.getElementById('total_ht_credit_up').value.replace(/\s/g, ''));
        var MT = parseFloat(document.getElementById('tax_credit_up').value.replace(/\s/g, ''));
        var MTTC = parseFloat(document.getElementById('tot_credit_up').value.replace(/\s/g, ''));

        // For Article

        $(".total_ht_credit_ar").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe_credit_ar").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc_credit_ar").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MTTC += parseFloat(this.value);
            }
        });

        // For Compte comptable

        $(".total_ht_credit_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe_credit_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc_credit_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MTTC += parseFloat(this.value);
            }
        });





        $("#total_sans_taxe_credit_up").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#taxe_credit_up").html(MT.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#total_credit_up").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#amount_depense_creditFournisseur_pay_update").html(formatNumber.format(MTTC));


    }

    $(document).on("click", ".trash_creditarup_up", function (e) {
        var table = document.getElementById('credit-article-up');
        var rowCount = table.rows.length;
        const _this = $(this);
        const classroom_id = _this.attr('data-creditar-up');

        var ttc = $('#credit-article-up').find("input[id='ttc_creditarup_"+classroom_id+"']");
        var taxe_value = $('#credit-article-up').find("input[id='taxe_creditarup_"+classroom_id+"']");
        var HT_value = $('#credit-article-up').find("input[id='ht_creditarup_"+classroom_id+"']");

        if(rowCount > 1){
            var TTC = parseFloat($('#total_credit_up').html()) - parseFloat(ttc[0].value);
            var MHT = parseFloat($('#total_sans_taxe_credit_up').html()) - parseFloat(HT_value[0].value);
            var Taxe = parseFloat($('#taxe_credit_up').html()) - parseFloat(taxe_value[0].value);

            if(taxe_value[0].value == '' || isNaN(taxe_value[0].value)){
                Taxe = parseFloat($('#taxe_credit_up').html());
            }

            if(!isNaN(TTC) && !isNaN(MHT) && !isNaN(Taxe)){
                $("#total_sans_taxe_credit_up").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#taxe_credit_up").html(Taxe.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#total_credit_up").html(TTC.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#amount_depense_creditFournisseur_pay_update").html(formatNumber.format(TTC));
            }
            _this.parent().parent().remove();
        }
    });

</script>
<!-- Modification et envoie de donnée au controlleur -->

<script>
    $(document).ready(function() {

        $(document).on('click', '.btn-credit-submit', function (e) {
            //e.preventDefault();
            var fournisseur = document.getElementById('fournisseur-credit').value;
            var date_paiement = document.getElementById('date_paiement_credit').value;
            var numero_reference = document.getElementById('reference_credit').value;
            var adresse_postale = document.getElementById('adresse_postale_credit').value;
            var memo = document.getElementById('memo_credit_update').value;
            var type = document.getElementById('type-credit').value;
            var id_dcredit = document.getElementById('id-credit-fournisseur').value;

            var compte_comptable = $("select[name='comptes_comptable_id[]']")
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

            var montant = $("input[name='montant[]']")
                .map(function() {
                    return $(this).val();
            }).toArray();

            var filtered_compte_comptable = compte_comptable.filter(function(value, index, arr){
                return index > 7;
            });

            var filtered_taxe = taxe.filter(function(value, index, arr){
                return index > 7;
            });

            var filtered_description = description.filter(function(value, index, arr){
                return index > 7;
            });

            var filtered_montant = montant.filter(function(value, index, arr){
                return index > 7;
            });
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

            //console.log(compte_comptable);
            if(filtered_compte_comptable[0] == ''){
                filtered_compte_comptable = null;
            }
            // console.log(filtered_compte_comptable)
            // console.log(filtered_description)
            // console.log(filtered_montant)
            // console.log(filtered_taxe)

            /*
                For Article
            */

             // For Article

             var article_id = $("select[name='article_id[]']")
                .map(function() {
                    return $(this).val();
            }).toArray();

            var taxe_article = $("select[name='taxe_article[]']")
                .map(function() {
                    return $(this).val();
            }).toArray();

            var description_article = $("input[name='description_article[]']")
                .map(function() {
                    return $(this).val();
            }).toArray();

            var montant_article = $("input[name='montant_article[]']")
                .map(function() {
                    return $(this).val();
            }).toArray();

            var qte_article = $("input[name='qte_article[]']")
                .map(function() {
                    return $(this).val();
            }).toArray();

            var i=0, j=0;
            for(i=0; i<article_id.length; i++){
                if(article_id[i] != ''){
                    break
                }
            }

            var filtered_article = article_id.filter(function(value, index, arr){
                return index >= i;
            });

            var filtered_taxe_article = taxe_article.filter(function(value, index, arr){
                return index >= i;
            });

            var filtered_description_article = description_article.filter(function(value, index, arr){
                return index >= i;
            });

            var filtered_montant_article = montant_article.filter(function(value, index, arr){
                return index >= i;
            });

            var filtered_qte_article = qte_article.filter(function(value, index, arr){
                return index >= i;
            });

            // filtered_article.splice(-1,1)
            // filtered_taxe_article.splice(-1,1)
            // filtered_montant_article.splice(-1,1)
            // filtered_description_article.splice(-1,1)
            // filtered_qte_article.splice(-1,1)

            filtered_description_article.map(function(value, index) {
                if(value == ''){
                    filtered_description_article[index] = '-';
                }
            });

            filtered_taxe_article.map(function(value, index) {
                if(value == ''){
                    filtered_taxe_article[index] = -1;
                }
            });

            filtered_montant_article.map(function(value, index) {
                if(value == ''){
                    filtered_montant_article[index] = '0';
                }
            });

            filtered_qte_article.map(function(value, index) {
                if(value == ''){
                    filtered_qte_article[index] = '0';
                }
            });

            if(filtered_article[0] == ''){
                filtered_article = null;
            }

            // console.log(article_id)
            // console.log(filtered_article)
            // console.log(filtered_taxe_article)
            // console.log(filtered_description_article)
            // console.log(filtered_montant_article)
            // console.log(filtered_qte_article)

            $.ajax({
                url:"{{route('entreprise.depense.new.DepenseOnPopUpdate')}}",
                type:"POST",
                data:{
                    _token: '{{csrf_token()}}',
                    id: id_dcredit,
                    fournisseur: fournisseur,
                    date_paiement: date_paiement,
                    reference: numero_reference,
                    adresse_postale: adresse_postale,
                    note: memo,
                    type: type,
                    comptes_comptable_id: filtered_compte_comptable,
                    montant: filtered_montant,
                    taxe_id: filtered_taxe,
                    description: filtered_description,
                    article_id: filtered_article,
                    description_article: filtered_description_article,
                    qte_article: filtered_qte_article,
                    montant_article: filtered_montant_article,
                    taxe_article: filtered_taxe_article

                },
                success:function(response){
                    alert('Mise à jour avec  succès')
                    console.log(response)
                },
                error: function(error) {
                    alert(error.responseJSON.message)
                    console.log(error.responseJSON);
                }
            });

        });
    });
</script>

<script>
    $(document).ready(function() {

        // Bouton supprimer un fournisseur

        $(document).on("click", ".btn-delete-credit", function () {
            var id = document.getElementById('id-depense').value;

            var route = '{{ route("admin.factures.factures.delete", ":id") }}';
            url = route.replace(':id', id);

            $.ajax({
                url: url,
                type:"GET",
                data:{
                    _token: '{{csrf_token()}}',
                    id:id,
                    type: 'cheque',
                },
                success:function(response){
                    alert('suppression réussie')
                    console.log(response)
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
