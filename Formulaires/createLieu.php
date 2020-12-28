<?php

require "../config.php";
$bdd = new PDO($dsn, $username, $password);

if (isset($_POST['submit'])) {

    try {
        $Ville  = $_POST['Ville'];
        $Pays = $_POST['Pays'];

        # condition requise pour pouvoir entrer dans la base de donnée
        require "../Includes/functions.inc.php";
        if(emptyInputLieu($Ville, $Pays) !==false){
            echo"<h2> empty input </h2>";
        }
        elseif(LieuExist($conn, $Ville, $Pays) !== false){
            echo"<h2>Lieu déjà exitant</h2>";
        }
        else {
            $sql = "INSERT INTO LIEU (IDLieu, Ville, Pays )VALUES (NULL,'$Ville','$Pays')";
            $Resultat = $bdd -> exec($sql);
            echo"<h2>Ajout réussi</h2>";
        }
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

<link rel="stylesheet" href="../css/style.css" />

<?php //debut du formulaire, on peut utiliser action: nom de la page php qui v receptionner les donner ?>

<form method="post">

    <label for="Ville">Ville</label>
    <input type="text" name="Ville" id="Ville">

    <label for="Pays">Pays</label>
    <input type="text" name="Pays" id="Pays">

    <input type="submit" name="submit" value="Submit">
</form>

