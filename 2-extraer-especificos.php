<?php
/**
 * Extraer un zip con PHP
 * Ejemplo 2
 *
 * @author parzibyte
 * Más tutoriales en: parzibyte.me/blog
 */
$zip = new ZipArchive;
$rutaArchivo = __DIR__ . "/documentos.zip";
$directorioSalida = __DIR__ . "/documentos";
$archivosRequeridos = ["6-imagenes.pdf", "imágenes/C Reserved words.png"];
if (!$zip->open($rutaArchivo)) {
    exit("No se puede abrir el archivo $rutaArchivo");
}

$zip->extractTo($directorioSalida, $archivosRequeridos);
$zip->close();
