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
 dataType: 'json',
 url: 'fetch_workorder_data.php',
 data: {
    get_workorder:val
    },
 success: function (response) {   
            var wo=(Object.values(response));
            //alert(wo);
            var wo_brand = (wo[0]);
            var wo_product_line = (wo[1]);
            var wo_mold = (wo[2]);
            var wo_mold_serial = (wo[3]);
            var wo_paint_description = (wo[4]);

            alert(wo_brand);
            alert(wo_product_line);
            alert(wo_mold);
             /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //var brand_ouput = "<input type='text' name='workorder_brand' id='brand' value="+ wo_brand" disabled />";
            //alert(brand_ouput);
            //$("#brand").replaceWith(brand_ouput);
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
            }
 });
}
</script>