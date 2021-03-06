<?php
/**
* @version    $Id: 'administrador/totem-areas2.php' 05-08-2007 03:18:00 Moises Jafet$
* @package    "[:DRmap(WebGUI):]"
* @copyright  Copyright (C) 2007 Moises Jafet Cornelio-Vargas. All rights reserved.
* @license    GNU/GPL, see LICENSE.TXT
*
* [:DRmap(WebGUI):] is free software; you can redistribute it and/or modify it under the
* terms of the GNU General Public License as published by the Free Software Foundation;
* either version 3 of the License, or any later version. As distributed it includes or
* is derivative of works licensed under the GNU General Public License or other free
* or open source software licenses.
*
* [:DRmap(WebGUI):] is distributed in the hope that it will be useful, but WITHOUT ANY
* WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
* PARTICULAR PURPOSE.  See the GNU General Public License for more details and
* COPYRIGHT.TXT for copyright notices and details.
*/

define( '_VALID_CPTICRD', 1 );

require_once "includes/mantenimientos.php";

$pSufijo="-2";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
  <title>Administraci&oacute;n | <?php echo $titulo ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=us-ascii">
  <link href="<?php echo $css ?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo $js ?>/gen_validatorv2.js">
</script>
</head>

<body>
  <div class="wrapper" align="center">
    <div id="core">
      <?php

      $editar = $_POST["editar"];

      if (!$editar) {die ('Prohibido el accesso directo a este recurso');

      }


      if (!$db_conector) {
          die('NO conecta, �Alerta al Webmaster!: ' . mysql_error());

      }

      $nombre_tabla = "areas_desarrollo";

      //Articula el nombre local de la tabla con el prefijo general en la base de datos. 
      $db_tabla     =  $db_prefijo.$nombre_tabla;

                
      $result = mysql_query("SELECT * FROM `$db_tabla` WHERE id = '$editar'")
      or die("Favor elegir un Item para editar");
      while ($rows = mysql_fetch_array($result)) {

      $id          = $rows['id'];
      $nombre      = $rows['nombre'];
      $descripcion = $rows['descripcion'];

      }
      ?>

      <div id="cabezote" title="::Consola de Administraci&oacute;n [:DRmap(WebGUI):]::">
        <div id="Titulo">
          <h1>::Consola de Administraci&oacute;n [:DRmap(WebGUI):]::</h1>
        </div>

        <div id="Etiqueta">
          <h2>Editor de Areas de Desarrollo (Clasificaci&oacute;n del Indotel)</h2>
        </div>

        <div id="editor" class="forma<?php echo $pSufijo ?>" title="Formulario Edicion Areas de Desarrollo (Clasificaci&oacute;n del Indotel)">
          <!-- Forma Areas de Desarrollo (Clasificaci�n del Indotel) -->

          <form name="areas" action="demon-areas2.php?id=<?php echo $editar ?>" method="post" id="areas">
            <fieldset>
              <legend>Areas de Desarrollo (Clasificaci&oacute;n del Indotel)</legend>

              <div class="col1form<?php echo $pSufijo ?>">
                <span class="etiqueta<?php echo $pSufijo ?>"><label>Nombre (obligatorio):</label></span> <span class="colcampoformaob<?php echo $pSufijo ?>"><input type="text" name=
                "nombre" size="39" value="<?php echo $nombre ?>" maxlength="150"></span>
              </div>

              <div class="col1form<?php echo $pSufijo ?>">
                <span class="etiqueta<?php echo $pSufijo ?>"><label>Descripci&oacute;n:</label></span> <span class="colcampoforma<?php echo $pSufijo ?>">
                <textarea name="descripcion" cols="30" rows="10">
<?php echo $descripcion ?>
</textarea></span>
              </div>

              <div class="col1form<?php echo $pSufijo ?>">
                <input type="reset" name="borrar" value="Deshacer" class="botones<?php echo $pSufijo ?>"> <input type="button" name="Cancelar" value="Cancelar" class=
                "botones<?php echo $pSufijo ?>" onclick="history.go(-1)"> <input type="submit" name="grabar" value="Grabar" class="botones<?php echo $pSufijo ?>">
              </div>
            </fieldset>
          </form><script language="JavaScript" type="text/javascript">
    var frmvalidator  = new Validator("areas");
    frmvalidator.addValidation("nombre","req","El nombre es obligatorio");
</script>
        </div>
      </div>
    </div><!-- Fin del Core -->
  </div><!-- Fin del Wrapper -->
</body>
</html>
