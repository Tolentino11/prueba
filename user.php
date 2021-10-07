<?php
	ini_set('display_errors', 0);
	error_reporting(~0);
	
	session_start();
	if($_SESSION['UserID'] == "")
	{  
        echo "<script>location.href='../index.php'</script>";
		exit();
	}


    require_once('../conexion/conexion.php');
	
	$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
	$objQuery = sqlsrv_query($conn, $strSQL);
	$objResult = sqlsrv_fetch_array($objQuery,SQLSRV_FETCH_ASSOC);
?>