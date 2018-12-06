<?php
if(!(isset($_GET['tabla'])))
{
    echo 'Error: SeccionAdministracionDisciplinar.php';
    return;
}
$tabla = $_GET['tabla'];
$padre = isset($_GET['padre']) ? $_GET['padre'] : '';
$relacion = isset($_GET['relacion']) ? $_GET['relacion'] : '';
echo
  // class="accordion" es la clase que fue creada originalmente
  // para <button>tbl_nombre</button>, pero se movio de esta forma
  // para facilitar la funcionalidad de img.accion
  '<div class="accordion">'
  // Se manda informacion en el mismo boton
. '    <span data-padre="' . $padre . '" data-relacion="' . $relacion . '">'
.          $tabla
. '    </span>'
  // Estos botones son usados para modificar la
  // informacion de la tabla
. '    <img src="Imagenes/Cancelar.png" class="accion">'
. '    <img src="Imagenes/Anadir.png" class="accion">'
. '    <img src="Imagenes/Eliminar.png" class="accion">'
. '    <img src="Imagenes/Editar.png" class="accion">'
. '    <img src="Imagenes/Guardar.png" class="accion">'
. '    <img src="Imagenes/Todo.png" class="accion">'
. '    <img src="Imagenes/CheckBox.png" class="accion">'
. '</div>'
  // En esta area es mostrada la tabla de la BD
. '<div class="panel">'
. '    <td colspan="100%">'
. '        <form class="tabla"></form>'
. '    </td>'
. '</div>'
  // Se crea un espacio un tanto elegante :v
. '<div class="espacio"></div>';
?>
