<?php 
include '../conexion/conexion.php';   
if ($_FILES['archivo']['name']=="") {
    $s =  "update dbo.[documentos] set fecha='".$_POST['fecha']."' where [id_documentos]=".$_POST['id'].";";
    $stmt = sqlsrv_query( $conn, $s );
            if( $stmt === false) {
                die( print_r( sqlsrv_errors(), true) );
            }
            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            unlink("../archivos/".$f['nombre_documento']);
            }
}else{
    $sq =  "select nombre_documento from dbo.[documentos] where".$_POST['id'].";";
    $stmt = sqlsrv_query( $conn, $sq );
            if( $stmt === false) {
                die( print_r( sqlsrv_errors(), true) );
            }
            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            unlink("../archivos/".$f['nombre_documento']);
            }
        $ruta = "../archivos/";
		opendir($ruta);
		$destino = $ruta.$_FILES['archivo']['name'];
		copy($_FILES['archivo']['tmp_name'],$destino);
		$nombre=$_FILES['archivo']['name'];
    $sql =  "update dbo.[documentos] set [nombre_documento]='".$nombre."' where id_documentos=".$_POST['id'].";";
    $stmt = sqlsrv_query( $conn, $sql );
            if( $stmt === false) {
                die( print_r( sqlsrv_errors(), true) );
            }
            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            unlink("../archivos/".$f['nombre_documento']);
            }
}
header("Location: ../vistas/mensaje.php");
?>