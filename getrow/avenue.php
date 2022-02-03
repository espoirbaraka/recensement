<script>
    function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'operation/avenue_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.avenue').val(response.CodeAvenue);
      $('#edit_avenue').val(response.Avenue);
      $('.fullname').html(response.Avenue);
    }
  });
}
</script>