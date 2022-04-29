<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<html>
<head>
<title>
<?php include("../title.php"); ?>
</title>
<?php
session_start();
    include("style.php");
    include("errors.php");
    include("functions.php");
$a = $_POST['workorder_workstation'];
$b = $_POST['workorder_number'];
$c = $_POST['workorder_inspectedby'];
$d = $_POST['workorder_brand'];
$e = $_POST['workorder_product_line'];
$f = $_POST['workorder_mold'];
$g = $_POST['workorder_mold_serial'];
$h = $_POST['workorder_paintcode'];
$i = $_POST['workorder_comments'];
?>
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="http://example.com/image-uploader.min.css">
<link type="text/css" rel="stylesheet" href="dist/image-uploader.min.css">
<link rel="stylesheet" href="js/jquery.switchButton.css">
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
<style>
    .switch-wrapper {
        display: inline-block;
        position: relative;
        top: 3px;
    }
</style>
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
			<i class="icon-warning-sign"></i> Report Defect
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Report Defect</li>
			</ul>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->	
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="entries.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
</div>            
<!--- <form Method="POST" Action="report_entry_save.php" enctype="multipart/form-data"> -->
<form Method="POST" Action="report_entry_save.php" enctype="multipart/form-data">
<?php include("../connect.php"); ?> 
<br>
<br>  
<!--- <div id="add_form_title"><i class="icon-plus-sign icon-large"></i> Report Entry</div> -->
<hr>
                    <!--------------------------------------------------------------------------------------------------------------->
                        <!--- Workstation --->
                        <?php
                            $query="SELECT workstation_description FROM workstations WHERE workstation_code = '$a'";
                            $sql=$db->prepare($query);
                            $sql->execute();
                            $wo_wst = $sql->fetch();
                            ?>
                    <!--------------------------------------------------------------------------------------------------------------->
                        <!--- Paint Code --->
                        <?php
                                $query="SELECT paintcode_description FROM paintcodes WHERE paintcode_code = '$h'";
                                $sql=$db->prepare($query);
                                $sql->execute();
                                $paint = $sql->fetch();
                            ?> 
                    <!---------------------------------------------------------------------------------------------------------------> 
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th style="text-align:left" width="10%">Workstation</th>
            <th style="text-align:left" width="5%">Workorder</th>
			<th style="text-align:left" width="10%">Inspected By</th>
			<th style="text-align:left" width="5%">Brand</th>
			<th style="text-align:left" width="10%">Product Line</th>
			<th style="text-align:left" width="5%">Mold/Fitment</th>
			<th style="text-align:left" width="5%">Mold Serial</th>
			<th style="text-align:left" width="10%">Paint Code</th>
            <th style="text-align:left" width="15%">Comments</th>
		</tr>
	</thead>  
    <tbody>	
			<tr>
			<td><input type="hidden" name="workorder_workstation" id="workstation" value="<?php echo $a; ?>" onload="fetch_workstation(this.value);" /><?php echo $a; ?> - <?php echo $wo_wst["workstation_description"];?></td>
			<td><input type="hidden" name="workorder_number" id="number" value="<?php echo $b;?>" /><?php echo $b;?></td>
			<td><input type="hidden" name="workorder_inspectedby" id="inspectedby" value="<?php echo $c;?>" /><?php echo $c;?></td>
			<td><input type="hidden" name="workorder_brand" id="brand" value="<?php echo $d;?>"><?php echo $d;?></td>
			<td><input type="hidden" name="workorder_product_line" id="product_line" value="<?php echo $e;?>"><?php echo $e;?></td>
			<td><input type="hidden" name="workorder_mold" id="mold" value="<?php echo $f;?>"><?php echo $f;?> </td>
			<td><input type="hidden" name="workorder_mold_serial" id="mold_serial" value="<?php echo $g;?>"><?php echo $g;?> </td>
			<td><input type="hidden" name="workorder_paintcode" id="paintcode" value="<?php echo $h;?>" /><?php echo $h;?> - <?php echo $paint["paintcode_description"];?></td>
            <td><input type="hidden" name="workorder_comments" id="comments01" value="<?php echo $i;?>" /><?php echo $i;?></td>
        </tr>
	</tbody>
