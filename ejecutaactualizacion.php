<?php


extract($_POST);	
	include '../conexion/conexion.php'; 
	$sql="update member set Username='$user', Password='$pass', Name='$name', Status='$status' where UserID='$id'";
	 $stmt = sqlsrv_query( $conn, $sql );
		if( $stmt === false) {
                die( print_r( sqlsrv_errors(), true) );
            }
	if ($stmt=null) {
		echo "Error de procesamieno no se han actuaizado los datos";
		echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		header("location: admin.php");
		
		echo "<script>location.href='../vistas/admin.php'</script>";
	}else {
		echo '<script>alert("USUARIO ACTUALIZADO")</script> ';
		
		echo "<script>location.href='../vistas/admin.php'</script>";

		
	}
?>