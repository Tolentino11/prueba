<?php
include '../conexion/conexion.php';  
$id= $_GET['id'];
 $sq =  "select nombre_documento from documentos where id_documentos=".$id.";";
    $stmt = sqlsrv_query( $conn, $sq );
            if( $stmt === false) {
                die( print_r( sqlsrv_errors(), true) );
            }
            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                $espera = unlink("../archivos/".$f['archivo']);
	}
	$sql = "delete from documentos where id_documentos =".$id.";";
    $stmt = sqlsrv_query( $conn, $sql );
            if( $stmt === false) {
                die( print_r( sqlsrv_errors(), true) );
            }
	 
	if ($sql) { echo "<script type=\"text/javascript\">alert(\"El documento fue eliminado correctamente.\");</script>";
				echo "<script>location.href='../vistas/lista_doc.php'</script>";	   }
?>
