<?php
session_start();
include_once('conexion/conexion.php');                        
if (isset($_POST['subir'])) {
    $nombre = $_FILES['archivo']['name'];
    $fecha = date("Y-m");
    //$fecha = $_POST['fecha'];
	$tipo = $_FILES['archivo']['type'];
	$ruta = $_FILES['archivo']['tmp_name'];
    opendir($ruta);
    $destino = "../archivos/" . $nombre;
    $tipoArchivo = strtolower(pathinfo($destino,PATHINFO_EXTENSION));
     if ($nombre !="") {
        if($tipoArchivo =="pdf"){
   	if (copy($ruta, $destino)) {
       // $row_count = sqlsrv_num_rows( $stm );
        if(!empty($fecha)){
            $ant = strtoupper(urldecode(stripslashes($fecha)));
            $fec =strtoupper($ant);
                $sq =  "SELECT fecha FROM dbo.[documentos] where fecha='".$fecha."'";
            $stm = sqlsrv_query( $conn, $sq );
            if( $stm === false) {
                die( print_r( sqlsrv_errors(), true) );
            }
            if( $row = sqlsrv_fetch_array( $stm, SQLSRV_FETCH_ASSOC) ) {
             echo "<script type=\"text/javascript\">alert(\"La fecha ya esta disponible, intente el siguiente mes.\");</script>";
        } else {
            echo "<script type=\"text/javascript\">alert(\"aqui entra.\");</script>";
            $sql = "INSERT INTO dbo.[documentos]  VALUES('".$nombre."','".$fecha."','".$tipo."','".$_SESSION['UserID']."')";
            $stmt = sqlsrv_query( $conn, $sql );
            if( $stmt === false) {
                die( print_r( sqlsrv_errors(), true) );
            }
            echo "<script type=\"text/javascript\">alert(\"Se guardo correctamente.\");</script>";
        }
            
    }
        
}
}
}else{
          function mostrar($muestra){
 
              $salida = "Seleccione un archivo PDF";
 
                return $salida;
}
     }
}

?>