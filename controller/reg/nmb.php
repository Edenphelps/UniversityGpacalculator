<script src="../../js/jquery.js"></script>
 <script src="../../js/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="../../js/dist/sweetalert2.min.css">
  <?php require_once('../../connections/connection.php'); ?>

  <?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "regm")) {

  $pwd = md5($_POST['pwd']);
 

  $insertSQL = sprintf("INSERT INTO tblprofile (fname,username,password,college,yop) VALUES (%s, %s, %s, %s, %s)",
       
                       GetSQLValueString($_POST['fname'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($pwd, "text"),
                       GetSQLValueString($_POST['college'],  "text"),
                       GetSQLValueString($_POST['yop'],  "text"));

  mysqli_select_db($Connection,$database_Connection);
  $Result1 = mysqli_query($Connection,$insertSQL) or die(mysqli_error());

}




?>




<script>

 $(document).ready(function(){


swal('Success!', 'You have been registered', 'success').then(function() {window.location.href = "../../";
});


  })

</script>






