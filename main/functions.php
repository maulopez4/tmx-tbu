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
            var wo_brand = (wo[0]);
            var wo_product_line = (wo[1]);
            var wo_mold = (wo[2]);
            var wo_mold_serial = (wo[3]);
            var wo_paint_description = (wo[4]);
                       
            //alert(wo_brand);
            //alert(wo_product_line);
            //alert(wo_mold);
            //alert(wo_mold_serial);
            //alert(wo_paint_description);


             /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $("#brand").replaceWith("<input type='hidden' name='workorder_brand' id='brand' value='" + wo_brand + "'/><input type='text' placeholder='"+ wo_brand + "' disabled />");
            $("#product_line").replaceWith("<input type='hidden' name='workorder_product_line' id='product_line' value='" + wo_product_line + "'/><input type='text' placeholder='"+ wo_product_line + "' disabled />");
            $("#mold").replaceWith("<input type='hidden' name='workorder_mold' id='mold' value='" + wo_mold + "'/><input type='text' placeholder='"+ wo_mold + "' disabled />");
            $("#mold_serial").replaceWith("<input type='hidden' name='workorder_mold_serial' id='mold_serial' value='" + wo_mold_serial + "'/><input type='text' placeholder='"+ wo_mold_serial + "' disabled />");
            $("#paintcode").replaceWith("<input type='hidden' name='workorder_paintcode' id='paintcode' value='" + wo_paint_description + "'/><input type='text' placeholder='"+ wo_paint_description + "' disabled />");
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
            }
 });
}
</script>