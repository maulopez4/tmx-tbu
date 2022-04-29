<script type="text/javascript">
function fetch_workorder(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_workorder_data.php',
 data: {
  get_workorder:val
 },
 success: function (response) {
    var brandStr = res_brand;


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    var brand_input = "<input disabled type='text' name='workorder_brand' id='brand' value="+ brandStr" />";
    $("#brand").replaceWith(brand_input);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
 }
 });
}
</script>