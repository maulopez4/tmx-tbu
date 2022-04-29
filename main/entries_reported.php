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
			<i class="icon-group"></i> Reported Workorder Entries
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Reported Workorder Entries</li>
			</ul>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->	
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
</div>
<input type="text" name="filter" style="padding:15px;" id="filter" placeholder="Search Workorder Entries..." autocomplete="off" />
<br><br>
<!--<a rel="facebox" href="entries_data.php"><button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;"><i class="icon-plus-sign icon-large"></i> New Workorder Entry</button></a><br><br>-->
<!--<a rel="facebox" href="entries_approved.php"><button type="submit" class="btn btn-success btn-block btn-large" style="float:left; width:230px; height:35px;"><i class="icon-plus-sign icon-large"></i> Approve Entry</button></a><br><br>-->
<!--<a rel="facebox" href="entries_reported.php"><button type="submit" class="btn btn-warning btn-block btn-large" style="float:left; width:230px; height:35px;"><i class="icon icon-bell icon-large"></i> Report Entry</button></a><br><br>-->   
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
      $total_pages_sql = "SELECT COUNT(*) FROM workorders WHERE workorder_status = 'REPORTED'";
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
			<th style="text-align:center" width="7%">Date</th>
			<th style="text-align:center"width="5%">Time</th>
			<th style="text-align:center"width="5%">Number</th>
			<th style="text-align:center" width="5%">Workstation</th>
			<th style="text-align:center" width="10%">Inspected By</th>
			<th style="text-align:center" width="10%">Defect</th>
			<th style="text-align:center" width="10%">Defect Origin</th>
			<th style="text-align:center" width="5%">Defect Location</th>
			<th style="text-align:center" width="10%">Status</th>
			<th style="text-align:center" width="20%">Comments</th>
			<th style="text-align:center" width="15%">Actions</th>
		</tr>
	</thead>
	<tbody>	
	<?php
			$result = $db->prepare("SELECT * FROM workorders WHERE workorder_status = 'REPORTED' ORDER BY workorder_date, workorder_time LIMIT $offset, $no_of_records_per_page");
			$result->execute();
			for($i=0; $row = $result->fetch(); $i++){
		?>
			<tr class="record">
			<td><?php echo $row['workorder_date']; ?></td>
			<td><?php echo $row['workorder_time']; ?></td>
			<td><a rel="facebox" href="entries_preview.php?id=<?php echo $row['workorder_id']; ?>"><?php echo $row['workorder_number']; ?></a></td>
			<td><?php echo $row['workorder_workstation']; ?></td>
			<td><?php echo $row['workorder_inspectedby']; ?></td>
			<td><?php echo $row['workorder_defect']; ?></td>
			<td><?php echo $row['workorder_defect_origin']; ?></td>
			<td><?php echo $row['workorder_defect_location']; ?></td>
			<td><?php echo $row['workorder_status']; ?></td>
			<td><?php echo $row['workorder_comments']; ?></td>
			<td style="text-align:center">
			<a rel="facebox" href="entries_edit.php?id=<?php echo $row['workorder_id']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Set Disposition </button></a>
			<!--<a title="Click To Edit Entry" data-toggle="lightbox" href="#entries_edit.php?id=<?php echo $row['workorder_id']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Set Disposition </button></a>-->
			<a href="#" id=<?php echo $row['workorder_id']; ?> class="delbutton" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button></a></td>
			</tr>
			<?php
				}
			?>
	</tbody>
</table>
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
 if(confirm("Sure you want to delete this Entry? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "entries_delete.php",
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