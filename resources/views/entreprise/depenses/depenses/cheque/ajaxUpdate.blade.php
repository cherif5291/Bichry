<script>
    $('#numero_cheque_update').keyup(function () {
      $('#get_cheque_number_edit').text($(this).val());
    });
</script>

<script>

    var taxe_option = document.getElementById('taxe_value_cheque_up').value;
    //var Articles = document.getElementById('articles').value;
    var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });

    function addRowChequeUp(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var colCount = table.rows[0].cells.length;



        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;

        row.id = 'row_cheque_up_'+rowCount;

        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;
        }

        var listitems= row.getElementsByTagName("input")
        for (i=0; i<listitems.length; i++) {
            listitems[i].setAttribute("oninput", "calculateChequeUp('"+row.id+"')");
            var nam = listitems[i].getAttribute("name");
            listitems[i].setAttribute("id", nam+"_cheque_up_"+rowCount);
        }

        var tab = $('#cheque-categorie-table-up').find('.trash_cheque_up')

        for (i=0; i<tab.length; i++) {
            tab[i].setAttribute("data-cheque_id", i);
        }

        var listSelect= row.getElementsByTagName("select")
        for (i=0; i<listSelect.length; i++) {
            listSelect[i].setAttribute("oninput", "calculateChequeUp('"+row.id+"')");
            var nam = listSelect[i].getAttribute("name");
            listSelect[i].setAttribute("id", nam+"_cheque_up_"+rowCount);
        }
    }

    function calculateChequeUp(elementID) {
        var mainRow = document.getElementById(elementID);
        var rowID = elementID.split('row_cheque_up_')[1];

        var article = $('#cheque-categorie-table-up').find("select[id='comptes_comptable_id[]_cheque_up_"+rowID+"']")[0].value;
        var qte = $('#cheque-categorie-table-up').find("input[id='qte[]_cheque_up_"+rowID+"']")[0].value;
        var montant = $('#cheque-categorie-table-up').find("input[id='montant[]_cheque_up_"+rowID+"']")[0].value;
        var taxe_id = $('#cheque-categorie-table-up').find("select[id='taxe_id[]_cheque_up_"+rowID+"']")[0].value;


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

        var MHT = parseFloat(document.getElementById('total_ht_cheque_up').value.replace(/\s/g, ''));
        var MT = parseFloat(document.getElementById('taxes_cheque_up').value.replace(/\s/g, ''));
        var MTTC = parseFloat(document.getElementById('tot_cheque_up').value.replace(/\s/g, ''));

        $(".total_ht_cheque_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe_cheque_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc_cheque_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MTTC += parseFloat(this.value);
            }
        });

        $(".total_ht_ar").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe_ar").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc_ar").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MTTC += parseFloat(this.value);
            }
        });

        $("#total_sans_taxe_cheque_up").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#taxe_cheque_up").html(MT.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#total_cheque_up").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#amount_depense_cheque_pay_update").html(formatNumber.format(MTTC));


    }

    $(document).on("click", ".trash_cheque_up", function (e) {
        var table = document.getElementById('cheque-categorie-table-up');
        var rowCount = table.rows.length;
        const _this = $(this);
        const classroom_id = _this.attr('data-cheque_id');

        var ttc = $('#cheque-categorie-table-up').find("input[id='ttcCheque_cheque_up_"+classroom_id+"']");
        var taxe_value = $('#cheque-categorie-table-up').find("input[id='taxeCheque_cheque_up_"+classroom_id+"']");
        var HT_value = $('#cheque-categorie-table-up').find("input[id='htCheque_cheque_up_"+classroom_id+"']");

        if(rowCount > 1){
            var TTC = parseFloat($('#total_cheque_up').html()) - parseFloat(ttc[0].value);
            var MHT = parseFloat($('#total_sans_taxe_cheque_up').html()) - parseFloat(HT_value[0].value);
            var Taxe = parseFloat($('#taxe_cheque_up').html()) - parseFloat(taxe_value[0].value);

            if(taxe_value[0].value == '' || isNaN(taxe_value[0].value)){
                Taxe = parseFloat($('#taxe_cheque_up').html());
            }

            if(!isNaN(TTC) && !isNaN(MHT) && !isNaN(Taxe)){
                $("#total_sans_taxe_cheque_up").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#taxe_cheque_up").html(Taxe.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#total_cheque_up").html(TTC.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#amount_depense_cheque_pay_update").html(formatNumber.format(TTC));
            }
            _this.parent().parent().remove();
        }
    });

