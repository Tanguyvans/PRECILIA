<?php

function emptyInput($IDPMatricule, $Nom, $Prenom, $Email, $Grade, $MDP, $MDPR){
    if(empty($IDPMatricule) || empty($Nom) || empty($Prenom) || empty($Email) || empty($Grade) || empty($MDP) || empty($MDPR)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($Email){
    if(!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($MDP, $MDPR){

    if($MDP !== $MDPR) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function uidExist($bdd, $IDPMatricule){


    $check= "SELECT COUNT(*) FROM PERSONNEL WHERE IDPMatricule = '$IDPMatricule'";
    if (mysqli_query($bdd,$check)>0)
    {
        $result = true;
    }
    else{

        $result = false;
    }
    return $result;
}

