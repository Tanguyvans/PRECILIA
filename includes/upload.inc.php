<?php

if(isset($_POST['submitP'])){
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

    $allowed = array('jpg','png');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize <10000000){
                $fileNameNew = $_SESSION["Psession"].".".$fileActualExt;
                $fileDestination = '../imageP/'.$fileNameNew;
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

if(isset($_POST['submitE'])){
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

    $allowed = array('jpg');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize <10000000){
                $fileNameNew = $_SESSION["Esession"].".".$fileActualExt;
                $fileDestination = '../imageE/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
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

if(isset($_POST['submitEvent'])){
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

    $allowed = array('jpg');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize <10000000){
                $fileNameNew = $_GET['ID'].".".$fileActualExt;
                $fileDestination = '../imageEvent/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
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