<script>
    $('#numero_facturePop2').keyup(function () {
      $('#get_facture_number_popup2').text($(this).val());
    });

    // Recupération automatique du date d'échéance

    $('#date_facturationPop2').change(function(e){
        e.preventDefault();
        Date.prototype.addDays = function (days) {
            const date = new Date(this.valueOf());
            date.setDate(date.getDate() + days);
            return date;
        };
        var date = document.getElementById('date_facturationPop2').value;
        var echeance = new Date(date);
        var net = document.getElementById('modalitePop2').value;


        if(net == 1){
            var date_echeance = echeance.addDays(0).toISOString().slice(0, 10);
        }else if(net == 2){
            var date_echeance = echeance.addDays(7).toISOString().slice(0, 10);
        }else if(net == 3){
            var date_echeance = echeance.addDays(15).toISOString().slice(0, 10);
        }else if(net == 4){
            var date_echeance = echeance.addDays(30).toISOString().slice(0, 10);
        }else if(net == 5){
            var date_echeance = echeance.addDays(60).toISOString().slice(0, 10);
        }else if(net == 6){
            var date_echeance = echeance.addDays(120).toISOString().slice(0, 10);
        }

        $('#echeancePop2').val(date_echeance);
    });

    $('#modalitePop2').change(function(e){
        e.preventDefault();
        Date.prototype.addDays = function (days) {
            const date = new Date(this.valueOf());
            date.setDate(date.getDate() + days);
            return date;
        };
        var date = document.getElementById('date_facturationPop2').value;
        var echeance = new Date(date);
        var net = document.getElementById('modalitePop2').value;


        if(net == 1){
            var date_echeance = echeance.addDays(0).toISOString().slice(0, 10);
        }else if(net == 2){
            var date_echeance = echeance.addDays(7).toISOString().slice(0, 10);
        }else if(net == 3){
            var date_echeance = echeance.addDays(15).toISOString().slice(0, 10);
        }else if(net == 4){
            var date_echeance = echeance.addDays(30).toISOString().slice(0, 10);
        }else if(net == 5){
            var date_echeance = echeance.addDays(60).toISOString().slice(0, 10);
        }else if(net == 6){
            var date_echeance = echeance.addDays(120).toISOString().slice(0, 10);
        }
        $('#echeancePop2').val(date_echeance);
    });

    // Fin recupération echéance
</script>

