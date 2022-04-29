<?php
session_start();
include('../connect.php');

$a = $_POST['workorder_workstation'];
$b = $_POST['workorder_number'];
$c = $_POST['workorder_inspectedby'];
$d = $_POST['workorder_brand'];
$e = $_POST['workorder_product_line'];
$f = $_POST['workorder_mold'];
$g = $_POST['workorder_mold_serial'];
$h = $_POST['workorder_paintcode'];
$i = $_POST['workorder_comments'];
$j = $_POST['workorder_defect_origin'];
$k = $_POST['workorder_defect'];
$l = $_POST['workorder_defect_location'];
$m = $_POST['workorder_defect_comments'];
$n = $_POST['workorder_additional_defect'];
$wo_date = date('Y-m-d');
$wo_time = date("H:i:s");
$wo_status = 'REPORTED';

// query
$sql = "INSERT INTO workorders (workorder_date,workorder_time,workorder_workstation,workorder_number,workorder_inspectedby,workorder_brand,workorder_product_line,workorder_mold,workorder_mold_serial,workorder_paintcode,workorder_comments,workorder_defect_origin,workorder_defect,workorder_defect_location,workorder_defect_comments,workorder_additional_defect,workorder_status) VALUES (:wo_date,:wo_time,:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:wo_status)";
$q = $db->prepare($sql);
$q->execute(array(':wo_date'=>$wo_date,':wo_time'=>$wo_time,':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k,':l'=>$l,':m'=>$m,':n'=>$n,':wo_status'=>$wo_status));
$images = array();
foreach($_FILES['images']['name'] as $key=>$val){        
    $upload_dir = "uploads/";
    $upload_image = $upload_dir.$_FILES['images']['name'][$key];
    $filename = $_FILES['images']['name'][$key];		
    if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$upload_image)){
        $images[] = $upload_image;
        $insert_sql = "INSERT INTO images (image_workorder, image_name) VALUES ('$b', '".$filename."')";
        mysqli_query($conn, $insert_sql) or die("database error: ". mysqli_error($conn));
    }
}
?>
<?php
if ($n == "YES"){
    /*$post = array(
        'workorder_workstation'=>$_POST[$a],
        'workorder_number'=>$_POST[$b],
        'workorder_inspectedby'=>$_POST[$c],
        'workorder_brand'=>$_POST[$d],
        'workorder_product_line'=>$_POST[$e],
        'workorder_mold'=>$_POST[$f],
        'workorder_mold_serial'=>$_POST[$g],
        'workorder_paintcode'=>$_POST[$h]);

    $ch = curl_init('report_entry.php');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_ENCODING,"");    

        header('Content-Type: text/html');
        $data = curl_exec($ch);
        echo $data;*/

        $workorder_workstation = $_POST['workorder_workstation'];
        $workorder_number = $_POST['workorder_number'];
        $workorder_inspectedby = $_POST['workorder_inspectedby'];
        $workorder_brand = $_POST['workorder_brand'];
        $workorder_product_line = $_POST['workorder_product_line'];
        $workorder_mold = $_POST['workorder_mold'];
        $workorder_mold_serial = $_POST['workorder_mold_serial'];
        $workorder_paintcode = $_POST['workorder_paintcode'];
        $workorder_comments = $_POST['workorder_comments'];

        echo <<< EOT
        <html><head><style></style></head><body>
        <form id="form" action="report_entry.php" method="post">
        <input type="hidden" name="workorder_workstation" value="$workorder_workstation"/>
        <input type="hidden" name="workorder_number" value="$workorder_number"/>
        <input type="hidden" name="workorder_inspectedby" value="$workorder_inspectedby"/>
        <input type="hidden" name="workorder_brand" value="$workorder_brand"/>
        <input type="hidden" name="workorder_product_line" value="$workorder_product_line"/>
        <input type="hidden" name="workorder_mold" value="$wokorder_mold"/>
        <input type="hidden" name="workorder_mold_serial" value="$workorder_mold_serial"/>
        <input type="hidden" name="workorder_paintcode" value="$workorder_paintcode"/>
        <input type="hidden" name="workorder_comments" value="$workorder_comments"/>
        </form>
        <script>document.getElementById("form").submit();</script>
        </body></html>
        EOT;
}
if ($n == "NO"){
    //redirect to entries page
    header("location: entries_reported.php");
}
?>