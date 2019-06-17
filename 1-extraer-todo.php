<?php
/**
 * Extraer un zip con PHP
 * Ejemplo 1
 *
 * @author parzibyte
 * Más tutoriales en: parzibyte.me/blog
 */
$zip = new ZipArchive;
$rutaArchivo = __DIR__ . "/documentos.zip";
$directorioSalida = __DIR__ . "/documentos";
if (!$zip->open($rutaArchivo)) {
    exit("No se puede abrir el archivo $rutaArchivo");
}

$zip->extractTo($directorioSalida);
$zip->close();
