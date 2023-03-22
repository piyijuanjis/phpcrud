<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD sin autoincremental</title>
<link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>

<?php

  include("conexion.php");

  
  //primer paso 1.1 READ o LEER!!!
  //ponemos nuestra base de datos

  $registros=$base->query("SELECT * FROM productos")->fetchALL(PDO::FETCH_OBJ);

  //tercer paso 3.2 CREATE o CREAR!!!
  //aquí vamos a añadir como variables "$...." los nombres q aparecen en la base de datos

if(isset($_POST["cr"])){
    
  $codigoarticulo = $_POST["CODIGOARTICULO"];
  $seccion = $_POST["SECCION"];
  $nombrearticulo = $_POST["NOMBREARTICULO"];
  $precio = $_POST["PRECIO"];
  $fecha = $_POST["FECHA"];
  $importado = $_POST["IMPORTADO"];
  $paisdeorigen = $_POST["PAISDEORIGEN"];


  //tercer paso 3.3 CREATE o CREAR!!!
//ahora en la consulta tambien ponemos los campos de la tabla
//por ejemplo si es una tabla de usuarios sería así
//$sql="INSERT INTO crud (NOMBRE, APELLIDO, DIRECCION) VALUES(:nom, :ape, :dir)";
//$resultado->execute(array(":nom"=>$nombre, ":ape"=>$apellido, ":dir"=>$direccion));

  $sql="INSERT INTO productos (CODIGOARTICULO, SECCION, NOMBREARTICULO, PRECIO, FECHA, IMPORTADO, PAISDEORIGEN) VALUES(:codArt, :seccion, :nomArt, :precio, :fecha, :importado, :paisOri)";

  $resultado=$base->prepare($sql);

  //tercer paso 3.4 CREATE o CREAR!!!
  //aqui modificamos los valores para q los cargue en la tabla esto es si fuese una tabla de usuarios
  //$resultado->execute(array(":nom"=>$nombre, ":ape"=>$apellido, ":dir"=>$direccion));
  //y ya tendríamos listo el CREATE o crear

  $resultado->execute(array(":codArt" => $codigoarticulo, ":seccion" => $seccion, ":nomArt" => $nombrearticulo, ":precio" => $precio, ":fecha" => $fecha, ":importado" => $importado, ":paisOri" => $paisdeorigen));

  header("Location:indexInicial.php");

  }

//quinto paso 5.2 buscador!!!
//añadimos este código
  if (isset($_POST["busqueda"])) {
    $busqueda = $_POST["busqueda"];
    $query = "SELECT * FROM productos WHERE CODIGOARTICULO LIKE '%$busqueda%' OR SECCION LIKE '%$busqueda%' OR NOMBREARTICULO LIKE '%$busqueda%' OR PRECIO LIKE '%$busqueda%' OR FECHA LIKE '%$busqueda%' OR IMPORTADO LIKE '%$busqueda%' OR PAISDEORIGEN LIKE '%$busqueda%'";
    $registros = $base->query($query)->fetchAll(PDO::FETCH_OBJ);
  }


?>
<!--primer paso 1.2 READ o LEER!!!
hacemos los cambios en la tabla para q aparezcan los mismos campos q en la tabla-->
<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>
<form action="<?php echo $_SERVER ['PHP_SELF'];?>"method="post">

  <table width="50%" border="0" align="center">
    <tr >
    <td class="primera_fila">CODIGOARTICULO</td>
        <td class="primera_fila">SECCION</td>
        <td class="primera_fila">NOMBREARTICULO</td>
        <td class="primera_fila">PRECIO</td>
        <td class="primera_fila">FECHA</td>
        <td class="primera_fila">IMPORTADO</td>
        <td class="primera_fila">PAISDEORIGEN</td>
    </tr> 
    <tr>
      <!--quito paso 5.1 buscador!!!
    añadimos la parte de busqueda en la tabla-->
    <td colspan="7" class="primera_fila">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="busqueda">Buscar:</label>
        <input type="text" id="busqueda" name="busqueda">
        <input type="submit" name="submit" value="Buscar">
      </form>
    </td>
  </tr>
  
   <!--
    primer paso 1.3 READ o LEER!!!
    aquí vamos a introducir lo q tenemos en la tabla en la base de datos
    tal y como lo tenemos en la base de datos respetando mayusculas.
    hasta aquí ya tenemos el READ o leer.
   -->


		<?php
    
    foreach($registros as $articulo):?>

    <tr>
      <td><?php echo $articulo->CODIGOARTICULO?> </td>
      <td><?php echo $articulo->SECCION?> </td>
      <td><?php echo $articulo->NOMBREARTICULO?> </td>
      <td><?php echo $articulo->PRECIO?> </td>
      <td><?php echo $articulo->FECHA?> </td>
      <td><?php echo $articulo->IMPORTADO?> </td>
      <td><?php echo $articulo->PAISDEORIGEN?> </td>

      <!--
        segundo paso 2.1 BORRAR o DELETE!!!
        aquí vamos a empezar con el borrar
        tenemos q cambiar todo lo referente a lo q queremos usar de referencia para 
        borrar la línea en este caso codigoarticulo
        y vamos a la página de borrar.php
      -->
 
      <td class="bot"><a href="borrar.php?CODIGOARTICULO=<?php echo $articulo->CODIGOARTICULO?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
      

      <!--
        cuarto paso 4.1 UPDATE o ACTUALIZAR!!!
        aquí vamos a poner lo q tengamos en el formulario
        de añadir, q aunq no tenga nada q ver coincide y nos vamos a modificar el 
        editar inicial.php
      -->
      <td class='bot'>
        <a
            href="editarInicial.php?CODIGOARTICULO=<?php echo $articulo->CODIGOARTICULO ?> & SECCION=<?php echo $articulo->SECCION ?> & NOMBREARTICULO=<?php echo $articulo->NOMBREARTICULO?> & PRECIO=<?php echo $articulo->PRECIO ?>& FECHA=<?php echo  $articulo->FECHA ?> & IMPORTADO=<?php echo $articulo->IMPORTADO ?> & PAISDEORIGEN=<?php echo $articulo->PAISDEORIGEN ?>">                       
        <input type='button' name='up' id='up' value='Actualizar'></a></td>
    </tr> 
    
    <?php
    endforeach;
    ?>


    <!--
      tercer paso 3.1 CREATE o CREAR!!!
      aquí vamos a crear las columnas vacías donde vamos a introducir los datos, tenemos q añadir un td por cada uno q haya en la tabla de la base de datos, para crear
      importante q donde pone "name" coincida con lo q tenemos en la línea 23
    -->    
    <tr>
        <td><input type='text' name='CODIGOARTICULO' size='10' class='centrado'></td>
        <td><input type='text' name='SECCION' size='10' class='centrado'></td>
        <td><input type='text' name='NOMBREARTICULO' size='10' class='centrado'></td>
        <td><input type='text' name='PRECIO' size='10' class='centrado'></td>
        <td><input type='text' name='FECHA' size='10' class='centrado'></td>
        <td><input type='text' name='IMPORTADO' size='10' class='centrado'></td>
        <td><input type='text' name='PAISORIGEN' size='10' class='centrado'></td>
        <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
    </tr>    
    </table>
  </form>
<p>&nbsp;</p>
</body>
</html>