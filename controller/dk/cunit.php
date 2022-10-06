<?php
require_once('../../connections/connection.php');

mysqli_select_db($Connection,$database_Connection);

if(isset($_POST['depart'])){
  
    $depart = $_POST['depart'];
    $users_arr = array();

    $sql = "SELECT cunit FROM tblcourse WHERE id='".$depart."'";

    $result = mysqli_query($Connection,$sql);
    
    while( $row = mysqli_fetch_array($result) ){
          $unit = $row['cunit'];
    
        $users_arr[] = array("name" => $unit);
    }

// encoding array to json format
echo json_encode($users_arr);

}