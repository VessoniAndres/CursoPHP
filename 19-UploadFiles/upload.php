<?php

//Sitring para la ruta del archivo a subir
$folder = "uploads/";
//Ruta relativa al archivo
$file = $folder . basename($_FILES["file"]["name"]);
//Tipo de Archivo.
$fileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));
//Si el archivo es una imagen:
//Tamaño de la imagen (PX);
//Si el archivo no es una imagen dara false.
$px = getimagesize($_FILES["file"]["tmp_name"]);
if($px !== false){
    //Si el archivo tiene dimensiones de imagen entonces es una imagen 
    //y por tanto su tamaño en bits es:
    $size = $_FILES["file"]["size"];
    //Si resulta que el archivo es demasiado grande:
    if( $size > 500000){
        echo 'The size of the flie must be lower than 500kb';
    }else{
        //Si tiene el tamaño correcto: Pero queremos que solo sea de tipo jpg;
        if($fileType == 'jpg' || $fileType === 'webp'){
            //Se valido el archivo correctamente:
            if(move_uploaded_file($_FILES['file']['tmp_name'],$file)){
                echo 'The file has been uploaded correctly';
            }else{
                //Si no se llega a subir fijarse en los permisos de la carpeta
                echo 'There was an error on the upload of the file';
            }
        }else{
            echo 'Only files type jpg/jepg are accepted';
        }
    }
}else{
    echo "The document isn't an image";
}

?>