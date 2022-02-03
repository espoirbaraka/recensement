<script>
    function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'operation/agent_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.agent').val(response.CodeAgent);
      $('#edit_nom').val(response.NomAgent);
      $('#edit_postnom').val(response.PostnomAgent);
      $('#edit_prenom').val(response.PrenomAgent);
      $('.fullname').html(response.NomAgent);
    }
  });
}
</script>