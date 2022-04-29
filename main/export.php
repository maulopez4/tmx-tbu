<html>
<head>
<title>
<?php include("../title.php"); ?>
</title>
<?php
	require_once('auth.php');
?>
<?php include("style.php"); ?>
<?php include("../connect.php"); ?> 
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
</head>
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
			<i class="icon-group"></i> Export Data
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Export Data</li>
			</ul>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->	
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
</div>
<br>
<br>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->	
<?php
$workstation = isset($_POST['workstation']) ? $_POST['workstation'] : '';
$fromDate = isset($_POST['fromDate']) ? $_POST['fromDate'] : '';
$tillDate = isset($_POST['tillDate']) ? $_POST['tillDate'] : '';
?>
<script type="text/javascript">
  document.getElementById('workstation').value = "<?php echo $_GET['workstation'];?>";
  document.getElementById('fromDate').value = "<?php echo $_GET['fromDate'];?>";
  document.getElementById('tillDate').value = "<?php echo $_GET['tillDate'];?>";
</script>
<?php
if(isset($_POST['GetDataButton'])){ //check if form was submitted
	$workstation = $_POST['workstation'];
	$fromDate = $_POST['fromDate']; //get input text
  	$tillDate = $_POST['tillDate']; //get input text
}
if(isset($_POST['ClearButton'])){ //check if form was submitted
	$workstation = "Select Workstation";
	$fromDate = "Select date"; //get input text
	$tillDate = "Select date"; //get input text
  }

?>
<form action="" method="POST">
	<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
		<tbody>
			<tr>
				<td width="22%">
					<!--- Workstation --->    
					<span>Workstation : </span><br>
					<select id="workstation" name="workstation">  
					<?php
						$query="SELECT * FROM workstations";
						$sql=$db->prepare($query);
						$sql->execute();
						$wo_ws = $sql->fetchAll();
					?>    
						<option value="">Select Workstation</option>
						<option value="<?php echo $workstation; ?>" selected><?php echo $workstation; ?></option>
						<option value="CP1,CP2,CP3,CP4,CP5,CP6,CP7,MOSH,SPOT">All Workstations</option>    
						<?php foreach($wo_ws as $ws): ?>
							<option value="<?php echo $ws["workstation_code"]; ?>"> <?php echo $ws["workstation_code"]; ?>- <?php echo $ws["workstation_description"];?></option>
						<?php endforeach; ?>
					</select>
				</td>
				<td width="22%">
					<span>From : </span><br>
					<input type="text" id="fromDate" name="fromDate" value="<?php echo $fromDate; ?>">
				</td>
				<td width="22%">	
					<span>To : </span><br>
					<input type="text" id="tillDate" name="tillDate" value="<?php echo $tillDate; ?>">
				</td>
				<td width="33%" style="text-align: center; vertical-align: middle;">
					<table cellspacing="0" cellpadding="0">	
						<tr>
							<td width="33%" style="text-align:center"><button type="submit" name="GetDataButton">Get Data</button>
							</td>
							<td width="33%" style="text-align:center"><button type="submit" name="ClearButton"> Clear</button>
							</td>
							<td width="33%" style="text-align:center"><button type="submit" name="ExportData" formMethod="POST" formAction="exportData.php">Export Data</button>
							</td>
						</tr>
					</table>	
				</td>		
			</tr> 
		</tbody>
	</table>
</form>
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
			<th style="text-align:center" width="10%">Disposition</th>
			<th style="text-align:center" width="20%">Comments</th>
		</tr>
	</thead>
	<tbody>	
	<?php
			$result = $db->prepare("SELECT * FROM workorders WHERE FIND_IN_SET (workorder_workstation,'$workstation') AND workorder_date BETWEEN '$fromDate' AND '$tillDate' ORDER BY workorder_workstation, workorder_date, workorder_time");
			$result->execute();
			if($result->fetchColumn() > 0){
			for($i=0; $row = $result->fetch(); $i++){
		?>
			<tr class="record">
			<td><?php echo $row['workorder_date']; ?></td>
			<td><?php echo $row['workorder_time']; ?></td>
			<td><?php echo $row['workorder_number']; ?></td>
			<td><?php echo $row['workorder_workstation']; ?></td>
			<td><?php echo $row['workorder_inspectedby']; ?></td>
			<td><?php echo $row['workorder_defect']; ?></td>
			<td><?php echo $row['workorder_defect_origin']; ?></td>
			<td><?php echo $row['workorder_defect_location']; ?></td>
			<td><?php echo $row['workorder_status']; ?></td>
			<td><?php echo $row['workorder_rework']; ?></td>
			<td><?php echo $row['workorder_comments']; ?></td>
			</tr>
			<?php } }else{ ?>
        <tr><td colspan="11">No Record(s) found...</td></tr>
    <?php } ?>
	</tbody>
</table>
<?php include('scripts.php'); ?>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->	   
</body>
<?php include('footer.php');?>

</html>