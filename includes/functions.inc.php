<?php

function emptyInputSignup($IDPMatricule, $Nom, $Prenom, $Email, $Grade, $MDP, $MDPR){
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

function uidExist($conn, $IDPMatricule){

    $sql = "SELECT * FROM PERSONNEL WHERE IDPMatricule = ? ;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo"there is an error";
    }

    mysqli_stmt_bind_param($stmt, "s", $IDPMatricule);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        return false;
    }
    misqli_stmt_close($stmt);
}

function createPersonnel($conn, $IDPMatricule, $Nom, $Prenom, $Email, $Telephone, $Grade, $MDP)
{

    $sql = "INSERT INTO PERSONNEL (IDPMatricule, Nom, Prenom, Email, Telephone, Grade, MotDePasse)
		VALUES ( ?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "there is an error";
    }

    $hashedMDP = password_hash($MDP, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssss", $IDPMatricule, $Nom, $Prenom, $Email, $Telephone, $Grade, $hashedMDP);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

}


function emptyInputLogin($IDPMatricule, $MDP){

    if(empty($IDPMatricule) || empty($MDP)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $IDPMatricule, $MDP){
    $uidExist = uidExist($conn, $IDPMatricule);

    if($uidExist === false){
        echo("identifiant n'existe pas");
        //header("location: ../login.php?error=wronglogin");
        //exit();
    }

    $MDPhashed = $uidExist["MotDePasse"];
    $checkMDP = password_verify($MDP, $MDPhashed);

    if($checkMDP === false){
        //header("location: ../login.php?error=wronglogin");
        //exit();
    }
    else if ($checkMDP ===true){
        session_start();
        $_SESSION["Matricule"]= $uidExist["IDPMatricule"];

        header("location: MainPages/Accueil.php");
        exit();
    }

}



