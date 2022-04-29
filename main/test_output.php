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
$wo_date = date('Y-m-d');
$wo_time = date("H:i:s");
$wo_status = 'REPORTED';
$images = array();
?>

<table class="table table-bordered" data-responsive="table"style="text-align: left;">
    <thead>
		<tr>
        <th style="text-align:center" width="50%">Workorder Data : </th>
        <th style="text-align:center" width="50%"></th>
        </tr>
    </thead>
    <tbody> 
        <tr>
            <td style="text-align: center;">
                <tr style="text-align:center" width="50%">
                    <td style="text-align: center;">Workstation : </td><td><?php echo $a; ?></td>
                </tr>
                <tr style="text-align:center" width="50%">
                    <td style="text-align: center;">Work Order Number : </td><td><?php echo $b; ?></td>
                </tr>
                <tr style="text-align:center" width="50%">
                    <td style="text-align: center;">Reported By : </td><td><?php echo $c; ?></td>
                </tr>
                <tr style="text-align:center" width="50%">
                    <td style="text-align: center;">Brand : </td><td><?php echo $d; ?></td>
                </tr>
                <tr style="text-align:center" width="50%">
                    <td style="text-align: center;">Product Line : </td><td><?php echo $e; ?></td>
                </tr>
                <tr style="text-align:center" width="50%">
                    <td style="text-align: center;">Mold : </td><td><?php echo $f; ?></td>
                </tr>
                <tr style="text-align:center" width="50%">
                    <td style="text-align: center;">Mold Serial : </td><td><?php echo $g; ?></td>
                </tr>
                <tr style="text-align:center" width="50%">
                    <td style="text-align: center;">Paint Code : </td><td><?php echo $h; ?></td>
                </tr>
                <tr style="text-align:center" width="50%">
                    <td style="text-align: center;">Workorder Comments : </td><td><?php echo $i; ?></td>
                </tr>
                <tr style="text-align:center" width="50%">
                    <td style="text-align: center;">Defect Origin : </td><td><?php echo $j; ?></td>
                </tr>
                <tr style="text-align:center" width="50%">
                    <td style="text-align: center;">Defect : </td><td><?php echo $k; ?></td>
                </tr>
                <tr style="text-align:center" width="50%">
                    <td style="text-align: center;">Defect Location : </td><td><?php echo $l; ?></td>
                </tr>
                <tr style="text-align:center" width="50%">
                    <td style="text-align: center;">Defect Comments : </td><td><?php echo $m; ?></td>
                </tr>
                <tr style="text-align:center" width="50%">
                    <td style="text-align: center;">Defect Pictures : </td>
                    <td>
                        <?php 

                        ?>
                    </td>
                </tr>

            
            </td>
        </tr>              
    </tbody>    
</table>