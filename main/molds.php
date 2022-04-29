<html>
<head>
<title>
<?php include('../title.php'); ?>
</title>
<?php	require_once('auth.php');?>
<?php include('style.php'); ?>
<?php include('../connect.php'); ?>
</head>
<script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
/*<!-- Begin*/
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>
<body>	
<?php include('navfixed.php');?>
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
		  <?php include("sidemenu.php");?>                               
          </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-group"></i> Molds
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Molds</li>
			</ul>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->	
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
</div>
<input type="text" name="filter" style="padding:15px;" id="filter" placeholder="Search Molds..." autocomplete="off" />
<a rel="facebox" href="molds_add.php"><button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;"><i class="icon-plus-sign icon-large"></i> New Mold</button></a><br><br>
<!----------------PAGINATION---------------------------------->
<?php
  if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
      } else {
          $pageno = 1;
      }
      $no_of_records_per_page = 25;
      $offset = ($pageno-1) * $no_of_records_per_page;
  /*<!-------------------------------------------------->*/
      $total_pages_sql = "SELECT COUNT(*) FROM molds";
      $tresult = mysqli_query($conn,$total_pages_sql);
      $total_rows = mysqli_fetch_array($tresult)[0];
      $total_pages = ceil($total_rows / $no_of_records_per_page);
?>
      <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>    
<!-------------------------------------------------->
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="5%">Brand</th>	
			<th width="10%">Model</th>
			<th width="5%">Serial</th>
			<th width="15%">Fitment</th>
			<th width="5%">Number</th>
			<th width="5%">Color</th>
			<th width="5%">Run</th>
			<th width="5%">Run Limit</th>
			<th width="10%">Status</th>
			<th width="25%">Notes</th>
			<th width="10%" style ="text-align: center;">Actions</th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				$result = $db->prepare("SELECT * FROM molds ORDER BY mold_brand ASC LIMIT $offset, $no_of_records_per_page");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['mold_brand']; ?></td>
			<td><?php echo $row['mold_model']; ?></td>
			<td><?php echo $row['mold_serial']; ?></td>
			<td><?php echo $row['mold_fitment']; ?></td>
			<td><?php echo $row['mold_number']; ?></td>
			<td><?php echo $row['mold_color']; ?></td>
			<td><?php echo $row['mold_run']; ?></td>
			<td><?php echo $row['mold_run_limit']; ?></td>
			<td><?php echo $row['mold_status']; ?></td>
			<td><?php echo $row['mold_notes']; ?></td>

			<td><a title="Click To Edit Mold" rel="facebox" href="mold_edit.php?id=<?php echo $row['mold_id']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a> 
			<a href="mold_delete.php" id="<?php echo $row['mold_id']; ?>" class="delbutton" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button></a></td>
			</tr>
			<?php
				}
			?>
		
	</tbody>
</table>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="clearfix"></div>

</div>
</div>
</div>

<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Are you sure want to delete this? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "mold_delete.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>
<?php include('footer.php');?>

</html>