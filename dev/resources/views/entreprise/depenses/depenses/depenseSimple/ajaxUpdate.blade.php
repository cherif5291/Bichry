<script>
    $('#numero_reference_depense_update').keyup(function () {
      $('#depense_number_edit').text($(this).val());
    });
</script>

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

        $(document).on('click', '.depense-simple', function () {
            const _this = $(this);
            const depense_id = _this.attr('depense-id');

            findDepense(depense_id);

        });

        // Suppression Compte comptable

        $(document).on('click', '.delete-depense', function (event) {
            event.preventDefault()
            const _this = $(this);
            const panier_id = _this.attr('btn-delete-id');
            const depense_id = _this.attr('depense-id');

            deletePanier(panier_id, depense_id);

        });

        function findDepense(id){
            var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });
            const Fournisseurs = JSON.parse(document.getElementById('Fournisseurs-depense').value);
            const Clients = JSON.parse(document.getElementById('Client-depense').value);
            const SourcesPaiement = JSON.parse(document.getElementById('SourcesPaiement-depense').value);
            const ModePaiement = JSON.parse(document.getElementById('ModePaiement-depense').value);
            const Articles = JSON.parse(document.getElementById('articles_facture_depense').value);

            var depense_id = id
            var fournisseurSelectHTML = '<option value="" hidden>Choisir fournisseur</option>';
            var SourcesPaiementSelectHTML = '<option value="" hidden>Choisir Source de paiement</option>';
            var ModePaiementSelectHTML = '<option value="" hidden>Choisir mode de paiement</option>';
            var depenseTableHTML = "";
            var depenseTableHTML2 = "";

            var route = '{{ route("entreprise.depense.new.facture", ":id") }}';
            url = route.replace(':id', depense_id);

            $.ajax({
                url: url,
                type:"GET",
                data:{
                    _token: '{{csrf_token()}}',
                    id:depense_id,
                },
                success:function(response){

                    var table = response.depenses_paniers;
                    //console.log(response);

                    Fournisseurs.map(function(value, index){
                        if(response.depenses_simple.fournisseur_id > 0 && value.id == response.depenses_simple.fournisseur_id ){
                            var is_fournisseur = 'selected';
                        }
                        fournisseurSelectHTML += "<option value='F"+value.id+"'"+is_fournisseur+" >"+value.entreprise+"</option>";
                    });

                    Clients.map(function(value, index){
                        if(response.depenses_simple.clients_entreprise_id > 0 && value.id == response.depenses_simple.clients_entreprise_id){
                            var is_client = 'selected';
                        }
                        fournisseurSelectHTML += "<option value='C"+value.id+"'"+is_client+" >"+value.entreprise+"</option>";
                    });

                    SourcesPaiement.map(function(value, index){
                        SourcesPaiementSelectHTML += "<option value='"+value.id+"'"+(value.id == response.paiementsource_id ? 'selected' : '')+" >("+value.type+") "+value.nom+"</option>";
                    });

                    ModePaiement.map(function(value, index){
                        ModePaiementSelectHTML += "<option value='"+value.id+"'"+(value.id == response.depenses_simple.paiements_mode_id ? 'selected' : '')+" >"+value.nom+"</option>";
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
                                                "<td><a href='' class='delete-depense' depense-id='"+depense_id+"' btn-delete-id='"+value.id+"'><i class='fa fa-trash text-danger'></i></a></td></tr>";
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
                                            "<td><a href='' class='delete-depense' depense-id='"+depense_id+"' btn-delete-id='"+value.id+"'><i class='fa fa-trash text-danger'></i></a></td></tr>";
                        }
                    });

                    let route_delete = "{{route('depenses.delete', 'depense-id')}}";
                    $('#id_delete_route_depense').attr('href', route_delete.replace('depense-id', depense_id));

                    if(response.pieces_jointes.length > 0){
                        let piece = "{{ asset('data') }}";
                        $('#pj_depense_depenseSimple').attr('src', piece.replace('data', response.pieces_jointes[0].fichier));
                    }
                    $('#id-depense-simple').val(depense_id);
                    $("#fournisseur-depense").html(fournisseurSelectHTML);
                    $("#paiementsource_depense_update").html(SourcesPaiementSelectHTML);
                    $("#paiements_mode_depense_id").html(ModePaiementSelectHTML);
                    $(".table-categorie-depense-update").html(depenseTableHTML);
                    $(".table-depsimp-update").html(depenseTableHTML2);

                    $('#depense_number_edit').html(response.depenses_simple.reference);
                    $('#date_facturation_depense_update').val(response.depenses_simple.date_paiement);
                    $('#adresse_postale_cheque_update').val(response.depenses_simple.adresse_postale);
                    $('#numero_reference_depense_update').val(response.depenses_simple.reference);
                    $('#memo_depense_update').val(response.depenses_simple.note);
                    //$("#taux_taxe_depense").html("Total Taxe ("+taux_taxe+"%)");
                    $("#total_sans_taxe_depense").html(response.total_sans_taxe + " {{getCurrency()->sigle}}");
                    $(".total_ht").val(response.total_sans_taxe);
                    $("#taxe_depense").html(response.taxe + " {{getCurrency()->sigle}}");
                    $(".taxe").val(response.taxe);
                    $("#total_depense").html(response.total + " {{getCurrency()->sigle}}");
                    $(".tot_dep").val(response.total);

                    $("#amount_depense_depenseSimple_pay_update").html(formatNumber.format(response.total));

                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function deletePanier(id, depense_id){

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
                    findDepense(depense_id);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

    });
</script>

<script>

    var taxe_option = document.getElementById('taxe_value_dep_panier').value;
    //var Articles = document.getElementById('articles').value;
    var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });

    function addRowDepPanUp(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var colCount = table.rows[0].cells.length;



        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;

        row.id = 'row_dep_sim_up_'+rowCount;

        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;
        }

        var listitems= row.getElementsByTagName("input")
        for (i=0; i<listitems.length; i++) {
            listitems[i].setAttribute("oninput", "calculateDepSimUp('"+row.id+"')");
            var nam = listitems[i].getAttribute("name");
            listitems[i].setAttribute("id", nam+"_dep_sim_up_"+rowCount);
        }

        var tab = $('#test-body2Up').find('.trash_dep_sim_up')

        for (i=0; i<tab.length; i++) {
            tab[i].setAttribute("data-dep_sim_up", i);
        }

        var listSelect= row.getElementsByTagName("select")
        for (i=0; i<listSelect.length; i++) {
            listSelect[i].setAttribute("oninput", "calculateDepSimUp('"+row.id+"')");
            var nam = listSelect[i].getAttribute("name");
            listSelect[i].setAttribute("id", nam+"_dep_sim_up_"+rowCount);
        }
    }

    function calculateDepSimUp(elementID) {
        var mainRow = document.getElementById(elementID);
        var rowID = elementID.split('row_dep_sim_up_')[1];

        var article = $('#test-body2Up').find("select[id='comptes_comptable_id[]_dep_sim_up_"+rowID+"']")[0].value;
        var qte = $('#test-body2Up').find("input[id='qte[]_dep_sim_up_"+rowID+"']")[0].value;
        var montant = $('#test-body2Up').find("input[id='montant[]_dep_sim_up_"+rowID+"']")[0].value;
        var taxe_id = $('#test-body2Up').find("select[id='taxe_id[]_dep_sim_up_"+rowID+"']")[0].value;


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

        var MHT = parseFloat(document.getElementById('tot_ht_dep_sim_update').value.replace(/\s/g, ''));
        var MT = parseFloat(document.getElementById('tot_taxe_dep_sim_update').value.replace(/\s/g, ''));
        var MTTC = parseFloat(document.getElementById('tsanstaxe_dep_sim_update').value.replace(/\s/g, ''));

        // For compte comptable

        $(".total_ht_dep_sim_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe_dep_sim_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc_dep_sim_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MTTC += parseFloat(this.value);
            }
        });

        // For Article

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

        $("#total_sans_taxe_depense").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#taxe_depense").html(MT.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#total_depense").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#amount_depense_depenseSimple_pay_update").html(formatNumber.format(MTTC));


    }

    $(document).on("click", ".trash_dep_sim_up", function (e) {
        var table = document.getElementById('test-body2Up');
        var rowCount = table.rows.length;
        const _this = $(this);
        const classroom_id = _this.attr('data-dep_sim_up');

        var ttc = $('#test-body2Up').find("input[id='ttcDepSim_dep_sim_up_"+classroom_id+"']");
        var taxe_value = $('#test-body2Up').find("input[id='taxeDepSim_dep_sim_up_"+classroom_id+"']");
        var HT_value = $('#test-body2Up').find("input[id='htDepSim_dep_sim_up_"+classroom_id+"']");
        if(rowCount > 1){
            var TTC = parseFloat($('#total_depense').html()) - parseFloat(ttc[0].value);
            var MHT = parseFloat($('#total_sans_taxe_depense').html()) - parseFloat(HT_value[0].value);
            var Taxe = parseFloat($('#taxe_depense').html()) - parseFloat(taxe_value[0].value);

            if(taxe_value[0].value == '' || isNaN(taxe_value[0].value)){
                Taxe = parseFloat($('#taxe_depense').html());
            }

            if(!isNaN(TTC) && !isNaN(MHT) && !isNaN(Taxe)){
                $("#total_sans_taxe_depense").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#taxe_depense").html(Taxe.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#total_depense").html(TTC.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#amount_depense_depenseSimple_pay_update").html(formatNumber.format(TTC));
            }
            _this.parent().parent().remove();
        }
    });

