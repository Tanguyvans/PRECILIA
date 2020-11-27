<?php


if(isset($_POST['submit'])){
    // FILE est une superglobal qui prend totues les info du fichier que l'on veut ajouter
    $file = $_FILES['file'];
    // prendre toutes les infos
    $fileName = $_FILES['file']['name'];
    // temporary location
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['Size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    // separe le .jpg ...
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize <10000000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'imagePERSONNEL/'.$fileNameNew;
                echo"salut";
                move_uploaded_file($fileTmpName, $fileDestination);
                header("index.php?uploadsucess");
            }else{
                echo "there was an error";
            }
        }else{
            echo "there was an error";
        }
    }else{
        echo "you can't upload files of this type";
    }
}