<?php
require "../config.php";
$bdd = new PDO($dsn, $username, $password);
?>
<link rel="stylesheet" href="../css/style.css" />


<?php //debut du formulaire, on peut utiliser action: nom de la page php qui v receptionner les donner ?>

<form method="post">

    <label for="Type">Type d'evenement</label>
    <select name="Type" id="type">
        <option value="">Select one</option>
        <option value="Hackathon">Hackathon</option>
        <option value="Seminaire">Seminaire</option>
        <option value="Workshop">Workshop</option>
    </select>

    <label for="Nom">Nom</label>
    <input type="text" name="Nom" id="Nom">

    <label for="Acronyme">Acronyme</label>
    <input type="text" name="Acronyme" id="Acronyme">

    <label for="Duree">Duree</label>
    <input type="text" name="Duree" id="Duree">

    <label for="Description">Description</label>
    <input type="text" name="Description" id="Description">

    <label for="MotCle1">Mot-clé 1</label>
    <input type="text" name="MotCle1" id="MotCle1">

    <label for="MotCle2">Mot-clé 2</label>
    <input type="text" name="MotCle2" id="MotCle2">

    <label for="DateDebut">Date de début</label>
    <input type="date" name="DateDebut" id="DateDebut">

    <label for="file">Ajouteur une image</label>
    <input type="file" name="file">

    <!--========== connexion Lieu et remplissage d'une liste ==============-->
    <?php
      $result = $bdd->query('SELECT IDLieu, Ville, Pays FROM LIEU');
      foreach ($result as $row) {
        $IDL[] = array('IDLieu' => $row['IDLieu'],'Ville' => $row['Ville'], 'Pays' => $row['Pays']);
      }
    ?>

    <label for="IDLieu">IDLieu</label>

    <!--========== Input IDPMatricule ==============-->
    <select name="IDLieu" id="IDLieu">
      <option value="">Select one</option>
      <?php foreach ($IDL as $test): ?>
      <option value="<?php print_r($test['IDLieu']); ?>"><?php print_r($test['Ville']);?>  <?php print_r($test['Pays']) ?></option>
      <?php endforeach; ?>
    </select>

    <input type="submit" name="submitEvent" value="Submit">
</form>

<?php
require "../config.php";
$bdd = new PDO($dsn, $username, $password);

if (isset($_POST['submitEvent'])) {

    try {
        $Type  = $_POST['Type'];
        $Nom = $_POST['Nom'];
        $Acronyme = $_POST['Acronyme'];
        $Duree = $_POST['Duree'];
        $Description=$_POST['Description'];
        $MotCle1=$_POST['MotCle1'];
        $MotCle2=$_POST['MotCle2'];
        $DateDebut=$_POST['DateDebut'];
        $IDLieu=$_POST['IDLieu'];

        $sql = "INSERT INTO EVENEMENT (IDEvenement, Type, Nom, Acronyme, Duree, Description, MotCle1, MotCle2, DateDebut, IDLieu)
  			VALUES (NULL, '$Type', '$Nom', '$Acronyme', '$Duree', '$Description', '$MotCle1', '$MotCle2', '$DateDebut','$IDLieu')";

        $Resultat = $bdd -> exec($sql);
        echo "Ajout reussie avec la base de donnée<br>";

        $newsql = "SELECT IDEvenement, Nom FROM EVENEMENT ORDER BY IDEvenement DESC";

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

    $sql = "SELECT IDEvenement, Nom FROM EVENEMENT ORDER BY IDEvenement DESC";
    $perso = $bdd->query($sql);
    $line = $perso->fetch(PDO::FETCH_ASSOC);
    $IDEvenement = $line['IDEvenement'];
    $Nom = $line['Nom'];

    echo "<h3><a href='../Formulaires/jointureMembreEvent.php?ID=$IDEvenement'> Inscrire des participants à l'évènement: $Nom</a></h3>";
}
?>


