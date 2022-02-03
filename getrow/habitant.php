<script>
    function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'operation/habitant_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.habitant').val(response.CodePersonne);
      $('#edit_nom').val(response.NomPersonne);
      $('#edit_postnom').val(response.PostnomPersonne);
      $('#edit_prenom').val(response.PrenomPersonne);
      $('#edit_email').val(response.EmailPersonne);
      $('#edit_telephone').val(response.TelephonePersonne);
      $('.fullname').html(response.NomPersonne+' '+response.PostnomPersonne+' '+response.PrenomPersonne);
    }
  });
}
</script>