</table>
                <!--------------------------------------------------------------------------------------------------------------->
                    <!--- Defect Origin --->
                    <?php
                        $query="SELECT * FROM defect_origins WHERE defect_origin_workstation_code = '$a'";
                        $sql=$db->prepare($query);
                        $sql->execute();
                        $defect_origins = $sql->fetchAll();
                    ?>
                <!--------------------------------------------------------------------------------------------------------------->
                    <!--- Location --->
                    <?php
                        $query="SELECT * FROM locations";
                        $sql=$db->prepare($query);
                        $sql->execute();
                        $locations = $sql->fetchAll();
                    ?>
                <!--------------------------------------------------------------------------------------------------------------->
<table class="table table-bordered" data-responsive="table"style="text-align: left;">
    <thead>
		<tr>
			<th style="text-align:center" width="33%">Defect Origin : </th>
            <th style="text-align:center" width="33%">Defect : </th>
            <th style="text-align:center" width="33%">Defect Location : </th>
        </tr>
    </thead>
    <tbody> 
        <tr>
         <td style="text-align: center;">
             <select name="workorder_defect_origin" id="origin" onchange="fetch_origin(this.value);" Required> 
                    <option value="" disabled selected>Select Option</option>          
                    <?php foreach($defect_origins as $defect_origin): ?>
                        <option value="<?php echo $defect_origin["defect_origin_origin"]; ?>"><?php echo $defect_origin["defect_origin_origin_code"]; ?> - <?php echo $defect_origin["defect_origin_origin"]; ?> </option>
                    <?php endforeach; ?>    
                </select>
            </td>
        <td style="text-align: center;">
        <select name="workorder_defect" id="defect" Required> 
                </select>
            </td>
        <td style="text-align: center;">
        <select name="workorder_defect_location" id="location" Required>         
                    <option value="" disabled selected>Select Defect Location</option>    
                        <?php foreach($locations as $location): ?>
                            <option value="<?php echo $location["location_code"]; ?>"><?php echo $location["location_code"]; ?> - <?php echo $location["location_description"]; ?> </option>
                        <?php endforeach; ?>
                </select>
            </td>  
        </tr>   
        <tr>        
            <td colspan="3" style="text-align: center;">
                <img src="images/defect_zones.jpg">
            </td>
        </tr>    
    </tbody>    
</table>
<table width="100%">
            <div class="container">
            <tr>
                <td width="25%">
                    <div class="input-field">    
                        <label class="active">Defect Comments :</label>
                        <textarea class="form-control" name="workorder_defect_comments" id="comments" rows="7"></textarea>
                    </div>
                </td>
                <td width="25%" style="text-align: center; vertical-align: top;">
                <label class="active">Additional Defect? :</label>
                <select name="workorder_additional_defect" id="additional_defect" Required> 
                    <option value="NO" selected>NO - NO ADDITIONAL DEFECT</option>          
                    <option value="YES" >YES - REPORT ADDITIONAL DEFECT</option> 
                </select>        
                </td>                   
                <td width="50%">
                    <!--- Add Pictures Button --->  
                    <div class="input-field">
                    <input type="hidden" name="images[]" id="upload_files">
                    <div>
                    <div class="image_uploading hidden">
                    </div>        
                    <div class="images_preview" style="padding-top: .5rem;"></div>
                </td>    
            <tr>
                <td colspan=3>
                    <!--- Submit Button --->
                    <button type="submit" class="btn btn-warning btn-block btn-large" style="float:center; width:150x; height:50px;"><i class="icon icon-bell icon-large"></i> Report</button>                        
                </td>
            </tr>
</table>    
</form>
<div class="clearfix"></div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="dist/image-uploader.min.js"></script>
</body>
<script>
    $(function () {

        $('.images_preview').imageUploader();

        let preloaded = [
            {id: 1, src: 'https://picsum.photos/500/500?random=1'},
            {id: 2, src: 'https://picsum.photos/500/500?random=2'},
            {id: 3, src: 'https://picsum.photos/500/500?random=3'},
            {id: 4, src: 'https://picsum.photos/500/500?random=4'},
            {id: 5, src: 'https://picsum.photos/500/500?random=5'},
            {id: 6, src: 'https://picsum.photos/500/500?random=6'},
        ];

        $('.input-images-2').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'photos',
            preloadedInputName: 'old'
        });

        

        function setNav() {
            if (scrollTop > $header.outerHeight()) {
                $nav.css({position: 'fixed', 'top': offset});
            } else {
                $nav.css({position: '', 'top': ''});
            }
        }
    });
</script>
<?php include('footer.php');?>
</html>