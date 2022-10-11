

<!-- Ajout de nouveau ligne de catégorie -->

<script type="text/javascript">
    $(document).ready(function() {
       var row=1;
       $(document).on("click", "#add-cheque", function (e) {

            var new_Chequerow = '<tr id="row' + row + '">'+
                           '<td><select name="comptes_comptable_id[]" id="compte'+row+'" class="form-select mb-3">'+
                           '</select></td>'+
                           '<td><input name="description[]" placeholder="Description" type="text" class="form-control" /></td>'+
                           '<td><input name="montant[]" type="number" placeholder="Montant" class="form-control" /></td>'+
                           '<td><select name="taxe_id[]" id="taxeSelect'+ row +'" class="form-select mb-3">'+
                           '</select></td>'+
                           '<td><input class="delete-cheque-row btn btn-danger" type="button" value="Supprimer" /></td>'+
                           '</tr>';
           $('#cheque-categorie-table').append(new_Chequerow);

           $('#compte'+ row +'').html('<option value="" hidden>Choisir une catégorie</option>');
           $('#taxeSelect'+ row +'').html('<option value="-1" hidden>Pas de taxe</option>');


           var compte_option = document.getElementById('compte_compta').value;
           var taxe_option = document.getElementById('taxe_value').value;

           var select1 = JSON.parse(compte_option);
           var select2 = JSON.parse(taxe_option);


           select1.map(function(value, index){
               $('#compte'+ row +'').append("<option value='"+value.id+"'>"+value.nom+"</option>");
           });

           select2.map(function(value, index){
               $('#taxeSelect'+ row +'').append("<option value='"+value.id+"'>"+value.nom+" ("+value.taux+"%)</option>");
           });

           row++;
           return false;
       });

       // Remove row of compte comptable
       $(document).on("click", ".delete-cheque-row", function () {

       //  alert("deleting row#"+row);
           if(row>1) {
               $(this).closest('tr').remove();
               row--;
           }
           return false;
       });
   });
</script>



<script type="text/javascript">
    $(document).ready(function() {
       var row=1;
       $(document).on("click", "#add-depense", function (e) {

            var depenseSimple = '<tr id="row' + row + '">'+
                           '<td><select name="comptes_comptable_id[]" id="compte'+row+'" class="form-select mb-3">'+
                           '</select></td>'+
                           '<td><input name="description[]" placeholder="Description" type="text" class="form-control" /></td>'+
                           '<td><input name="montant[]" type="number" placeholder="Montant" class="form-control" /></td>'+
                           '<td><select name="taxe_id[]" id="taxeSelect'+ row +'" class="form-select mb-3">'+
                           '</select></td>'+
                           '<td><input class="delete-row btn btn-danger" type="button" value="Supprimer" /></td>'+
                           '</tr>';
           $('#test-body2').append(depenseSimple);

           $('#compte'+ row +'').html('<option value="" hidden>Choisir une catégorie</option>');
           $('#taxeSelect'+ row +'').html('<option value="-1" hidden>Pas de taxe</option>');


           var compte_option = document.getElementById('compte_compta').value;
           var taxe_option = document.getElementById('taxe_value').value;

           var select1 = JSON.parse(compte_option);
           var select2 = JSON.parse(taxe_option);


           select1.map(function(value, index){
               $('#compte'+ row +'').append("<option value='"+value.id+"'>"+value.nom+"</option>");
           });

           select2.map(function(value, index){
               $('#taxeSelect'+ row +'').append("<option value='"+value.id+"'>"+value.nom+" ("+value.taux+"%)</option>");
           });

           row++;
           return false;
       });

       // Remove criterion
       $(document).on("click", ".delete-row", function () {

       //  alert("deleting row#"+row);
           if(row>1) {
               $(this).closest('tr').remove();
               row--;
           }
           return false;
       });
   });
</script>



<script type="text/javascript">
    $(document).ready(function() {
       var row=1;
       $(document).on("click", "#add-credit", function (e) {

            var new_Creditrow = '<tr id="row' + row + '">'+
                           '<td><select name="comptes_comptable_id[]" id="compte'+row+'" class="form-select mb-3">'+
                           '</select></td>'+
                           '<td><input name="description[]" placeholder="Description" type="text" class="form-control" /></td>'+
                           '<td><input name="montant[]" type="number" placeholder="Montant" class="form-control" /></td>'+
                           '<td><select name="taxe_id[]" id="taxeSelect'+ row +'" class="form-select mb-3">'+
                           '</select></td>'+
                           '<td><input class="delete-row w-100 btn btn-danger" type="button" value="Supprimer" /></td>'+
                           '</tr>';
           $('#credit-categorie-table').append(new_Creditrow);

           $('#compte'+ row +'').html('<option value="" hidden>Choisir une catégorie</option>');
           $('#taxeSelect'+ row +'').html('<option value="-1" hidden>Pas de taxe</option>');


           var compte_option = document.getElementById('compte_compta').value;
           var taxe_option = document.getElementById('taxe_value').value;

           var select1 = JSON.parse(compte_option);
           var select2 = JSON.parse(taxe_option);


           select1.map(function(value, index){
               $('#compte'+ row +'').append("<option value='"+value.id+"'>"+value.nom+"</option>");
           });

           select2.map(function(value, index){
               $('#taxeSelect'+ row +'').append("<option value='"+value.id+"'>"+value.nom+" ("+value.taux+"%)</option>");
           });

           row++;
           return false;
       });

       // Remove criterion
       $(document).on("click", ".delete-row", function () {

       //  alert("deleting row#"+row);
           if(row>1) {
               $(this).closest('tr').remove();
               row--;
           }
           return false;
       });
   });
</script>




<script type="text/javascript">
    $(document).ready(function() {
       var row=1;
       $(document).on("click", "#add-row", function (e) {

            var new_row = '<tr id="row' + row + '">'+
                           '<td><select name="comptes_comptable_id[]" id="compte'+row+'" class="form-select mb-3">'+
                           '</select></td>'+
                           '<td><input name="description[]" placeholder="Description" type="text" class="form-control" /></td>'+
                           '<td><input name="montant[]" type="number" placeholder="Montant" class="form-control" /></td>'+
                           '<td><select name="taxe_id[]" id="taxeSelect'+ row +'" class="form-select mb-3">'+
                           '</select></td>'+
                           '<td><i class="fa fa-trash delete-row text-danger"></i></td>'+
                           '</tr>';
           $('#test-body').append(new_row);

           $('#compte'+ row +'').html('<option value="" hidden>Choisir une catégorie</option>');
           $('#taxeSelect'+ row +'').html('<option value="-1" hidden>Pas de taxe</option>');


           var compte_option = document.getElementById('compte_compta').value;
           var taxe_option = document.getElementById('taxe_value').value;

           var select1 = JSON.parse(compte_option);
           var select2 = JSON.parse(taxe_option);


           select1.map(function(value, index){
               $('#compte'+ row +'').append("<option value='"+value.id+"'>"+value.nom+"</option>");
           });

           select2.map(function(value, index){
               $('#taxeSelect'+ row +'').append("<option value='"+value.id+"'>"+value.nom+" ("+value.taux+"%)</option>");
           });

           row++;
           return false;
       });

       // Remove criterion
       $(document).on("click", ".delete-row", function () {

       //  alert("deleting row#"+row);
           if(row>1) {
               $(this).closest('tr').remove();
               row--;
           }
           return false;
       });
   });
</script>

