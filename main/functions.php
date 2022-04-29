<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
function fetch_workstation(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_menu_data.php',
 data: {
  get_workstation:val
 },
 success: function (response) {
  document.getElementById("origin").innerHTML=response; 
 }
 });
}
</script>

<script type="text/javascript">
function fetch_origin(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_menu_data.php',
 data: {
  get_origin:val
 },
 success: function (response) {
  document.getElementById("defect").innerHTML=response; 
 }
 });
}
</script>

<script type="text/javascript">
function fetch_workorder(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_workorder_data.php',
 data: {
    get_workorder:val
},
 success: function (res_brand) {
    var brandStr = JSON.parse(res_brand);


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    var brand_input = "<input type='text' name='workorder_brand' id='brand' value="brandStr" disabled />";
    $("#brand").replaceWith(brand_input);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
 }
 });
}
</script>