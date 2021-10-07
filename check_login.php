<?php
	ini_set('display_errors', 0);
	error_reporting(~0);

	session_start();
    include '../conexion/conexion.php';
	$strSQL = "SELECT * FROM member WHERE Username=? and Password=?";
	$parameters = [$_POST["txtUsername"], $_POST["txtPassword"]];
	$objQuery = sqlsrv_query($conn, $strSQL, $parameters);
	$objResult = sqlsrv_fetch_array($objQuery,SQLSRV_FETCH_ASSOC);
	
	if(!$objResult)
	{
        
			//echo "<script type=\"text/javascript\">alert(\"usuario o contraseña incorrectos.\");</script>";
        //echo "<script>location.href='../login.php'</script>";	 
        echo '<span>El usuario y/o clave son incorrectas, vuelva a intentarlo.</span>';
            //header("location:../login.php");
            //echo"<script> alert('no existe')</script>";
      //  echo"<script> alert('Usuario Logeado')</script>";
       // echo 'error';
	}
	else
	{
			$_SESSION["UserID"] = $objResult["UserID"];
			$_SESSION["Status"] = $objResult["Status"];

			session_write_close();
			
			if($objResult["Status"] == "USER")
			{
				echo '<script>location.href = "../../proyecto1/vistas/admin_page.php"</script>';
			}
			else
			{
			     echo '<script>location.href = "../../proyecto1/vistas/admin.php"</script>';	
			}
	}
	sqlsrv_close($objCon);
?>