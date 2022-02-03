<script>
    function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'operation/province_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.province').val(response.CodeProvince);
      $('#edit_province').val(response.Province);
      $('.fullname').html(response.Province);
    }
  });
}
</script>