</script>

<script>

    var taxe_option = document.getElementById('taxe_value').value;
    var Articles = document.getElementById('articles_facture_depense').value;
    var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });

    function addRowArDepSimUp(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var colCount = table.rows[0].cells.length;



        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;

        row.id = 'row_depsimArUp_'+rowCount;

        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;
        }

        var listitems= row.getElementsByTagName("input")
        for (i=0; i<listitems.length; i++) {
            listitems[i].setAttribute("oninput", "calculateArDepSimUp('"+row.id+"')");
            var nam = listitems[i].getAttribute("name");
            listitems[i].setAttribute("id", nam+"_depsimArUp_"+rowCount);
        }

        var tab = $('#depsimple-article-up').find('.trash_depsimArUp_up')

        for (i=0; i<tab.length; i++) {
            tab[i].setAttribute("data-ar-up", i);
        }

        var listSelect= row.getElementsByTagName("select")
        for (i=0; i<listSelect.length; i++) {
            listSelect[i].setAttribute("oninput", "calculateArDepSimUp('"+row.id+"')");
            var nam = listSelect[i].getAttribute("name");
            listSelect[i].setAttribute("id", nam+"_depsimArUp_"+rowCount);
        }
    }

    function calculateArDepSimUp(elementID) {
        var mainRow = document.getElementById(elementID);
        var rowID = elementID.split('row_depsimArUp_')[1];

        var article = $('#depsimple-article-up').find("select[id='article_id[]_depsimArUp_"+rowID+"']")[0].value;
        var qte = $('#depsimple-article-up').find("input[id='qte_article[]_depsimArUp_"+rowID+"']")[0].value;
        var montant = $('#depsimple-article-up').find("input[id='montant_article[]_depsimArUp_"+rowID+"']")[0];
        var taxe_id = $('#depsimple-article-up').find("select[id='taxe_article[]_depsimArUp_"+rowID+"']")[0].value;


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

        var MHT = parseFloat(document.getElementById('tot_ht_dep_sim_update').value.replace(/\s/g, ''));
        var MT = parseFloat(document.getElementById('tot_taxe_dep_sim_update').value.replace(/\s/g, ''));
        var MTTC = parseFloat(document.getElementById('tsanstaxe_dep_sim_update').value.replace(/\s/g, ''));

        // For Article

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

         // For Compte Comptable

        $(".total_ht_dep_sim_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe_dep_sim_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc_dep_sim_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MTTC += parseFloat(this.value);
            }
        });

        $("#total_sans_taxe_depense").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#taxe_depense").html(MT.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#total_depense").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#amount_depense_depenseSimple_pay_update").html(formatNumber.format(MTTC));


    }

    $(document).on("click", ".trash_depsimArUp_up", function (e) {
        var table = document.getElementById('depsimple-article-up');
        var rowCount = table.rows.length;
        const _this = $(this);
        const classroom_id = _this.attr('data-ar-up');

        var ttc = $('#depsimple-article-up').find("input[id='ttc_depsimArUp_"+classroom_id+"']");
        var taxe_value = $('#depsimple-article-up').find("input[id='taxe_depsimArUp_"+classroom_id+"']");
        var HT_value = $('#depsimple-article-up').find("input[id='ht_depsimArUp_"+classroom_id+"']");

        if(rowCount > 1){
            var TTC = parseFloat($('#total_depense').html()) - parseFloat(ttc[0].value);
            var MHT = parseFloat($('#total_sans_taxe_depense').html()) - parseFloat(HT_value[0].value);
            var Taxe = parseFloat($('#taxe_depense').html()) - parseFloat(taxe_value[0].value);

            if(taxe_value[0].value == '' || isNaN(taxe_value[0].value)){
                Taxe = parseFloat($('#taxe_depense').html());
            }

            if(!isNaN(TTC) && !isNaN(MHT) && !isNaN(Taxe)){
                $("#total_sans_taxe_depense").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#taxe_depense").html(Taxe.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#total_depense").html(TTC.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#amount_depense_depenseSimple_pay_update").html(formatNumber.format(TTC));
            }
            _this.parent().parent().remove();
        }
    });

