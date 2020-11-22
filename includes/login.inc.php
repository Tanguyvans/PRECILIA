<?php

if (isset($_POST[submit])){

    $IDPMatricule = $_POST["IDPMatricule"];
    $MDP = $_POST["MDP"];

    require "../config.php";
    $bdd = new PDO($dsn, $username, $password);

    if(emptyInputLogin($IDPMatricule, $MDP) !==false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($bdd, $IDPMatricule, $MDP);

}