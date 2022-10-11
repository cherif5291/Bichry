<script>
    $('#numero_devis_update').keyup(function () {
      $('#devis_number_com_update').text($(this).val());
    });

    // Recupération automatique du date d'échéance

    $('#date_facturation_update').change(function(e){
        e.preventDefault();
        Date.prototype.addDays = function (days) {
            const date = new Date(this.valueOf());
            date.setDate(date.getDate() + days);
            return date;
        };
        var date = document.getElementById('date_facturation_update').value;
        var echeance = new Date(date);
        var net = document.getElementById('modaliteSelect').value;
        const Modalites = JSON.parse(document.getElementById('Modalites').value);
        var date_echeance = '';

        var date_echeance = '';

        Modalites.map(function(value, index){
            if(value.id == net){
                date_echeance = echeance.addDays(value.duree).toISOString().slice(0, 10);
            }
        });

        $('#echeance_update').val(date_echeance);
    });

    $('#modaliteSelect').change(function(e){
        e.preventDefault();
        Date.prototype.addDays = function (days) {
            const date = new Date(this.valueOf());
            date.setDate(date.getDate() + days);
            return date;
        };
        var date = document.getElementById('date_facturation_update').value;
        var echeance = new Date(date);
        var net = document.getElementById('modaliteSelect').value;
        const Modalites = JSON.parse(document.getElementById('Modalites').value);
        var date_echeance = '';

        var date_echeance = '';

        Modalites.map(function(value, index){
            if(value.id == net){
                date_echeance = echeance.addDays(value.duree).toISOString().slice(0, 10);
            }
        });
        $('#echeance_update').val(date_echeance);
    });

    // Fin recupération echéance

</script>

