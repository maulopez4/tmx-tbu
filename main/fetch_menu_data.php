<?php include('../connect.php'); ?>
<?php
    $workstation = $_POST['get_workstation'];
    $query="SELECT * FROM defect_origins WHERE defect_origin_workstation_code = '$workstation'";
    $sql=$db->prepare($query);
    $sql->execute();
    $defect_origins = $sql->fetchAll();
?>
        <option value="" disabled selected>Select Option</option>          
        <?php foreach($defect_origins as $defect_origin): ?>
            <option value="<?php echo $defect_origin["defect_origin_origin"]; ?>"><?php echo $defect_origin["defect_origin_origin_code"]; ?> - <?php echo $defect_origin["defect_origin_origin"]; ?> </option>
        <?php endforeach; ?>
<?php
    $brands = $_POST['get_brand'];    
    $query="SELECT * FROM product_lines WHERE product_line_brand = '$brands'";
    $sql=$db->prepare($query);
    $sql->execute();
    $product_lines = $sql->fetchAll();
?>
        <?php foreach($product_lines as $product_line): ?>
            <option value="<?php echo $product_line["product_line_name"]; ?>"> <?php echo $product_line["product_line_name"]; ?></option>
        <?php endforeach; ?>

<?php
    $origin = $_POST['get_origin'];
    $query="SELECT * FROM defects WHERE defect_origin = '$origin'";
    $sql=$db->prepare($query);
    $sql->execute();
    $defects = $sql->fetchAll();
?>      
        <?php foreach($defects as $defect): ?>
            <option value="<?php echo $defect["defect_code"]; ?>"><?php echo $defect["defect_code"]; ?> - <?php echo $defect["defect_description"]; ?> </option>
        <?php endforeach; ?> 