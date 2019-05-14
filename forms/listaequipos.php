<?php 
include ("../clases/equipos.php");
include ("../lib/db.php");
include("../lib/constantes.php");
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Codigo</th><th>Nombre</th></tr>";

$db= new DBConnect();
        $dblink=$db->conexion();
        
        if (!isset($dblink)){
            return false;
        }
        $stmt = $dblink->prepare("SELECT codigo, nombre FROM equipo");
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
echo "</table>";
?> 