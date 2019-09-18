<?php
include_once "./alumno.php";

// var_dump($_POST);
// var_dump($_FILES);
//datos alumno (cargados desde POSTMAN)
if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['legajo']))
{
    $nomAlumno = $_POST['nombre'];
    $apeAlumno = $_POST['apellido'];
    $legAlumno = $_POST['legajo'];
}

//datos foto de alumno
$origen = $_FILES["foto"]["tmp_name"];//path de archivo temporal
$nomarch = $_FILES["foto"]["name"];//nombre de archivo temporal adjunto

//variables de trabajo
$ubiFoto = './foto/';
$baseAlumnos = './alumnos.txt';

//proceso
$pathFoto = funciones::GuardaTemp2($origen,$ubiFoto,$nomarch,$legAlumno);

$alumno = new Alumno($nomAlumno,$apeAlumno,$legAlumno, $pathFoto);
var_dump($alumno);
funciones::Guardar($alumno,$baseAlumnos,'a');

echo("\n"."Listado de archivo"."\n");
var_dump(funciones::Listar($baseAlumnos));  

?>