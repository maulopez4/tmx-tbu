<?php
// configuration
include('../connect.php');

// new data
$id= $_GET['id'];
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
$n = $_POST['workorder_rework'];
$rwo_setby = $_SESSION['SESS_USER_NAME'];
$rwo_date = date('Y-m-d');
$rwo_time = date("H:i:s");
$wo_status = 'REPORTED';
// query
$query = "UPDATE workorders SET workorder_workstation=?, workorder_number=?, workorder_inspectedby=?, workorder_brand=?, workorder_product_line=?, workorder_mold=?, workorder_mold_serial=?, workorder_paintcode=?, workorder_comments=?, workorder_defect_origin=?, workorder_defect=?, workorder_defect_location=?, workorder_defect_comments=?, workorder_rework=?, workorder_rework_setby=?, workorder_rework_date=?, workorder_rework_time=? WHERE workorder_id=?";
$sql = $db->prepare($query);
$sql->execute(array($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$rwo_setby,$rwo_date,$rwo_time,$id));
header("location: entries_reported.php");
?>