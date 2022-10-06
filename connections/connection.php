<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
error_reporting(E_ALL ^ E_DEPRECATED);
$hostname_Connection = "localhost";
$database_Connection = "cgpa_main";
$username_Connection = "root";
$password_Connection = "";
$Connection = mysqli_connect($hostname_Connection, $username_Connection, $password_Connection) or trigger_error(mysqli_error(),E_USER_ERROR); 

#$Connection2 = mysqli_connect($hostname_Connection, $username_Connection, $password_Connection,$database_Connection) or trigger_error(mysqli_error(),E_USER_ERROR); 


function GetSQLValueString( $theValue, $theType,   $theDefinedValue = "", $theNotDefinedValue = "")   
    {  
      $conngetvs = new mysqli('localhost', 'root', '', 'cgpa_main');

       $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) :   $theValue;  

      $theValue = function_exists("mysqli_real_escape_string") ?   mysqli_real_escape_string($conngetvs, $theValue) :  
mysqli_escape_string($conngetvs, $theValue);

      switch ($theType) {  
        case "text":  
          $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";  
          break;      
        case "long":  
        case "int":  
          $theValue = ($theValue != "") ? intval($theValue) : "NULL";    
          break;    
        case "double":    
          $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";  
          break;  
        case "date":  
          $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
          break;  
        case "defined":  
          $theValue = ($theValue != "") ? $theDefinedValue :
$theNotDefinedValue;
break;
}
return $theValue;
}



?>

