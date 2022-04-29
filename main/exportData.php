<?php 

$a = $_POST['workstation'];
$b = $_POST['fromDate'];
$c = $_POST['tillDate'];
// Load the database configuration file 
include("../connect.php");

// Fetch records from database 
$query = $db->query("SELECT * FROM workorders WHERE FIND_IN_SET (workorder_workstation,'$a') AND workorder_date BETWEEN '$b' AND '$c' ORDER BY workorder_workstation, workorder_date, workorder_time"); 
 
if($query->fetchColumn() > 0){ 
    $delimiter = ",";
    $filename = "tbu-data_" . $b . "-" . $c . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
    
    // Set column headers 
    $fields = array('DATE', 'TIME', 'WORKSTATION', 'WORKORDER NUMBER', 'INSPECTED BY', 'DEFECT', 'DEFECT ORIGIN', 'DEFECT LOCATION', 'STATUS', 'DISPOSITION', 'COMMENTS'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch()){ 
        $lineData = array($row['workorder_date'], $row['workorder_time'], $row['workorder_workstation'], $row['workorder_number'], $row['workorder_inspectedby'], $row['workorder_defect'], $row['workorder_defect_origin'], $row['workorder_defect_location'], $row['workorder_status'], $row['workorder_rework'], $row['workorder_comments']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
?>