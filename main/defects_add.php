<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include("errors.php");
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css"/>
<form action="defects_addsave.php" method="post">
<?php include("../connect.php"); ?>    
<div id="add_form_title"><i class="icon-plus-sign icon-large"></i> Add Defect Definition</div>
<hr>
<div id="ac" style="font-family:verdana; width:500px">
    <span>Defect Code : </span><input type="text" name="defect_code" placeholder="Defect Code" Required/><br>
    <span>Defect Description : </span><input type="text" name="defect_description" placeholder="Defect Description" Required/><br>
    <span>Defect Origin :</span>
        <?php
            $query="SELECT * FROM defect_origins";
            $sql=$db->prepare($query);
            $sql->execute();
            $defect_origins = $sql->fetchAll();
        ?>
    <select name="defect_origin">           
        <?php foreach($defect_origins as $defect_origin): ?>
            <option value="<?php echo $defect_origin["defect_origin_workstation"]; ?>"> <?php echo $defect_origin["defect_origin_origin"]; ?></option>
        <?php endforeach; ?>
    </select><br>
    <div style="float:right; margin-right:35px">
    <button class="btn btn-success btn-block btn-large" style="width:300px;"><i class="icon icon-save icon-large"></i> Save</button>
    </div>
</div>
</form>
