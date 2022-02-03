<script>
    function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'operation/ville_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.ville').val(response.CodeVille);
      $('#edit_ville').val(response.Ville);
      $('.fullname').html(response.Ville);
    }
  });
}
</script>