<script>

    var taxe_option = document.getElementById('taxe_value').value;
    var Articles = document.getElementById('articles').value;
    var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });

    function addRowUpdate(tableID) {

        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var colCount = table.rows[0].cells.length;

        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;

        row.id = 'row_up_'+rowCount;

        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;
        }

        var listitems= row.getElementsByTagName("input")
        for (i=0; i<listitems.length; i++) {
            listitems[i].setAttribute("oninput", "calculateUpdate('"+row.id+"')");
            var nam = listitems[i].getAttribute("name");
            listitems[i].setAttribute("id", nam+"_up_"+rowCount);
        }

        var tab = $('#dataTableUpdate').find('.trash_edit')

        for (i=0; i<tab.length; i++) {
            tab[i].setAttribute("data-id", i);
        }

        var listSelect= row.getElementsByTagName("select")
        for (i=0; i<listSelect.length; i++) {
            listSelect[i].setAttribute("oninput", "calculateUpdate('"+row.id+"')");
            var nam = listSelect[i].getAttribute("name");
            listSelect[i].setAttribute("id", nam+"_up_"+rowCount);
        }
    }

    function calculateUpdate(elementID) {
        var mainRow = document.getElementById(elementID);
        var rowID = elementID.split('row_up_')[1];

        var article = $('#dataTableUpdate').find("select[id='article_id[]_up_"+rowID+"']")[0].value;
        var qte = $('#dataTableUpdate').find("input[id='qte[]_up_"+rowID+"']")[0].value;
        var montant = $('#dataTableUpdate').find("input[id='montant[]_up_"+rowID+"']")[0];
        var taxe_id = $('#dataTableUpdate').find("select[id='taxe_id[]_up_"+rowID+"']")[0].value;


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

        // var MHT = 0;
        // var MT = 0;
        // var MTTC = 0;

        var MHT = parseFloat(document.getElementById('tot_ht').value.replace(/\s/g, ''));
        var MT = parseFloat(document.getElementById('tot_taxe').value.replace(/\s/g, ''));
        var MTTC = parseFloat(document.getElementById('tsanstaxe').value.replace(/\s/g, ''));


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

        $("#taxe_devis").html(MT.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#total_sans_taxe_devis").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#total_devis").html(MTTC.toFixed(2) + " {{getCurrency()->sigle}}");
        $("#amount_commercial_devis_pay_update").html(formatNumber.format(MTTC));


    }

    $(document).on("click", ".trash_edit", function (e) {
        var table = document.getElementById('dataTableUpdate');
        var rowCount = table.rows.length;
        const _this = $(this);
        const classroom_id = _this.attr('data-id');
        var ttc = $('#dataTableUpdate').find("input[id='ttc_up_"+classroom_id+"']");
        var taxe_value = $('#dataTableUpdate').find("input[id='total_taxe_up_"+classroom_id+"']");
        var HT_value = $('#dataTableUpdate').find("input[id='total_ht_up_"+classroom_id+"']");


        if(rowCount > 1){

            if(isNaN(ttc[0].value)){ttc[0].value = 0 }
            if(isNaN(taxe_value[0].value)){taxe_value[0].value = 0 }
            if(isNaN(HT_value[0].value)){HT_value[0].value = 0 }

            var TTC = parseFloat($("#total_devis").html().replace(/\s/g, '')) - parseFloat(ttc[0].value);
            var MHT = parseFloat($("#total_sans_taxe_devis").html().replace(/\s/g, '')) - parseFloat(HT_value[0].value);
            var Taxe = parseFloat($("#taxe_devis").html().replace(/\s/g, '')) - parseFloat(taxe_value[0].value);

            if(taxe_value[0].value == '' || isNaN(taxe_value[0].value)){
                Taxe = parseFloat($('#taxe_devis').html());
            }

            if(!isNaN(TTC) && !isNaN(MHT) && !isNaN(Taxe)){
                $("#total_sans_taxe_devis").html(MHT.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#taxe_devis").html(Taxe.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#total_devis").html(TTC.toFixed(2) + " {{getCurrency()->sigle}}");
                $("#amount_commercial_devis_pay_update").html(formatNumber.format(TTC));
            }

            _this.parent().parent().remove();
        }
    });

</script>

<script>
    $(document).ready(function() {


        // Bouton pour recupérer l'id dépense sur le tableau de la page index

        $(document).on('click', '.btn-edit-devis', function () {
            const _this = $(this);
            const devis_id = _this.attr('devis-id');

            finddevisCommercial(devis_id);

        });



        function finddevisCommercial(id){
            const Clients = JSON.parse(document.getElementById('Clients').value);
            const Articles = JSON.parse(document.getElementById('Articles').value);
            const Modalites = JSON.parse(document.getElementById('Modalites').value);
            var formatNumber = Intl.NumberFormat('{{getCurrency()->formatNumeric}}', { style: 'currency', currency: '{{getCurrency()->code}}' });

            var devis_id = id
            var clientSelectHTML = '<option  hidden>Choisir un client</option>';
            var modaliteSelectHTML = '<option  hidden>Choisir une modalite</option>';
            var depenseTableHTML = "";

            var route = '{{ route("entreprise.devis.get.devis", ":id") }}';
            url = route.replace(':id', devis_id);

            $.ajax({
                url:url,
                type:"GET",
                data:{
                    _token: '{{csrf_token()}}',
                    id:devis_id,
                },
                success:function(response){

                    //console.log(response)
                    var table = response.depenses_paniers;

                    Clients.map(function(value, index){
                        if(response.clients_entreprise_id > 0 && value.id == response.clients_entreprise_id ){
                            var is_fournisseur = 'selected';
                        }
                        clientSelectHTML += "<option value='C"+value.id+"'"+is_fournisseur+" >"+value.entreprise+"</option>";
                    });

                    Modalites.map(function(value, index){
                        modaliteSelectHTML += "<option value='"+value.id+"'"+(value.id == response.paiements_modalite_id ? 'selected' : '')+" >"+value.nom+"</option>";
                    });

                    var taux_taxe = 0;
                    table.map(function(value, index){
                        taux_taxe += value.taux_taxe;
                        var mHT = value.qte * value.montant;
                        var mTaxe = (mHT * value.taux_taxe)/100;
                        var mTTC = mHT + mTaxe;

                            Articles.map(function(art, index){
                                if(art.id == value.article_id){
                                    depenseTableHTML += "<tr><td class='align-middle'>"+art.nom+"</td>";
                                }
                            });

                        depenseTableHTML += "<td class='align-middle text-start'>"+value.description+"</td>"+
                                            "<td>"+value.qte+"</td>"+
                                            "<td>"+ formatNumber.format(value.montant) +"</td>"+
                                            //"<td>"+ formatNumber.format(mHT) +"</td>"+
                                            "<td>"+value.taux_taxe+"%</td>"+
                                            //"<td>"+ formatNumber.format(mTaxe) +"</td>"+
                                            "<td>"+ formatNumber.format(mTTC) +"</td>"+
                                            "<td><a href='' class='delete-cheque' cheque-id='"+devis_id+"' btn-delete-id='"+value.id+"'><i class='fa fa-trash text-danger'></i></a></td></tr>";

                    });
                    //alert(parseFloat(response.total_sans_taxe))
                    //let format_price = "{!! formatpriceth( 'price', getCurrency()) !!}";

                    let route_delete = "{{route('admin.devis.recu.delete', 'devis-id')}}";
                    $('#id_delete_devis').attr('href', route_delete.replace('devis-id', devis_id));

                    if (response.pieces_jointes.length > 0) {
                        let piece = "{{ asset('data') }}";
                        $('#pj_devis_devis').attr('src', piece.replace('data', response.pieces_jointes[0].fichier));
                    }

                    $('#id-devis').val(devis_id);
                    $("#clients").html(clientSelectHTML);
                    $("#modaliteSelect").html(modaliteSelectHTML);
                    $(".table-categorie-devis-com").html(depenseTableHTML);

                    $('#devis_number_com_update').html(response.numero_devis);
                    $('#date_facturation_update').val(response.date_facturation);
                    $('#echeance_update').val(response.echeance);
                    $('#adresse_facturation_update').val(response.adresse_facturation);
                    $('#numero_devis_update').val(response.numero_devis);
                    $('#cc_cci_update_fac_com').val(response.cc_cci);
                    $('#message_update').val(response.message);
                    $('#message_affiche_update').val(response.message_affiche);

                    //$("#taux_taxe_devis").html("Taxe ("+taux_taxe+"%)");
                    $(".taux_taxe_devis").val(taux_taxe);
                    $("#total_sans_taxe_devis").html(response.total_sans_taxe + " {{getCurrency()->sigle}}");
                    $(".total_sans_taxe_devis").val(response.total_sans_taxe);
                    $("#taxe_devis").html(response.taxe + " {{getCurrency()->sigle}}");
                    $(".taxe_devis").val(response.taxe);
                    $("#total_devis").html(response.total + " {{getCurrency()->sigle}}");
                    $(".total_devis").val(response.total);
                    $("#amount_commercial_devis_pay_update").html(formatNumber.format(response.total));


                },
                error: function(error) {
                    console.log(error.responseJSON.message);
                }
            });
        }

        // Suppression Compte comptable

        $(document).on('click', '.delete-cheque', function (event) {
            event.preventDefault()
            const _this = $(this);
            const panier_id = _this.attr('btn-delete-id');
            const devis_id = _this.attr('cheque-id');

            deletePanierdevisCommercial(panier_id, devis_id);

        });

        function deletePanierdevisCommercial(id, devis_id){
            var route = '{{ route("admin.devis.panier.delete", ":id") }}';
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
                    finddevisCommercial(devis_id);
                },
                error: function(error) {
                    //console.log(error);
                }
            });
        }

    });
