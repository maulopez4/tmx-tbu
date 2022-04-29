<html>
<head>
<title>
<?php include("../title.php"); ?>
</title>
<?php
	require_once('auth.php');
?>
<?php include("style.php"); ?>
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
			<i class="icon-group"></i> CHANGE_THIS
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">CHANGE_THIS</li>
			</ul>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->	
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
</div>
<input type="text" name="filter" style="padding:15px;" id="filter" placeholder="Search CHANGE_THIS..." autocomplete="off" />
<a rel="facebox" href="CHANGE_THIS_add.php"><button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;"><i class="icon-plus-sign icon-large"></i> New CHANGE_THIS</button></a><br><br>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="5%">Number</th>	
			<th width="20%">Full Name</th>
			<th width="10%">User Name</th>
			<th width="20%">Email Address</th>
			<th width="10%">User Role</th>
			<th width="5%">Location</th>
			<th width="10%">Team</th>
			<th width="10%">Notes</th>
			<th width="10%" style ="text-align: center;">Actions</th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM CHANGE_THIS ORDER BY CHANGE_THIS_id ASC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['CHANGE_THIS_employee_number']; ?></td>
			<td><?php echo $row['CHANGE_THIS_full_name']; ?></td>
			<td><?php echo $row['CHANGE_THIS_username']; ?></td>
			<td><?php echo $row['CHANGE_THIS_email']; ?></td>
			<td><?php echo $row['CHANGE_THIS_role']; ?></td>
			<td><?php echo $row['CHANGE_THIS_location']; ?></td>
			<td><?php echo $row['CHANGE_THIS_team']; ?></td>
			<td><?php echo $row['CHANGE_THIS_notes']; ?></td>

			<td><a title="Click To Edit User" rel="facebox" href="CHANGE_THIS_edit.php?id=<?php echo $row['CHANGE_THIS_id']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a> 
			<a href="CHANGE_THIS_delete.php" id="<?php echo $row['CHANGE_THIS_id']; ?>" class="delbutton" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button></a></td>
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
   url: "CHANGE_THIS_delete.php",
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