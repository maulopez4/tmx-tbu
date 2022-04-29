<?php include('../connect.php'); ?>
<?php
//if(isset($_POST['get_workorder']))
//{
    //$response_brand = array();
    $return_arr=array();
    $workorder = $_POST['get_workorder'];
    //$workorder = '11449306';
    $query="SELECT * FROM data WHERE workorder_number = '$workorder'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result))
    {
        $res_brand = $row['brand'];
        $res_product_line = $row["product_line"];
        $res_mold = $row["mold"];
        $res_mold_serial = $row["mold_serial"];
        $res_paint_description = $row["paint_description"];
    //}
    //print_r($reponse);
    //print_r($response['brand']);
    //$response_brand = $response['brand'];
    //print_r($response_brand);
    //print_r($res_brand);
    $return_arr = array('brand' => $res_brand,
                    'product_line' => $res_product_line,
                    'mold' => $res_mold,
                    'mold_serial' => $res_mold_serial,
                    'paint_descrition' => $res_paint_description);
    }
// Encoding array in JSON format
echo json_encode($return_arr);


//}
?> 