<script>
    $(document).ready(function() {

        // Bouton ajouter un fournisseur

        $(document).on("click", "#addFournisseur2", function () {
            $('#myModal').modal('show');
        });

        $('select[name=fournisseur]').change(function() {
            if ($(this).val() == 'addFournisseur')
            {
                $('#myModal').modal('show');
            }
        });

        // Bouton ajouter modalité sur la liste d'option

        $('select[name=paiements_modalite_id]').change(function() {
            if ($(this).val() == 'addModalite')
            {
                $('#modaliteModal').modal('show');
            }
        });

        // Bouton pour recupérer l'id dépense sur le tableau de la page index

        $(document).on('click', '.btn-edit-facture', function () {
            const _this = $(this);
            const facture_id = _this.attr('facture-id');
            //alert(facture_id)
            findDepense(facture_id);

        });

        // Suppression Compte comptable

        $(document).on('click', '.deleteDep', function (event) {
            event.preventDefault()
            const _this = $(this);
            const panier_id = _this.attr('btn-delete-id');
            const facture_id = _this.attr('depense-id');

            deletePanier(panier_id, facture_id);

        });

        function findDepense(id){
            var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });
            const Fournisseurs = JSON.parse(document.getElementById('FournisseursPop2').value);
            const Clients = JSON.parse(document.getElementById('ClientPop2').value);
            const Modalites = JSON.parse(document.getElementById('ModalitesPop2').value);
            const Articles = JSON.parse(document.getElementById('articles_facture_depense').value);

            //console.log(Articles)

            var facture_id = id
            var fournisseurSelectHTML = '<option value="" hidden>Choisir fournisseur</option>';
            var modaliteSelectHTML = '<option value="" hidden>Choisir modalités</option>';
            var depenseTableHTML = "";
            var depenseTableHTML2 = "";

            var route = '{{ route("entreprise.depense.new.facture", ":id") }}';
            url = route.replace(':id', facture_id);

            $.ajax({
                url: url,
                type:"GET",
                data:{
                    _token: '{{csrf_token()}}',
                    id:facture_id,
                    ajax: true,
                },
                success:function(response){

                    var table = response.depenses_paniers;

                    Fournisseurs.map(function(value, index){
                        if(response.fournisseur_id > 0 && value.id == response.fournisseur_id ){
                            var is_fournisseur = 'selected';
                        }
                        fournisseurSelectHTML += "<option value='F"+value.id+"'"+is_fournisseur+" >"+value.entreprise+"</option>";
                    });

                    Clients.map(function(value, index){
                        if(response.clients_entreprise_id > 0 && value.id == response.clients_entreprise_id){
                            var is_client = 'selected';
                        }
                        fournisseurSelectHTML += "<option value='C"+value.id+"'"+is_client+" >"+value.entreprise+"</option>";
                    });


                    Modalites.map(function(value, index){
                        modaliteSelectHTML += "<option value='"+value.id+"'"+(value.id == response.facture.paiements_modalite_id ? 'selected' : '')+">"+value.nom+"</option>";
                    });

                    var taux_taxe = 0;

                    table.map(function(value, index){
                        if(value.comptes_comptable_id){
                            taux_taxe += value.taux_taxe;
                            var mTaxe = (value.montant * value.taux_taxe)/100;
                            var mTTC = value.montant + mTaxe;

                            depenseTableHTML += "<tr><td class='align-middle'>"+value.designation+"</td>"+
                                                "<td class='align-middle text-start'>"+value.description+"</td>"+
                                                "<td>"+formatNumber.format(value.montant)+"</td>"+
                                                "<td>"+value.taux_taxe+"%</td>"+
                                                //"<td>"+formatNumber.format(mTaxe)+"</td>"+
                                                "<td>"+formatNumber.format(mTTC)+"</td>"+
                                                "<td><a href='' class='deleteDep' depense-id='"+facture_id+"' btn-delete-id='"+value.id+"'><i class='fa fa-trash text-danger'></i></a></td></tr>";
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
                                            // "<td>"+formatNumber.format(mHT)+"</td>"+
                                            "<td>"+value.taux_taxe+"%</td>"+
                                            //"<td>"+formatNumber.format(mTaxe)+"</td>"+
                                            "<td>"+formatNumber.format(mTTC)+"</td>"+
                                            "<td><a href='' class='deleteDep' depense-id='"+facture_id+"' btn-delete-id='"+value.id+"'><i class='fa fa-trash text-danger'></i></a></td></tr>";
                        }
                    });

                    console.log(response);
                    let route_delete = "{{route('depenses.delete', 'facture-id')}}";
                    $('#id_delete_route_facture_depense').attr('href', route_delete.replace('facture-id', facture_id));

                    if(response.pieces_jointes.length > 0){
                        let piece = "{{ asset('data') }}";
                        $('#pj_depense_facture').attr('src', piece.replace('data', response.pieces_jointes[0].fichier));
                    }

                    $('#idPop2').val(facture_id);
                    $("#fournisseurPop2").html(fournisseurSelectHTML);
                    $("#modalitePop2").html(modaliteSelectHTML);
                    $(".tablePop2").html(depenseTableHTML);
                    $(".tablePop3").html(depenseTableHTML2);

                    $('#adresse_facturationPop2').val(response.facture.adresse_facturation);
                    $('#depense_idPop2').val(response.facture.id);

                    $('#numero_facturePop2').val(response.facture.numero_facture);
                    $('#get_facture_number_popup2').html(response.facture.numero_facture);
                    $('#date_facturationPop2').val(response.facture.date_facturation);
                    $('#echeancePop2').val(response.facture.echeance);
                    $('#memoPop2').val(response.facture.message);

                    //$("#taux_taxe_facture").html("Total Taxe ("+taux_taxe+"%)");
                    $("#total_sans_taxe_facture").html(response.total_sans_taxe.toFixed(2) + " {{getCurrency()->sigle}}");
                    $('.ht').val(response.total_sans_taxe);
                    $("#taxe_facture").html(response.taxe.toFixed(2) + " {{getCurrency()->sigle}}");
                    $('.tax').val(response.taxe);
                    $("#total_facture").html(response.total.toFixed(2) + " {{getCurrency()->sigle}}");
                    $('.tot').val(response.total);

                    $("#amount_depense_facture_pay_update").html(formatNumber.format(response.total));
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function deletePanier(id, facture_id){

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
                    findDepense(facture_id);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

    });
</script>

<script>

    var taxe_option = document.getElementById('taxe_value').value;
    var CompteComptables = document.getElementById('compte_compta').value;
    var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });

    function addRowComUp(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var colCount = table.rows[0].cells.length;



        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;

        row.id = 'row_com_up_'+rowCount;

        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;
        }

        var listitems= row.getElementsByTagName("input")
        for (i=0; i<listitems.length; i++) {
            listitems[i].setAttribute("oninput", "calculateComUp('"+row.id+"')");
            var nam = listitems[i].getAttribute("name");
            listitems[i].setAttribute("id", nam+"_up_"+rowCount);
        }

        var tab = $('#test-body-up').find('.trash_com_up')

        for (i=0; i<tab.length; i++) {
            tab[i].setAttribute("data-com-up", i);
        }

        var listSelect= row.getElementsByTagName("select")
        for (i=0; i<listSelect.length; i++) {
            listSelect[i].setAttribute("oninput", "calculateComUp('"+row.id+"')");
            var nam = listSelect[i].getAttribute("name");
            listSelect[i].setAttribute("id", nam+"_up_"+rowCount);
        }
    }

    function calculateComUp(elementID) {
        var mainRow = document.getElementById(elementID);
        var rowID = elementID.split('row_com_up_')[1];

        //var article = $('#test-body-up').find("select[id='comptes_comptable_id[]"+rowID+"']")[0].value;
        var qte = $('#test-body-up').find("input[id='qte[]_up_"+rowID+"']")[0].value;
        var montant = $('#test-body-up').find("input[id='montant[]_up_"+rowID+"']")[0].value;
        var taxe_id = $('#test-body-up').find("select[id='taxe_id[]_up_"+rowID+"']")[0].value;


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

        var MHT = parseFloat(document.getElementById('ht').value.replace(/\s/g, ''));
        var MT = parseFloat(document.getElementById('tax').value.replace(/\s/g, ''));
        var MTTC = parseFloat(document.getElementById('tot').value.replace(/\s/g, ''));

        // For Compte Comptable

        $(".total_ht_com_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe_com_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc_com_up").each(function () {
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


        $("#total_sans_taxe_facture").html(formatNumber.format(MHT));
        $("#taxe_facture").html(formatNumber.format(MT));
        $("#total_facture").html(formatNumber.format(MTTC));
        $("#amount_depense_facture_pay_update").html(formatNumber.format(MTTC));


    }

    $(document).on("click", ".trash_com_up", function (e) {
        var table = document.getElementById('test-body-up');
        var rowCount = table.rows.length;
        const _this = $(this);
        const classroom_id = _this.attr('data-com-up');

        var ttc = $('#test-body-up').find("input[id='ttc_up_"+classroom_id+"']");
        var taxe_value = $('#test-body-up').find("input[id='total_taxe_up_"+classroom_id+"']");
        var HT_value = $('#test-body-up').find("input[id='total_ht_up_"+classroom_id+"']");

        if(rowCount > 1){
            var TTC = parseFloat($('#total_facture').html()) - parseFloat(ttc[0].value);
            var MHT = parseFloat($('#total_sans_taxe_facture').html()) - parseFloat(HT_value[0].value);
            var Taxe = parseFloat($('#taxe_facture').html()) - parseFloat(taxe_value[0].value);

            if(taxe_value[0].value == '' || isNaN(taxe_value[0].value)){
                Taxe = parseFloat($('#taxe_facture').html());
            }

            if(!isNaN(TTC) && !isNaN(MHT) && !isNaN(Taxe)){
                $("#total_sans_taxe_facture").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#taxe_facture").html(Taxe.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#total_facture").html(TTC.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#amount_depense_facture_pay_update").html(formatNumber.format(TTC));
            }
            _this.parent().parent().remove();
        }
    });

</script>

<script>

    var taxe_option = document.getElementById('taxe_value').value;
    var Articles = document.getElementById('articles_facture_depense').value;
    var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });

    function addRowArUp(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var colCount = table.rows[0].cells.length;



        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;

        row.id = 'row_ar_'+rowCount;

        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;
        }

        var listitems= row.getElementsByTagName("input")
        for (i=0; i<listitems.length; i++) {
            listitems[i].setAttribute("oninput", "calculateArUp('"+row.id+"')");
            var nam = listitems[i].getAttribute("name");
            listitems[i].setAttribute("id", nam+"_ar_"+rowCount);
        }

        var tab = $('#facture-article-up').find('.trash_ar_up')

        for (i=0; i<tab.length; i++) {
            tab[i].setAttribute("data-ar-up", i);
        }

        var listSelect= row.getElementsByTagName("select")
        for (i=0; i<listSelect.length; i++) {
            listSelect[i].setAttribute("oninput", "calculateArUp('"+row.id+"')");
            var nam = listSelect[i].getAttribute("name");
            listSelect[i].setAttribute("id", nam+"_ar_"+rowCount);
        }
    }

    function calculateArUp(elementID) {
        var mainRow = document.getElementById(elementID);
        var rowID = elementID.split('row_ar_')[1];

        var article = $('#facture-article-up').find("select[id='article_id[]_ar_"+rowID+"']")[0].value;
        var qte = $('#facture-article-up').find("input[id='qte_article[]_ar_"+rowID+"']")[0].value;
        var montant = $('#facture-article-up').find("input[id='montant_article[]_ar_"+rowID+"']")[0];
        var taxe_id = $('#facture-article-up').find("select[id='taxe_article[]_ar_"+rowID+"']")[0].value;


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

        var MHT = parseFloat(document.getElementById('ht').value.replace(/\s/g, ''));
        var MT = parseFloat(document.getElementById('tax').value.replace(/\s/g, ''));
        var MTTC = parseFloat(document.getElementById('tot').value.replace(/\s/g, ''));

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

         $(".total_ht_com_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MHT += parseFloat(this.value);
            }
        });

        $(".total_taxe_com_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MT += parseFloat(this.value);
            }
        });

        $(".ttc_com_up").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
                MTTC += parseFloat(this.value);
            }
        });

        $("#total_sans_taxe_facture").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#taxe_facture").html(MT.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#total_facture").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#amount_depense_facture_pay_update").html(formatNumber.format(MTTC));


    }

    $(document).on("click", ".trash_ar_up", function (e) {
        var table = document.getElementById('facture-article-up');
        var rowCount = table.rows.length;
        const _this = $(this);
        const classroom_id = _this.attr('data-ar-up');

        var ttc = $('#facture-article-up').find("input[id='ttc_ar_"+classroom_id+"']");
        var taxe_value = $('#facture-article-up').find("input[id='taxe_ar_"+classroom_id+"']");
        var HT_value = $('#facture-article-up').find("input[id='ht_ar_"+classroom_id+"']");

        if(rowCount > 1){
            var TTC = parseFloat($('#total_facture').html()) - parseFloat(ttc[0].value);
            var MHT = parseFloat($('#total_sans_taxe_facture').html()) - parseFloat(HT_value[0].value);
            var Taxe = parseFloat($('#taxe_facture').html()) - parseFloat(taxe_value[0].value);

            if(taxe_value[0].value == '' || isNaN(taxe_value[0].value)){
                Taxe = parseFloat($('#taxe_facture').html());
            }

            if(!isNaN(TTC) && !isNaN(MHT) && !isNaN(Taxe)){
                $("#total_sans_taxe_facture").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#taxe_facture").html(Taxe.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#total_facture").html(TTC.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#amount_depense_facture_pay_update").html(formatNumber.format(TTC));
            }
            _this.parent().parent().remove();
        }
    });

