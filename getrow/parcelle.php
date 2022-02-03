<script>
    function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'operation/parcelle_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.parcelle').val(response.CodeParcelle);
      $('#edit_proprietaire').val(response.Proprietaire);
      $('#edit_longueur').val(response.Longueur);
      $('#edit_largeur').val(response.Largeur);
      $('.fullname').html(response.NomAgent);
    }
  });
}
</script>