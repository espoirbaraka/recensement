<script>
    function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'operation/commune_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.commune').val(response.CodeCommune);
      $('#edit_commune').val(response.Commune);
      $('.fullname').html(response.Commune);
    }
  });
}
</script>