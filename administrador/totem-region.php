<?php
/**
* @version     $Id: 'administrador/totem-region.php' 04-08-2007 02:54:00 Moises Jafet$
* @package     "[:DRmap(WebGUI):]"
* @copyright   Copyright (C) 2007 Moises Jafet Cornelio-Vargas. All rights reserved.
* @license     GNU/GPL, see LICENSE.TXT
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

defined( '_VALID_CPTICRD' ) or die( 'Prohibido el Acesso a este Recurso' );

$pSufijo="-2";

?>
  <div id="Etiqueta" class="cabezote">
    <h2>Regi&oacute;n Geogr&aacute;fica al que pertenece la Provincia</h2><!-- Alternador de visibilidad del div de la forma -->

    <div id="agregador">
      <a href="#" onclick="showhide('ventana'); return(false);">++Agregar Item</a>
    </div>
  </div>

  <div id="ventana" style="display: none;" class="forma<?php echo $pSufijo ?>" title="Regi&oacute;n Geogr&aacute;fica al que pertenece la Provincia">
    <!-- Forma Regi�n Geogr�fica al que pertenece la Provincia -->

    <form name="region" action="demon-region.php?editar=region" method="post" id="region">
      <fieldset>
        <legend>Regi&oacute;n Geogr&aacute;fica al que pertenece la Provincia</legend>

        <div class="col1form<?php echo $pSufijo ?>">
          <span class="etiqueta<?php echo $pSufijo ?>"><label>Regi&oacute;n (obligatorio):</label></span> <span class="colcampoformaob<?php echo $pSufijo ?>"><input type="text" name=
          "region" size="39" maxlength="150"></span>
        </div>

        <div class="col1form<?php echo $pSufijo ?>">
          <span class="etiqueta<?php echo $pSufijo ?>"><label>Descripci&oacute;n:</label></span> <span class="colcampoforma<?php echo $pSufijo ?>">
          <textarea name="descripcion" cols="30" rows="10">
</textarea></span>
        </div>

        <div class="col1form<?php echo $pSufijo ?>">
          <input type="reset" name="borrar" value="Deshacer" class="botones<?php echo $pSufijo ?>"> <input type="submit" name="grabar" value="Grabar" class=
          "botones<?php echo $pSufijo ?>">
        </div>
      </fieldset>
    </form><script language="JavaScript" type="text/javascript">
var frmvalidator  =
new Validator("region");
frmvalidator.addValidation("region","req","El nombre es obligatorio");
</script>
  </div>

  <div id='Tabla de resultados' title='Tabla de resultados'>
    <?php

    if (!$db_conector) {
        die('NO conecta, �Alerta al Webmaster!: ' . mysql_error());

    }

    $nombre_tabla = "region_geografica";

    //Articula el nombre local de la tabla con el prefijo general en la base de datos. 
    $db_tabla     =  $db_prefijo.$nombre_tabla;

              
    $result = mysql_query("SELECT * FROM $db_tabla ORDER BY id DESC")
              or die("NO conecta, �Alerta al Webmaster!");


    $id          = $rows['id'];
    $nombre      = $rows['nombre'];
    $descripcion = $rows['descripcion'];


    $color="1";

    echo '<table cellpadding="2" cellspacing="0">';
    echo "<tr class='etiqueta'><th class='thlistasiz'>Admin</th><th class='thlistasiz'></th>
    <th class='thlistasiz'>Id</th><th class='thlistasce'>Regi�n</th>
    <th class='thlistasde'>Descripci�n</th></tr>";
    while($rows=mysql_fetch_array($result)) {

    if($color==1) {

    echo "<tr id='impar'>
    <td class='tdlistased'>

        <form action='demon-region3.php' method='post'>
            <input type='hidden' name='borrar' value=".$rows['0']." />
            <input type='submit' name='bborrar' value='Borrar' class='botones$pSufijo' onClick=\"return confirm('Confirmar Borrar');\" />
        </form>

    </td>
    <td class='tdlistased'>

        <form action='totem-region2.php' method='post'>
            <input type='hidden' name='editar' value=".$rows['0']." />
            <input type='submit' name='eeditar' value='Editar' class='botones$pSufijo' />
        </form>

    </td>
    <td class='tdlistasiz'>
    ".$rows['id']."
    </td>
    <td class='tdlistasce'>
    ".$rows['region']."
    </td>
    <td class='tdlistasde'>
    ".$rows['descripcion']."
    </td>
    </tr>";

    $color="2";

    }

    else {

    echo "<tr id='par'>
    <td class='tdlistased'>

        <form action='demon-region3.php' method='post'>
            <input type='hidden' name='borrar' value=".$rows['0']." />
            <input type='submit' name='bborrar' value='Borrar' class='botones$pSufijo' onClick=\"return confirm('Confirmar Borrar');\" />
        </form>

    </td>
    <td class='tdlistased'>

        <form action='totem-region2.php' method='post'>
            <input type='hidden' name='editar' value=".$rows['0']." />
            <input type='submit' name='eeditar' value='Editar' class='botones$pSufijo' />
        </form>

    <td class='tdlistasiz'>
    ".$rows['id']."
    </td>
    <td class='tdlistasce'>
    ".$rows['region']."
    </td>
    <td class='tdlistasde'>
    ".$rows['descripcion']."
    </td>
    </tr>";

    $color="1";

    }

    }
    echo '</table>';

    mysql_close($db_conector);
    ?>
  </div>
