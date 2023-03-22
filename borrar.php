<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    include ("conexion.php");

    //segundo paso 2.2 BORRAR o DELETE!!!
    //aquí ponemos la referencia q hemos utilizado para borrar, importante cambiar la tabla
    //ya tendríamos listo el DELETE o borrar

    $codigoarticulo=$_GET["CODIGOARTICULO"];
    $base->query("DELETE FROM productos WHERE CODIGOARTICULO='$codigoarticulo'");
    header("Location:indexInicial.php");

?>
</body>
</html>