</script>

<!-- Modification et envoie de donnée au controlleur -->

<script>
    $(document).ready(function() {

        $(document).on('click', '.btn-depenseSimple-submit', function (e) {
            //e.preventDefault();
            var fournisseur = document.getElementById('fournisseur-depense').value;
            var numero_reference = document.getElementById('numero_reference_depense_update').value;
            var payment_source = document.getElementById('paiementsource_depense_update').value;
            var date_paiement = document.getElementById('date_facturation_depense_update').value;
            var payment_mode = document.getElementById('paiements_mode_depense_id').value;
            var memo = document.getElementById('memo_depense_update').value;
            var type = document.getElementById('type-depense').value;
            var id_depense = document.getElementById('id-depense-simple').value;

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

            var i=0, j=0;
            for(i=0; i<compte_comptable.length; i++){
                if(compte_comptable[i] != ''){
                    break
                }
            }

            console.log(i);
            console.log(compte_comptable);
            var filtered_compte_comptable = compte_comptable.filter(function(value, index, arr){
                return index > 6;
            });

            var filtered_taxe = taxe.filter(function(value, index, arr){
                return index > 6;
            });

            var filtered_description = description.filter(function(value, index, arr){
                return index > 6;
            });

            var filtered_montant = montant.filter(function(value, index, arr){
                return index > 6;
            });

            filtered_compte_comptable.splice(-1,1)
            filtered_taxe.splice(-1,1)
            filtered_montant.splice(-1,1)
            filtered_description.splice(-1,1)

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
            console.log(filtered_compte_comptable)
            console.log(filtered_description)
            console.log(filtered_montant)
            console.log(filtered_taxe)

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

            //console.log(montant_article);
            for(j=0; j<montant_article.length; j++){
                if(montant_article[j] != ''){
                    break
                }
            }
            //console.log(j);
            var filtered_article = article_id.filter(function(value, index, arr){
                return index >= j;
            });

            var filtered_taxe_article = taxe_article.filter(function(value, index, arr){
                return index >= j;
            });

            var filtered_description_article = description_article.filter(function(value, index, arr){
                return index >= j;
            });

            var filtered_montant_article = montant_article.filter(function(value, index, arr){
                return index >= j;
            });

            var filtered_qte_article = qte_article.filter(function(value, index, arr){
                return index >= j;
            });

            // filtered_article.splice(-1,1)
            // filtered_qte_article.splice(-1,1)
            // filtered_taxe_article.splice(-1,1)
            // filtered_montant_article.splice(-1,1)
            // filtered_description_article.splice(-1,1)


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
                    date_paiement: date_paiement,
                    reference: numero_reference,
                    paiements_mode_id: payment_mode,
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
                    //alert('Mise à jour avec  succès')
                    console.log(response)
                },
                error: function(error) {

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
