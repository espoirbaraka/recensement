<script>
    function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'operation/menage_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.menage').val(response.CodeMenage);
      $('#edit_designation').val(response.Designation);
      $('.fullname').html(response.Designation);
    }
  });
}
</script>