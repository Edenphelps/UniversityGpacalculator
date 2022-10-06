<?php require_once('../../connections/connection.php'); ?>
<?php
if ((isset($_POST["username"])))
	
{

	 $username = $_POST['username'];

mysqli_select_db($Connection,$database_Connection);
$query_Rsentry = "SELECT username FROM `tblprofile` where username = '".$username. "' union SELECT username FROM `tblprofile` where username = '".$username. "'";
$Rsentry = mysqli_query($Connection,$query_Rsentry) or die(mysqli_error());
$row_Rsentry = mysqli_fetch_assoc($Rsentry);
$totalRows_Rsentry = mysqli_num_rows($Rsentry);




if ($totalRows_Rsentry>=1){
	echo '<div class="alert alert-danger fade in"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Sorry, Email is already taken!</div>';



?>

<script>


	document.getElementById("CA").disabled = true; 

</script>

<?php

}
else if (strlen($username)<=4){
	echo'<div class="alert alert-danger fade in"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Sorry, Email is Too short!</div>';

?>

<script>

	document.getElementById("CA").disabled = true; 

</script>

<?php

	}

	else if (strlen($username)>50) {
		echo '<div class="alert alert-danger fade in"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Sorry, Email is Too Long!</div>';
	}

else {


?>

<script>

	document.getElementById("CA").disabled = false; 

</script>

<?php


}


};

	
?>


