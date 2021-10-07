<?php
	$usuario=$_POST['Username'];
	$pass= $_POST['Password'];
	$rpass=$_POST['rpass'];
    $name=$_POST['Name'];
    $status=$_POST['Status'];
	
	include '../conexion/conexion.php'; 
    if($pass==$rpass){
	 if(!empty($usuario)){
            $ant = strtoupper(urldecode(stripslashes($usuario)));
            $fec =strtoupper($ant);
                $sq =  "SELECT * FROM dbo.[member] where Username='".$usuario."'";
            $stm = sqlsrv_query( $conn, $sq );
            if( $stm === false) {
                die( print_r( sqlsrv_errors(), true) );
            }
            if( $row = sqlsrv_fetch_array( $stm, SQLSRV_FETCH_ASSOC) ) {
             echo ' <script language="javascript">alert("Atencion, ya existe el usuario designado para un usuario, verifique sus datos");</script> ';
        } else {
            $sql = "INSERT INTO member(Username,Password,Name,Status) VALUES('".$usuario."','".$pass."','".$name."','".$status."')";
            $stmt = sqlsrv_query( $conn, $sql );
            if( $stmt === false) {
                die( print_r( sqlsrv_errors(), true) );
            }
            echo "<script type=\"text/javascript\">alert(\"Usuario registrado con éxito.\");</script>";
        }
            
    }
    }else{
        echo ' <script language="javascript">alert("Las contraseñas son incorrectas");</script> ';
    }


 ?>