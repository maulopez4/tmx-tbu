<?php
session_start();
include('../connect.php');
$a = $_POST['workorder_workstation'];
$b = $_POST['workorder_number'];
$c = $_SESSION['SESS_USER_NAME'];
$d = $_POST['workorder_brand'];
$e = $_POST['workorder_product_line'];
$f = $_POST['workorder_mold'];
$g = $_POST['workorder_mold_serial'];
$h = $_POST['workorder_paintcode'];
$i = $_POST['workorder_comments'];
$j = 'NONE';
$k = 'NONE';
$l = 'NONE';
$wo_date = date('Y-m-d');
$wo_time = date("H:i:s");
$wo_status = 'APPROVED';
// query
$sql = "INSERT INTO workorders (workorder_date,workorder_time,workorder_workstation,workorder_number,workorder_inspectedby,workorder_brand,workorder_product_line,workorder_mold,workorder_mold_serial,workorder_paintcode,workorder_comments,workorder_defect_origin,workorder_defect,workorder_defect_location,workorder_status)VALUES(:wo_date,:wo_time,:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:wo_status)";
$q = $db->prepare($sql);
$q->execute(array(':wo_date'=>$wo_date,':wo_time'=>$wo_time,':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k,':l'=>$l,':wo_status'=>$wo_status,));
header("location: entries.php");
?>