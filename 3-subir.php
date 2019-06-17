<?php
/*
Subir archivo a servidor con PHP
@author parzibyte
 */
# La carpeta en donde guardaremos los archivos, en este caso es "subidas" pero podría ser
# cualqueir otro, incluso podría ser aquí mismo sin subcarpetas
$rutaDeSubidas = __DIR__ . "/zips";
# Crear si no existe
if (!is_dir($rutaDeSubidas)) {
    mkdir($rutaDeSubidas, 0777, true);
}
# Tomar el archivo. Recordemos que "archivo" es el atributo "name" de nuestro input
$informacionDelArchivo = $_FILES["archivo"];
# La ubicación en donde PHP lo puso
$ubicacionTemporal = $informacionDelArchivo["tmp_name"];
#Nota: aquí tomamos el nombre que trae, pero recomiendo renombrarlo a otra cosa usando, por ejemplo, uniqid
$nombreArchivo = $informacionDelArchivo["name"];
$nuevaUbicacion = $rutaDeSubidas . "/" . $nombreArchivo;
# Mover
$resultado = move_uploaded_file($ubicacionTemporal, $nuevaUbicacion);
if (!$resultado) {
    echo "Error al subir archivo";
    exit;
}
# Hasta aquí, el zip está bien. Vamos a extraerlo
$zip = new ZipArchive;
$directorioSalida = $rutaDeSubidas . "/" . uniqid();
if (!$zip->open($nuevaUbicacion)) {
    exit("No se puede abrir el archivo $rutaArchivo");
}

$zip->extractTo($directorioSalida);
$zip->close();
echo "Archivo $nuevaUbicacion descomprimido en $directorioSalida";
