<?php
require "../config.php";
$bdd = new PDO($dsn, $username, $password);
?>
<link rel="stylesheet" href="../css/style.css" />

<?php
if (isset($_POST['submit'])) try {
    $IDCours = $_POST['IDCours'];
    $NombreCredit = $_POST['NombreCredit'];
    $NombreHeure=$_POST['NombreHeure'];
    $Titulaire=$_POST['Titulaire'];
    $UE = $_POST['UE'];
    $MotCle1=$_POST['MotCle1'];
    $MotCle2=$_POST['MotCle2'];

    # condition requise pour pouvoir entrer dans la base de donnée
    require "../Includes/functions.inc.php";
    if(emptyInputCours($IDCours, $NombreCredit, $NombreHeure, $Titulaire, $UE, $MotCle1, $MotCle2) !==false){
        echo"<h2> empty input </h2>";
    }
    elseif(CoursExist($conn, $IDCours) !== false){
        echo"<h2>Cours deja exitant</h2>";
    }
    else {
        $sql = "INSERT INTO COURS (IDCours, NombreCredit, NombreHeure , Titulaire, UE, MotCle1, MotCle2)
        VALUES ('$IDCours','$NombreCredit','$NombreHeure','$Titulaire','$UE','$MotCle1','$MotCle2')";
        $Resultat = $bdd -> exec($sql);
        echo"<h2>Ajout réussi</h2>";
        echo "<h3><a href='../Formulaires/jointurePersonnelCours.php?ID=$IDCours'> Nomer professeur au cours: $IDCours</a></h3>";
    }

} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}

?>

<?php //debut du formulaire, on peut utiliser action: nom de la page php qui v receptionner les donner ?>

<form method="post">

    <label for="IDCours">IDCours</label>
    <input type="text" name="IDCours" id="IDCours">

    <label for="NombreCredit">Nombre de crédit</label>
    <input type="number" name="NombreCredit" id="NombreCredit">

    <label for="NombreHeure">Nombre d'heures</label>
    <input type="number" name="NombreHeure" id="NombreHeure">

    <label for="Titulaire">Titulaire</label>
    <input type="text" name="Titulaire" id="Titulaire">

    <label for="UE">Nom de l'UE</label>
    <input type="text" name="UE" id="UE">

    <label for="MotCle1">Mot-clé 1</label>
    <input type="text" name="MotCle1" id="MotCle1">

    <label for="MotCle2">Mot-clé 2</label>
    <input type="text" name="MotCle2" id="MotCle2">

    <input type="submit" name="submit" value="Submit">
</form>