</script>

<!-- Modification et envoie de donnée au controlleur -->

<script>
    $(document).ready(function() {

        $(document).on('click', '.btn-devis-com-submit', function (e) {
            //e.preventDefault();
            var client = document.getElementById('clients').value;
            var numero_devis = document.getElementById('numero_devis_update').value;
            var date_facturation = document.getElementById('date_facturation_update').value;
            var echeance = document.getElementById('echeance_update').value;
            var adresse_facturation = document.getElementById('adresse_facturation_update').value;
            var cc_cci = document.getElementById('cc_cci_update_fac_com').value;
            var message = document.getElementById('message_update').value;
            var paiements_modalite_id = document.getElementById('modaliteSelect').value;
            var message_affiche = document.getElementById('message_affiche_update').value;
            var id_devis = document.getElementById('id-devis').value;
            var type = "devis";


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
                return index > 0;
            });

            var filtered_taxe = taxe.filter(function(value, index, arr){
                return index > 0;
            });

            var filtered_description = description.filter(function(value, index, arr){
                return index > 0;
            });

            var filtered_qte = qte.filter(function(value, index, arr){
                return index > 0;
            });

            var filtered_montant = montant.filter(function(value, index, arr){
                return index > 0;
            });

            filtered_article.splice(-3,3)
            filtered_qte.splice(-3,3)
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

            filtered_qte.map(function(value, index) {
                if(value == ''){
                    filtered_qte[index] = '1';
                }
            });
            console.log(articles);
            console.log(filtered_article);
            if(filtered_article[0] == ''){
                filtered_article = null;
            }

            $.ajax({
                url:"{{route('entreprise.devis.update.devis')}}",
                type:"POST",
                data:{
                    _token: '{{csrf_token()}}',
                    id: id_devis,
                    fournisseur: client,
                    date_facturation: date_facturation,
                    echeance: echeance,
                    numero_devis: numero_devis,
                    cc_cci: cc_cci,
                    adresse_facturation: adresse_facturation,
                    paiements_modalite_id: paiements_modalite_id,
                    message: message,
                    message_affiche: message_affiche,
                    type: type,
                    article_id: filtered_article,
                    montant: filtered_montant,
                    qte: filtered_qte,
                    taxe_id: filtered_taxe,
                    description: filtered_description

                },
                success:function(response){
                    alert('Mise à jour avec  succès')
                    console.log(response)
                },
                error: function(error) {
                    alert(error.responseJSON)
                    console.log(error.responseJSON);
                }
            });

        });
    });
</script>

