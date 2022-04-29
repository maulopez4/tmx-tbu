<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include("errors.php");
include("functions.php");
?>
<?php
    require_once('auth.php');
?>
<?php include("../connect.php"); ?> 
<form action="entries_editsave.php" method="post" enctype="multipart/form-data">
<?php 
    include('../connect.php');    
    $id=$_GET['id'];   
    $query="SELECT * FROM workorders WHERE workorder_id= '$id'";
	$result = $db->prepare($query);
	$result->execute();
	$row = $result->fetch();
        $a = $row['workorder_workstation'];
        $b = $row['workorder_number'];
        $c = $row['workorder_inspectedby'];
        $d = $row['workorder_brand'];
        $e = $row['workorder_product_line'];
        $f = $row['workorder_mold'];
        $g = $row['workorder_mold_serial'];
        $h = $row['workorder_paintcode'];
        $i = $row['workorder_comments'];
        $j = $row['workorder_defect_origin'];
        $k = $row['workorder_defect'];
        $l = $row['workorder_defect_location'];
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<style>
    #facebox {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 100;
  text-align: left;
}


#facebox .popup{
  position:relative;
  border:3px solid rgba(0,0,0,0);
  -webkit-border-radius:5px;
  -moz-border-radius:5px;
  border-radius:5px;
  -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4);
  -moz-box-shadow:0 0 18px rgba(0,0,0,0.4);
  box-shadow:0 0 18px rgba(0,0,0,0.4);
}

#facebox .content {
  display:table-cell;
  /* display:table; */
  width: 1028px;
  padding: 10px;
  background: #fff;
  -webkit-border-radius:4px;
  -moz-border-radius:4px;
  border-radius:4px;
}

#facebox .content > p:first-child{
  margin-top:0;
}
#facebox .content > p:last-child{
  margin-bottom:0;
}

#facebox .close{
  position:absolute;
  top:5px;
  right:5px;
  padding:2px;
  background:#fff;
}
#facebox .close img{
  opacity:0.3;
}
#facebox .close:hover img{
  opacity:1.0;
}

#facebox .loading {
  text-align: center;
}

#facebox .image {
  text-align: center;
}

#facebox img {
  border: 0;
  margin: 0;
}

#facebox_overlay {
  position: fixed;
  top: 0px;
  left: 0px;
  height:100%;
  width:100%;
}

.facebox_hide {
  z-index:-100;
}

.facebox_overlayBG {
  background-color: #000;
  z-index: 99;
}
</style>
<div id="add_form_title"><i class="icon-plus-sign icon-large"></i>Entry Preview</div>     
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
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th style="text-align:left" width="10%">Workstation</th>
            <th style="text-align:left" width="5%">Workorder</th>
			<th style="text-align:left" width="10%">Inspected By</th>
			<th style="text-align:left" width="5%">Brand</th>
			<th style="text-align:left" width="5%">Product Line</th>
			<th style="text-align:left" width="5%">Fitment</th>
			<th style="text-align:left" width="5%">Mold Serial</th>
			<th style="text-align:left" width="20%">Paint Code</th>
		</tr>
	</thead>  
    <tbody>	
			<tr>
			<td><input type="hidden" name="workorder_workstation" id="workstation" value="<?php echo $a; ?>" /><?php echo $a; ?> - <?php echo $wo_wst["workstation_description"];?></td>
			<td><input type="hidden" name="workorder_number" id="number" value="<?php echo $b;?>" /><?php echo $b;?></td>
			<td><input type="hidden" name="workorder_inspectedby" id="inspectedby" value="<?php echo $c;?>" /><?php echo $c;?></td>
			<td><input type="hidden" name="workorder_brand" id="brand" value="<?php echo $d;?>"><?php echo $d;?></td>
			<td><input type="hidden" name="workorder_product_line" id="product_line" value="<?php echo $e;?>"><?php echo $e;?></td>
			<td><input type="hidden" name="workorder_mold" id="mold" value="<?php echo $f;?>"><?php echo $f;?> </td>
			<td><input type="hidden" name="workorder_mold_serial" id="mold_serial" value="<?php echo $g;?>"><?php echo $g;?> </td>
			<td><input type="hidden" name="workorder_workstation" id="workstation" value="<?php echo $h;?>" /><?php echo $h;?></td>
</tr>
	</tbody>
</table>

<table class="table table-bordered" id="resultTable" data-responsive="table"style="text-align: left;">
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
                <input type="hidden" name="workorder_defect_origin" id="origin" value="<?php echo $j;?>" /><?php echo $j;?></td>
            </td>
        <td style="text-align: center;">
        <input type="hidden" name="workorder_defect" id="defect" value="<?php echo $k;?>" /><?php echo $k;?></td>
            </td>
        <td style="text-align: center;">
        <input type="hidden" name="workorder_defect_location" id="location" value="<?php echo $l;?>" /><?php echo $l;?></td>
            </td>  
        </tr>   
        <tr>        
            <td colspan="3" style="text-align: center;">
            <!----Pictures Preview---->
              <table>
                <?php
                  $upload_dir = "uploads/";
                  $query="SELECT image_name FROM images WHERE image_workorder = '$b'";
                  $sql=$db->prepare($query);
                  $sql->execute();
                  $images = $sql->fetchAll();

                foreach ($images as $image_name): ?>
                    <tr>
                      <td><img src="<?php echo $upload_dir,$image_name['image_name']; ?>"></td>
                    </tr>
                <?php endforeach; ?>
              </table>
            </td>
        </tr>    
    </tbody>    
</table>
<table width="100%">
            <tr>
                <td width="20%">
                    Comments:
                  <textarea class="form-control" name="workorder_comments" id="comments" rows="3" width="300"></textarea>
                </td>
                <td width="35%">
                    <!--- Add Pictures Button --->
                </td>
                <td width="30%">
                    <!--- Submit Button --->
                </td>
            </tr>
</table>