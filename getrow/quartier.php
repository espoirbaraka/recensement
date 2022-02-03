<script>
    function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'operation/quartier_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.quartier').val(response.CodeQuartier);
      $('#edit_quartier').val(response.Quartier);
      $('.fullname').html(response.Quartier);
    }
  });
}
</script>