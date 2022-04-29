<?php include('../connect.php'); ?>
<?php
//if(isset($_POST['get_workorder']))
//{
    $response_brand = array();
    //$response=array();
    //$workorder = $_POST['get_workorder'];
    $workorder = '11449306';
    $query="SELECT * FROM data WHERE workorder_number = '$workorder'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result))
    {
        $response_brand['brand'] = $row['brand'];
        //$response["product_line"] = $row["product_line"];
        //$rsponse["mold"] = $row["mold"];
        //$response["mold_serial"] = $row["mold_serial"];
        //$response['paint_description'] = $row["paint_description"];
    }
    //print_r($reponse);
    //print_r($response['brand']);
    //$response_brand = $response['brand'];
    //print_r($response_brand);
    $res_brand = $response_brand['brand'];
    print_r($res_brand);
//}
?> 