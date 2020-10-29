<html>
<head>
<title>Procesa una subida de archivos </title>
<meta charset="UTF-8">
</head>
<?php
$codigosErrorSubida= [ 
    0 => 'Subida correcta',
    1 => 'El tamaño del archivo excede el admitido por el servidor',
    2 => 'El tamaño del archivo excede el admitido por el cliente',
    3 => 'El archivo no se pudo subir completamente',
    4 => 'No se selecciono ningun archivo para ser subido',
    6 => 'No existe un directorio temporal donde subir el archivo',
    7 => 'No se pudo guardar el archivo en disco',
    8 => 'Una extension PHP evito la subida del archivo'
]; 
$mensaje = '';


if ((empty($_FILES['archivo1']['name'])) && (empty($_FILES['archivo2']['name']))) {
    $mensaje .= 'ERROR: No se ha seleccionado ningun archivo';
} else 
    { 
        if ($_FILES['archivo1']['size'] > 200000 OR $_FILES['archivo2']['size'] > 200000 OR $_FILES['archivo1']['size'] + $_FILES['archivo2']['size']>300000) {
           $mensaje = 'ERROR: archivo demasiado grande';
        }else{
        if (($_FILES['archivo1']['type'] != 'image/jpg' && $_FILES['archivo1']['type'] != 'image/png')) {
            $mensaje .= 'ERROR: No se permite este tipo de archivo o no has introducido el primer archivo.';
        }else{
            $archivo1= CreacionVariables('archivo1');
            $mensaje1= mensaje($archivo1);
            for ($i=0; $i < sizeof($mensaje1); $i++ ){
                echo $mensaje1[$i];
            }
            echo "<hr>";
            
            $mensaje .= '<br />RESULTADO<br />';
            
            codigoDeError($archivo1, $mensaje, $codigosErrorSubida);
            
        }
        
        if (($_FILES['archivo2']['type'] != 'image/jpg' && $_FILES['archivo2']['type'] != 'image/png')) {
            $mensaje .= 'ERROR: No se permite este tipo de archivo o no has introducido el segundo archivo.';
        }else{
            $archivo2 = CreacionVariables('archivo2');
            $mensaje2= mensaje($archivo2);
            for ($i=0; $i < sizeof($mensaje2); $i++ ){
                echo $mensaje2[$i];
            }
            echo "<hr>";
            
            $mensaje .= '<br />RESULTADO<br />';
            codigoDeError($archivo2, $mensaje, $codigosErrorSubida);
        }
       }
        
}

    
    function mensaje($archivo) {
        $mensaje = ['Intentando subir el archivo: ' . ' <br />', 
            "- Nombre: $archivo[0]" . ' <br />', 
            '- Tamanio: ' . number_format(($archivo[2] / 1000), 1, ',', '.'). ' KB <br />', 
            "- Tipo: $archivo[1]" . ' <br />',
            "- Nombre archivo temporal: $archivo[3]" . ' <br />',
            "- Codigo de estado: $archivo[4]" . ' <br />'
            
        ] ;
        return $mensaje;
    }
    
function CreacionVariables($arch) {
   
    $archivo = [
        $_FILES[$arch]['name'], 
        $_FILES[$arch]['type'], 
        $_FILES[$arch]['size'], 
        $_FILES[$arch]['tmp_name'], 
        $_FILES[$arch]['error']
        
    ];
    return $archivo;
}

function codigoDeError($archivo, &$msg, $codigos) {
   $directorioSubida ='C:\Users\Alonso\Desktop\Nueva carpeta';
    if ($archivo[4] > 0) {
        $msg .= "Se ha producido el error  $archivo[4]: <em>"
        . $codigos[$archivo[4]] . '</em> <br />';
    } else { 
        if ( is_dir($directorioSubida) && is_writable ($directorioSubida)) {
            if (move_uploaded_file($archivo[3],  $directorioSubida .'/'. $archivo[0]) == true) {
                $msg .= 'Archivo guardado en: ' . $directorioSubida .'/'. $archivo[0] . ' <br />';
            } else {
                $msg .= 'ERROR: Archivo no guardado correctamente <br />';
            }
        } else {
            $msg .= 'ERROR: No es un directorio correcto o no se tiene permiso de escritura <br />';
        }
    }
}
?>


<body>
<?php echo $mensaje; ?>

<br />
	<a href="guardarImagenes.html">Volver a la pagina de subida</a>
</body>
</html>
