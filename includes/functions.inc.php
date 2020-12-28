<?php

function emptyInputPersonnel($IDPMatricule, $Nom, $Prenom, $Email, $Grade, $MDP, $MDPR){
    if(empty($IDPMatricule) || empty($Nom) || empty($Prenom) || empty($Email) || empty($Grade) || empty($MDP) || empty($MDPR)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emptyInputEtudiant($IDEMatricule, $Nom, $Prenom, $Email, $Annee, $MDP, $MDPR){
    if(empty($IDEMatricule) || empty($Nom) || empty($Prenom) || empty($Email) || empty($Annee) || empty($MDP) || empty($MDPR)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emptyInputCours($IDCours, $NombreCredit, $NombreHeure, $Titulaire, $UE, $MotCle1, $MotCle2){
    if(empty($IDCours) || empty($NombreCredit) || empty($NombreHeure) || empty($Titulaire) || empty($UE) || empty($MotCle1) || empty($MotCle2)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emptyInputEvent($Type, $Nom, $Acronyme, $Description, $MotCle1, $MotCle2, $DateDebut){
    if(empty($Type) || empty($Nom) || empty($Acronyme) || empty($Description) || empty($MotCle1) || empty($MotCle2) || empty($DateDebut)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emptyInputLieu($Ville, $Pays){
    if(empty($Ville) || empty($Pays)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emptyInputProjet($Titre, $DateDebut, $Description, $MotCle1, $MotCle2){
    if(empty($Titre) || empty($DateDebut) || empty($Description) || empty($MotCle1) || empty($MotCle2)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emptyInputStageEnt($DateDebut, $CollaborateurIndustrielle, $MotCle1, $MotCle2, $IDPMatricule, $IDEMatricule){
    if(empty($DateDebut) || empty($CollaborateurIndustrielle) || empty($MotCle1) || empty($MotCle2) || empty($IDPMatricule) || empty($IDEMatricule)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emptyInputStageRch($DateDebut, $MotCle1, $MotCle2, $IDPMatricule){
    if(empty($DateDebut) || empty($MotCle1) || empty($MotCle2) || empty($IDPMatricule)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emptyInputTFE($Titre, $DateDebut, $MotCle1, $MotCle2, $IDPMatricule, $IDEMatricule){
    if(empty($Titre) || empty($DateDebut) || empty($MotCle1) || empty($MotCle2) || empty($IDPMatricule) ||empty($IDEMatricule)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emptyInputThese($Titre, $DateDebut, $Description, $MotCle1, $MotCle2, $IDPMatricule){
    if(empty($Titre) || empty($DateDebut) || empty($Description) || empty($MotCle1) || empty($MotCle2) ||empty($IDPMatricule)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function ifModif($value){
    if(empty($value)){
        $result = false;
    }
    else {
        $result = true;
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

function CoursExist($conn, $IDCours){

    $sql = "SELECT * FROM COURS WHERE IDCours = ? ;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo"there is an error";
    }

    mysqli_stmt_bind_param($stmt, "s", $IDCours);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        return false;
    }
    misqli_stmt_close($stmt);
}

function PersonnelExist($conn, $IDPMatricule){

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

function LieuExist($conn, $Ville, $Pays){
    $sql = "SELECT * FROM LIEU WHERE Ville = ? AND Pays = ? ;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo"there is an error";
    }
    mysqli_stmt_bind_param($stmt, "ss", $Ville, $Pays);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        return false;
    }
    misqli_stmt_close($stmt);
}

function EtudiantExist($conn, $IDEMatricule){

    $sql = "SELECT * FROM ETUDIANT WHERE IDEMatricule = ? ;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo"there is an error";
    }

    mysqli_stmt_bind_param($stmt, "s", $IDEMatricule);
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

function createEtudiant($conn, $IDEMatricule, $Nom, $Prenom, $Email, $Annee, $MDP)
{

    $sql = "INSERT INTO ETUDIANT (IDEMatricule, Nom, Prenom, Email, Annee, MotDePasse)
		VALUES ( ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "there is an error";
    }

    $hashedMDP = password_hash($MDP, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $IDEMatricule, $Nom, $Prenom, $Email, $Annee, $hashedMDP);
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

function loginPersonnel($conn, $IDPMatricule, $MDP){
    $uidExist = PersonnelExist($conn, $IDPMatricule);

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
        $_SESSION["Psession"]= $uidExist["IDPMatricule"];
        header("location: Profil.php");
        exit();
    }

}

function loginEtudiant($conn, $IDEMatricule, $MDP){
    $uidExist = EtudiantExist($conn, $IDEMatricule);

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
        $_SESSION["Esession"]= $uidExist["IDEMatricule"];
        header("location: Profil.php");
        exit();
    }

}



