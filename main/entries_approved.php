<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include("errors.php");
include("funtions.php");
?>
<?php
    require_once('auth.php');
?>
<form enctype='multipart/form-data'> 
<?php include("../connect.php"); ?>    
<div id="add_form_title"><i class="icon-plus-sign icon-large"></i> Entry Approve</div>
<hr>
<div id="ac" style="width:500px">
    <!--- Workstation --->    
    <span>Workstation : </span>
    <select name="workorder_workstation" id="workstation" onchange="fetch_workstation(this.value);">  
    <?php
            $query="SELECT * FROM workstations";
            $sql=$db->prepare($query);
            $sql->execute();
            $wo_ws = $sql->fetchAll();
        ?>    
        <option value="" disabled selected>Select Workstation</option>    
            <?php foreach($wo_ws as $ws): ?>
                <option value="<?php echo $ws["workstation_code"]; ?>"> <?php echo $ws["workstation_code"]; ?> - <?php echo $ws["workstation_description"]; ?></option>
            <?php endforeach; ?>
    </select><br>
     <!--- Workorder Number --->
    <span>Workorder Number : </span><input type="text" name="workorder_number" placeholder="Enter Workorder Number" Required/><br> 
     <!--- Inspected By --->
    <span>Inspected By : </span><input disabled type="text" name="workorder_inspectedby" value="<?php echo $_SESSION['SESS_USER_NAME'];?>" /><br>
    <!--- Brand --->
    <span>Brand : </span>    
    <select name="workorder_brand" id="brand" onchange="fetch_brand(this.value);"> 
    <?php
            $query="SELECT * FROM brands";
            $sql=$db->prepare($query);
            $sql->execute();
            $brands = $sql->fetchAll();
        ?>         
        <option value="" disabled selected>Select Brand</option>    
        <?php foreach($brands as $brand): ?>
                <option value="<?php echo $brand["brand_code"]; ?>"> <?php echo $brand["brand_name"]; ?></option>
            <?php endforeach; ?>     
    </select><br>
    <!--- Product Line --->
    <span>Product Line : </span>
    <select name="workorder_product_line" id="product_line">  
    </select><br>
    <!--- Mold --->
    <span>Mold : </span>
    <select name="workorder_mold" id="mold"> 
    <?php
            $query="SELECT DISTINCT(mold_fitment) FROM molds";
            $sql=$db->prepare($query);
            $sql->execute();
            $mold_models = $sql->fetchAll();
        ?>          
        <option value="" disabled selected>Select Mold</option>    
            <?php foreach($mold_models as $mold_model): ?>
                <option value="<?php echo $mold_model["mold_fitment"]; ?>"> <?php echo $mold_model["mold_fitment"]; ?></option>
            <?php endforeach; ?>
    </select><br>
    <!--- Serial --->
    <span>Mold Serial : </span>
    <select name="workorder_mold_serial" id="serial">   
    <?php
            $query="SELECT DISTINCT(mold_serial) FROM molds";
            $sql=$db->prepare($query);
            $sql->execute();
            $mold_serials = $sql->fetchAll();
        ?>       
        <option value="" disabled selected>Select Mold Serial</option>    
            <?php foreach($mold_serials as $mold_serial): ?>
                <option value="<?php echo $mold_serial["mold_serial"]; ?>"> <?php echo $mold_serial["mold_serial"]; ?></option>
            <?php endforeach; ?>
    </select><br>
    <!--- Paint Code --->
    <span>Paint Code : </span>
    <select name="workorder_paintcode" id="paintcode"> 
    <?php
            $query="SELECT * FROM paintcodes ORDER BY paintcode_code ASC";
            $sql=$db->prepare($query);
            $sql->execute();
            $paintcodes = $sql->fetchAll();
        ?>          
        <option value="" disabled selected>Select Paint Code</option>    
            <?php foreach($paintcodes as $paintcode): ?>
                <option value="<?php echo $paintcode["paintcode_code"]; ?>"><?php echo $paintcode["paintcode_code"]; ?> - <?php echo $paintcode["paintcode_description"]; ?> </option>
            <?php endforeach; ?>
    </select><br>
    <span>Comments : </span><textarea style="height:60px;width:300px;" name="workorder_comments"></textarea><br>
<!--------------------------------------------------------------------------------------------------------------->
    
<!--------------------------------------------------------------------------------------------------------------->
    <div style="float:right; margin-right:25px">
    <span><button type="submit" formMethod="post" formAction="entries_approved_save.php" class="btn btn-success btn-block btn-large" style="float:right; width:230px; height:35px;"><i class="icon icon-save icon-large"></i> Approved</button></span>
    </div>
</div>
</form>