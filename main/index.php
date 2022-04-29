<!DOCTYPE html>
<html>
<head>
<title>
<?php	include("../title.php"); ?>
</title>
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
    
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
<?php
	require_once('auth.php');
?>
<script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
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
        
<!------SIDE MENU-------------------------->
        <div class="span2">  
          <div class="well sidebar-nav">
              <?php include("sidemenu.php");?>
          </div><!--/.well -->
        </div><!--/span-->
<!----------------------------------------->
        <div class="span10">
	<div class="contentheader">
			<i class="icon-dashboard"></i> Start
			</div>
			<ul class="breadcrumb">
			<li class="active">Start</li>
			</ul>
			<font style=" font:bold 44px 'Arial'; text-shadow:1px 1px 25px #000; color:#fff;"><center></center></font>
<div id="mainmain">
<?php
$position=$_SESSION['SESS_USER_ROLE'];
if($position=='USER') {
    ?>
    <a href="entries.php"><i class="icon-edit icon-2x"></i> New Entry</a>             
    <!-- <a href="search_entry.php"><i class="icon-search icon-2x"></i> Search Entry</a></li> --> 
    <a href="export.php"><i class="icon-bar-chart icon-2x"></i> Export Data</a></li>
    <a href="../index.php"><font color="red"><i class="icon-off icon-2x"></i></font> Logout</a>
<?php
}
if($position=='SUPERVISOR') {
    ?>
    <a href="entries.php"><i class="icon-edit icon-2x"></i> New Entry</a>
    <a href="entries_reported.php"><i class="icon-bell icon-2x"></i> Reported Entries</a>              
<!-- <a href="search_entry.php"><i class="icon-search icon-2x"></i> Search Entry</a></li> --> 
    <a href="molds.php"><i class="icon-download-alt icon-2x"></i> Add/Edit Molds</a>     
    <a href="paintcodes.php"><i class="icon-tint icon-2x"></i> Add/Edit Paint Codes</a>
    <a href="defects.php"><i class="icon-warning-sign icon-2x"></i> Add/Edit Defects</a>     
    <a href="export.php"><i class="icon-bar-chart icon-2x"></i> Export Data</a></li>
    <a href="../index.php"><font color="red"><i class="icon-off icon-2x"></i></font> Logout</a>
<?php
}
if($position=='ADMIN') {
    ?>
    <a href="entries.php"><i class="icon-edit icon-2x"></i> New Entry</a>
    <a href="entries_reported.php"><i class="icon-bell icon-2x"></i> Reported Entries</a>             
<!-- <a href="search_entry.php"><i class="icon-search icon-2x"></i> Search Entry</a></li> --> 
    <a href="users.php"><i class="icon-group icon-2x"></i> Add/Edit Users</a></li>
    <a href="molds.php"><i class="icon-download-alt icon-2x"></i> Add/Edit Molds</a>     
    <a href="paintcodes.php"><i class="icon-tint icon-2x"></i> Add/Edit Paint Codes</a>
    <a href="defects.php"><i class="icon-warning-sign icon-2x"></i> Add/Edit Defects</a>     
    <a href="export.php"><i class="icon-bar-chart icon-2x"></i> Export Data</a></li>
    <a href="../index.php"><font color="red"><i class="icon-off icon-2x"></i></font> Logout</a>
<?php
    }
    ?>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
</body>
<?php include('footer.php'); ?>
</html>