</script>

<!-- Modification et envoie de donnée au controlleur -->

<script>
    $(document).ready(function() {

        $(document).on('click', '.btn-depensePop2-submit', function (e) {
            // e.preventDefault();
            var fournisseur = document.getElementById('fournisseurPop2').value;
            var adresse_postale = document.getElementById('adresse_facturationPop2').value;
            var numero_facture = document.getElementById('numero_facturePop2').value;
            var modalite = document.getElementById('modalitePop2').value;
            var date_facture = document.getElementById('date_facturationPop2').value;
            var date_echeance = document.getElementById('echeancePop2').value;
            var memo = document.getElementById('memoPop2').value;
            var hastaxe = document.getElementById('has_taxePop2').value;
            var type = document.getElementById('typePop2').value;
            var id = document.getElementById('idPop2').value;

            // for compte comptable

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

            //console.log(compte_comptable);
            var j=0, i=0;
            for(j=0; j<compte_comptable.length; j++){
                if(compte_comptable[j] != ''){
                    break
                }
            }
            //console.log(j);
            // for compte comptable
            //console.log(compte_comptable);
            var filtered_compte_comptable = compte_comptable.filter(function(value, index, arr){
                return index > j;
            });


            var filtered_taxe = taxe.filter(function(value, index, arr){
                return index > j;
            });

            var filtered_description = description.filter(function(value, index, arr){
                return index > j;
            });

            var filtered_montant = montant.filter(function(value, index, arr){
                return index > j;
            });

            filtered_compte_comptable.splice(-3,3)
            filtered_taxe.splice(-3,3)
            filtered_montant.splice(-3,3)
            filtered_description.splice(-3,3)


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
            console.log(article_id);
            for(i=0; i<article_id.length; i++){
                if(article_id[i] != ''){
                    break
                }
            }
            console.log(i);
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

            filtered_article.splice(-2,2)
            filtered_qte_article.splice(-2,2)
            filtered_taxe_article.splice(-2,2)
            filtered_montant_article.splice(-2,2)
            filtered_description_article.splice(-2,2)


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
                    id: id,
                    fournisseur: fournisseur,
                    date_facturation: date_facture,
                    echeance: date_echeance,
                    taxe_id: filtered_taxe,
                    numero_facture: numero_facture,
                    adresse_postale: adresse_postale,
                    has_taxe: hastaxe,
                    paiements_modalite_id: modalite,
                    note: memo,
                    comptes_comptable_id: filtered_compte_comptable,
                    type: type,
                    montant: filtered_montant,
                    description: filtered_description,
                    article_id: filtered_article,
                    description_article: filtered_description_article,
                    qte_article: filtered_qte_article,
                    montant_article: filtered_montant_article,
                    taxe_article: filtered_taxe_article

                },
                success:function(response){
                    alert('Mise à jour avec  succès')
                },
                error: function(error) {
                    alert(error.responseJSON.message)
                    console.log(error);
                }
            });

        });
    });
</script>

