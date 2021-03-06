<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <!--adaptive response to the width of the device-->
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>PRESCILIA - Accueil</title>
    <!--Description du site lors de la recherche-->
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
    <link rel="stylesheet" href="../css/affichagetables.css"/>
</head>

<body>
<?php
require "../config.php";
try{
    $bdd = new PDO($dsn, $username, $password);

    $sql = "SELECT * FROM Etudiant";
    $resultat = $bdd->query($sql);

}
catch (Exception $e){
    die('Erreur : '.$e->getMessage());
}
?>
<form method="post">
    <!--========== Nom ==============-->
    <?php
    $result = $bdd->query('SELECT DISTINCT Nom FROM etudiant');
    foreach ($result as $row) {
        $MCA[] = array('NomE' => $row['Nom']);
    }
    ?>

    <label for="NomE">Nom de l'étudiant</label>
    <select name="NomE" id="NomE">
        <option value="All">Select one</option>
        <?php foreach ($MCA as $test): ?>
            <option value="<?php print_r($test['NomE']); ?>"><?php print_r($test['NomE']);?></option>
        <?php endforeach; ?>
    </select>

    <!--========== Prenom ==============-->
    <?php
    $result = $bdd->query('SELECT DISTINCT Prenom FROM etudiant');
    foreach ($result as $row) {
        $MCB[] = array('PrenomE' => $row['Prenom']);
    }
    ?>

    <label for="PrenomE">Prénom de l'étudiant</label>
    <select name="PrenomE" id="PrenomE">
        <option value="All">Select one</option>
        <?php foreach ($MCB as $test): ?>
            <option value="<?php print_r($test['PrenomE']); ?>"><?php print_r($test['PrenomE']);?></option>
        <?php endforeach; ?>
    </select>

    <input type="submit" name="Recherche" value="Recherche">

</form>
<!--========== Il faut appuyer sur le boutton recherche ==============-->
<?php
if (isset($_POST['Recherche'])) {
    try {
        $NomE = $_POST['NomE'];
        $PrenomE = $_POST['PrenomE'];

        if ( $NomE == "All" and $PrenomE == "All") {
            $sql = "SELECT * FROM etudiant";
            $resultat = $bdd->query($sql);
        } elseif ( $NomE != "All" and $PrenomE == "All") {
            $sql = "SELECT * FROM etudiant WHERE Nom='$NomE'";
            $resultat = $bdd->query($sql);
        } elseif ( $NomE == 'All' and $PrenomE != "All") {
            $sql = "SELECT * FROM etudiant WHERE Prenom= '$PrenomE'";
            $resultat = $bdd->query($sql);
        } else {
            $sql = "SELECT * FROM etudiant 
                    WHERE Nom= '$NomE' AND Prenom= '$PrenomE' ";
            $resultat = $bdd->query($sql);
        }
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
?>
<section>
    <!-- contruction de la table-->
    <table>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Annee</th>
        </tr>
        <!-- PHP CODE pour remplir la table-->
        <?php
          while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
          {
            ?>
            <tr>
                <!--remplissage de la table avec la base de donnée-->
                <td><?php echo $ligne['Nom'];?></td>
                <td><?php echo $ligne['Prenom'];?></td>
                <td><?php echo $ligne['Email'];?></td>
                <td><?php echo $ligne['Annee'];?></td>
            </tr>
            <?php
          }
        ?>
    </table>
</section>
</body>
</html>