</script>

<script>

    var taxe_option = document.getElementById('taxe_value').value;
    var Articles = document.getElementById('articles_cheque_depense').value;
    var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });

    function addRowArChequeUp(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var colCount = table.rows[0].cells.length;



        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;

        row.id = 'row_chequeArUp_'+rowCount;

        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;
        }

        var listitems= row.getElementsByTagName("input")
        for (i=0; i<listitems.length; i++) {
            listitems[i].setAttribute("oninput", "calculateArChequeUp('"+row.id+"')");
            var nam = listitems[i].getAttribute("name");
            listitems[i].setAttribute("id", nam+"_chequeArUp_"+rowCount);
        }

        var tab = $('#cheque-article-up').find('.trash_chequeArUp_up')

        for (i=0; i<tab.length; i++) {
            tab[i].setAttribute("data-ar-up", i);
        }

        var listSelect= row.getElementsByTagName("select")
        for (i=0; i<listSelect.length; i++) {
            listSelect[i].setAttribute("oninput", "calculateArChequeUp('"+row.id+"')");
            var nam = listSelect[i].getAttribute("name");
            listSelect[i].setAttribute("id", nam+"_chequeArUp_"+rowCount);
        }
    }

    function calculateArChequeUp(elementID) {
        var mainRow = document.getElementById(elementID);
        var rowID = elementID.split('row_chequeArUp_')[1];

        var article = $('#cheque-article-up').find("select[id='article_id[]_chequeArUp_"+rowID+"']")[0].value;
        var qte = $('#cheque-article-up').find("input[id='qte_article[]_chequeArUp_"+rowID+"']")[0].value;
        var montant = $('#cheque-article-up').find("input[id='montant_article[]_chequeArUp_"+rowID+"']")[0];
        var taxe_id = $('#cheque-article-up').find("select[id='taxe_article[]_chequeArUp_"+rowID+"']")[0].value;


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

        var MHT = parseFloat(document.getElementById('total_ht_cheque_up').value.replace(/\s/g, ''));
        var MT = parseFloat(document.getElementById('taxes_cheque_up').value.replace(/\s/g, ''));
        var MTTC = parseFloat(document.getElementById('tot_cheque_up').value.replace(/\s/g, ''));

        $(".total_ht_ar").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe_ar").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc_ar").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MTTC += parseFloat(this.value);
            }
        });

        $(".total_ht_cheque_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe_cheque_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc_cheque_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MTTC += parseFloat(this.value);
            }
        });

        $("#total_sans_taxe_cheque_up").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#taxe_cheque_up").html(MT.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#total_cheque_up").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#amount_depense_cheque_pay_update").html(formatNumber.format(MTTC));


    }

    $(document).on("click", ".trash_chequeArUp_up", function (e) {
        var table = document.getElementById('cheque-article-up');
        var rowCount = table.rows.length;
        const _this = $(this);
        const classroom_id = _this.attr('data-ar-up');

        var ttc = $('#cheque-article-up').find("input[id='ttc_chequeArUp_"+classroom_id+"']");
        var taxe_value = $('#cheque-article-up').find("input[id='taxe_chequeArUp_"+classroom_id+"']");
        var HT_value = $('#cheque-article-up').find("input[id='ht_chequeArUp_"+classroom_id+"']");

        if(rowCount > 1){
            var TTC = parseFloat($('#total_cheque_up').html()) - parseFloat(ttc[0].value);
            var MHT = parseFloat($('#total_sans_taxe_cheque_up').html()) - parseFloat(HT_value[0].value);
            var Taxe = parseFloat($('#taxe_cheque_up').html()) - parseFloat(taxe_value[0].value);

            if(taxe_value[0].value == '' || isNaN(taxe_value[0].value)){
                Taxe = parseFloat($('#taxe_cheque_up').html());
            }

            if(!isNaN(TTC) && !isNaN(MHT) && !isNaN(Taxe)){
                $("#total_sans_taxe_cheque_up").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#taxe_cheque_up").html(Taxe.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#total_cheque_up").html(TTC.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#amount_depense_cheque_pay_update").html(formatNumber.format(TTC));
            }
            _this.parent().parent().remove();
        }
    });

