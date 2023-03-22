<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

<h1>ACTUALIZAR</h1>

<?php

include("conexion.php");

if(!isset($_POST["bot_actualizar"])){

//cuarto paso 4.3 UPDTE o ACTUALIZAR!!!
// aquí vamos a poner los campos de la tabla q van a cambiarse
$codigoarticulo = $_GET["CODIGOARTICULO"];
$seccion = $_GET["SECCION"];
$nombrearticulo = $_GET["NOMBREARTICULO"];
$precio = $_GET["PRECIO"];
$fecha = $_GET["FECHA"];
$importado = $_GET["IMPORTADO"];
$paisdeorigen =$_GET["PAISDEORIGEN"];
//Edita por post los nuevos valores
} else {
//Corresponde a los name del formulario
$codigoarticulo = $_POST["CODIGOARTICULO"];
$seccion = $_POST["SECCION"];
$nombrearticulo = $_POST["NOMBREARTICULO"];
$precio = $_POST["PRECIO"];
$fecha = $_POST["FECHA"];
$importado = $_POST["IMPORTADO"];
$paisdeorigen =$_POST["PAISDEORIGEN"];

//cuarto paso 4.4 UPDATE o ACTUALIZAR!!!
// tenemos q cambiar la consulta sql y poner nuestros datos
// y con esto ya tendríamos listo el UPDATE o actualizar

$sql = "UPDATE productos SET CODIGOARTICULO=:codArt, SECCION=:seccion, NOMBREARTICULO=:nomArt, PRECIO=:precio, FECHA=:fecha, IMPORTADO=:importado, PAISDEORIGEN=:paisOri WHERE CODIGOARTICULO=:codArt";

    $resultado=$base->prepare($sql);
    $resultado->execute(array(":codArt" => $codigoarticulo, ":seccion" => $seccion, ":nomArt" => $nombrearticulo, ":precio" => $precio, ":fecha" => $fecha, ":importado" => $importado, ":paisOri" => $paisdeorigen));
    
    header("Location:indexInicial.php");

  }
?>
<!--
  cuarto paso 4.2 UPDATE o ACTUALIZAR!!!
  aquí vamos añadir los campos q queremos modificar, importante q los name y los id coincidan
  ya q es lo q utilizamos para tomar la referencia del cambio
-->
<p>

</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table width="25%" border="0" align="center">
  <tr>
        <td>CODIGOARTICULO</td>
        <td><label for="CODART"></label>
          <input type="hidden" name="CODIGOARTICULO" id="CODART" value="<?php echo $codigoarticulo ?>">
          <?php echo $codigoarticulo ?>
        </td>
      </tr>
      </>
      <tr>
        <td>SECCION</td>
        <td><label for="seccion"></label>
          <!-- Referencia en php para el nombre -->
          <input type="text" name="SECCION" id="seccion" value="<?php echo $seccion ?>">
        </td>
      </tr>

      <tr>
        <td>NOMBREARTICULO</td>
        <td><label for="NOMART"></label>
          <!-- Referencia en php para el apellido -->
          <input type="text" name="NOMBREARTICULO" id="NOMART" value="<?php echo $nombrearticulo ?>">
        </td>
      </tr>
      <tr>

        <td>PRECIO</td>
        <td><label for="precio"></label>
          <!-- Referencia en php para el apellido -->
          <input type="text" name="PRECIO" id="precio" value="<?php echo $precio ?>">
        </td>
      </tr>

      <tr>
        <td>FECHA</td>
        <td><label for="fecha"></label>
          <!-- Referencia en php para la direccion -->
          <input type="text" name="FECHA" id="fecha" value="<?php echo $fecha ?>">
        </td>
      </tr>

      <tr>
        <td>IMPORTADO</td>
        <td><label for="importado"></label>
          <input type="text" name="IMPORTADO" id="importado" value="<?php echo $importado ?>">
          
        </td>
      </tr>
      <tr>
        <td>PAISDEORIGEN</td>
        <td><label for="paisdeorigen"></label>
          <input type="text" name="PAISDEORIGEN" id="paisdeorigen" value="<?php echo $paisdeorigen ?>">
        </td>
      </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>