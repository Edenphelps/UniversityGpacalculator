<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER ['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
   $_SESSION['cuser'] = NULL;
   $_SESSION['RoleID'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
  unset($_SESSION['cuser']);
   unset($_SESSION['RoleID']);

  $logoutGoTo = "../../";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}


$colname_users = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_users = $_SESSION['MM_Username'];

}
mysqli_select_db($Connection,$database_Connection);
$query_users = sprintf("Select * from vwuser where username = %s", GetSQLValueString($colname_users, "text"));
$users = mysqli_query($Connection,$query_users) or die(mysqli_error());
$row_users = mysqli_fetch_assoc($users);
$totalRows_users = mysqli_num_rows($users);

//initialize the session

mysqli_free_result($users);
?>









<header class="main-header"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
        <nav class="navbar navbar-static-top" role="navigation">



          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <li class="dropdown user user-menu">
                <a href="<?php echo $logoutAction ?>">
                  <img src="../../imgz/user.png" class="user-image" alt=""/>
                  <span class="hidden-xs">LOGOUT</span>
                </a>


              </li>
            </ul>
          </div>
        </nav>
      </header>