</script>

<script>
    $(document).ready(function() {

        // Bouton ajouter un fournisseur

        $(document).on("click", ".addFournisseur-cheque", function () {
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

        $(document).on('click', '.btn-edit-cheque', function () {
            const _this = $(this);
            const cheque_id = _this.attr('cheque-id');

            findDepense(cheque_id);

        });

        // Suppression Compte comptable

        $(document).on('click', '.delete-cheque', function (event) {
            event.preventDefault()
            const _this = $(this);
            const panier_id = _this.attr('btn-delete-id');
            const cheque_id = _this.attr('cheque-id');

            deletePanier(panier_id, cheque_id);

        });

        function findDepense(id){
            var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });
            const Fournisseurs = JSON.parse(document.getElementById('Fournisseurs-cheque').value);
            const Clients = JSON.parse(document.getElementById('Client-cheque').value);
            const SourcesPaiement = JSON.parse(document.getElementById('SourcesPaiement-cheque').value);
            const Articles = JSON.parse(document.getElementById('articles_cheque_depense').value);

            var cheque_id = id
            var fournisseurSelectHTML = '<option value="" hidden>Choisir fournisseur</option>';
            var SourcesPaiementSelectHTML = '<option value="" hidden>Choisir Source de paiement</option>';
            var depenseTableHTML = "";
            var depenseTableHTML2 = "";

            var route = '{{ route("entreprise.depense.new.facture", ":id") }}';
            url = route.replace(':id', cheque_id);
            $.ajax({
                url:url,
                type:"GET",
                data:{
                    _token: '{{csrf_token()}}',
                    id:cheque_id,
                },
                success:function(response){

                    var table = response.depenses_paniers;


                    Fournisseurs.map(function(value, index){
                        if(response.cheque.fournisseur_id > 0 && value.id == response.cheque.fournisseur_id ){
                            var is_fournisseur = 'selected';
                        }
                        fournisseurSelectHTML += "<option value='F"+value.id+"'"+is_fournisseur+" >"+value.entreprise+"</option>";
                    });

                    Clients.map(function(value, index){
                        if(response.cheque.clients_entreprise_id > 0 && value.id == response.cheque.clients_entreprise_id){
                            var is_client = 'selected';
                        }
                        fournisseurSelectHTML += "<option value='C"+value.id+"'"+is_client+" >"+value.entreprise+"</option>";
                    });

                    SourcesPaiement.map(function(value, index){
                        SourcesPaiementSelectHTML += "<option value='"+value.id+"'"+(value.id == response.paiementsource_id ? 'selected' : '')+" >("+value.type+") "+value.nom+"</option>";
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
                                                "<td><a href='' class='delete-cheque' cheque-id='"+cheque_id+"' btn-delete-id='"+value.id+"'><i class='fa fa-trash text-danger'></i></a></td></tr>";
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
                                            "<td><a href='' class='delete-cheque' cheque-id='"+cheque_id+"' btn-delete-id='"+value.id+"'><i class='fa fa-trash text-danger'></i></a></td></tr>";
                        }
                    });

                    //console.log(response);
                    let route_delete = "{{route('depenses.delete', 'cheque-id')}}";
                    $('#id_delete_route_cheque').attr('href', route_delete.replace('cheque-id', cheque_id));

                    if(response.pieces_jointes.length > 0){
                        let piece = "{{ asset('data') }}";
                        $('#pj_depense_cheque').attr('src', piece.replace('data', response.pieces_jointes[0].fichier));
                    }

                    $('#id-depense').val(cheque_id);
                    $('#id-cheque').val(response.cheque.id);
                    $("#fournisseur-cheque").html(fournisseurSelectHTML);
                    $("#paiementsource_id_update").html(SourcesPaiementSelectHTML);
                    $(".table-categorie-cheque-update").html(depenseTableHTML);
                    $(".tableArticleCheque").html(depenseTableHTML2);

                    $('#get_cheque_number_edit').html(response.cheque.numero_cheque);
                    $('#date_facturation_cheque_update').val(response.cheque.date_paiement);
                    $('#adresse_postale_cheque_update').val(response.cheque.adresse_postale);
                    $('#numero_cheque_update').val(response.cheque.numero_cheque);
                    $('#memo_cheque_update').val(response.cheque.note);
                    //$("#taux_taxe_cheque").html("Taxe ("+taux_taxe+"%)");
                    $("#total_sans_taxe_cheque_up").html((response.total_sans_taxe ==null ? '0' : response.total_sans_taxe) + " {{getCurrency()->sigle}}");
                    $(".tot_ht_cheque_up").val((response.total_sans_taxe ==null ? '0' : response.total_sans_taxe));
                    $("#taxe_cheque_up").html((response.taxe == null ? '0' : response.taxe) + " {{getCurrency()->sigle}}");
                    $(".tax_cheque_up").val((response.taxe == null ? '0' : response.taxe));
                    $("#total_cheque_up").html((response.total == null ? '0' : response.total)  + " {{getCurrency()->sigle}}");
                    $(".tot_cheque_up").val(response.total);
                    $("#amount_depense_cheque_pay_update").html(formatNumber.format(response.total));


                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function deletePanier(id, cheque_id){
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
                    findDepense(cheque_id);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

    });
</script>

<!-- Modification et envoie de donnée au controlleur -->

<script>
    $(document).ready(function() {

        $(document).on('click', '.btn-cheque-submit', function (e) {
            //e.preventDefault();
            var fournisseur = document.getElementById('fournisseur-cheque').value;
            var numero_cheque = document.getElementById('numero_cheque_update').value;
            var payment_source = document.getElementById('paiementsource_id_update').value;
            var date_paiement = document.getElementById('date_facturation_cheque_update').value;
            var adresse_postale = document.getElementById('adresse_postale_cheque_update').value;
            var memo = document.getElementById('memo_cheque_update').value;
            var type = document.getElementById('type-cheque').value;
            var id_cheque = document.getElementById('id-cheque').value;
            var id_depense = document.getElementById('id-depense').value;

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
                return index > 5;
            });

            var filtered_taxe = taxe.filter(function(value, index, arr){
                return index > 5;
            });

            var filtered_description = description.filter(function(value, index, arr){
                return index > 5;
            });

            var filtered_montant = montant.filter(function(value, index, arr){
                return index > 5;
            });

            filtered_compte_comptable.splice(-2,2)
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

            if(filtered_compte_comptable[0] == ''){
                filtered_compte_comptable = null;
            }
            // console.log(filtered_compte_comptable)
            // console.log(filtered_taxe)
            // console.log(filtered_description)
            // console.log(filtered_montant)


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


            var filtered_article = article_id.filter(function(value, index, arr){
                return index > 5;
            });

            var filtered_taxe_article = taxe_article.filter(function(value, index, arr){
                return index > 5;
            });

            var filtered_description_article = description_article.filter(function(value, index, arr){
                return index > 5;
            });

            var filtered_montant_article = montant_article.filter(function(value, index, arr){
                return index > 5;
            });

            var filtered_qte_article = qte_article.filter(function(value, index, arr){
                return index > 5;
            });

            filtered_article.splice(-1,1)
            filtered_taxe_article.splice(-1,1)
            filtered_montant_article.splice(-1,1)
            filtered_description_article.splice(-1,1)
            filtered_qte_article.splice(-1,1)

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
                    id: id_depense,
                    fournisseur: fournisseur,
                    date_facturation: date_paiement,
                    numero_cheque: numero_cheque,
                    adresse_postale: adresse_postale,
                    paiementsource_id: payment_source,
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
                    alert('Erreur lors de la modification du chèque')
                    console.log(error.responseJSON);
                }
            });

        });
    });
</script>

<script>
    $(document).ready(function() {

        // Bouton supprimer un chèque

        $(document).on("click", ".btn-delete-cheque", function () {
            var id = document.getElementById('id-depense').value;
            //alert(id)

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
