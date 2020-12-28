<?php
require "../config.php";
$bdd = new PDO($dsn, $username, $password);

if (isset($_POST['submit'])) {

    try {

        $DateDebut  = $_POST['DateDebut'];
        $DateFin = $_POST['DateFin'];
        $CollaborateurIndustrielle = $_POST['CollaborateurIndustrielle'];
        $NumeroContact = $_POST['NumeroContact'];
        $MotCle1=$_POST['MotCle1'];
        $MotCle2=$_POST['MotCle2'];
        $IDPMatricule=$_POST['IDPMatricule'];
        $IDEMatricule=$_POST['IDEMatricule'];

        # condition requise pour pouvoir entrer dans la base de donnée
        require "../Includes/functions.inc.php";
        if(emptyInputStageEnt($DateDebut, $CollaborateurIndustrielle, $MotCle1, $MotCle2, $IDPMatricule, $IDEMatricule) !==false){
            echo"<h2> empty input </h2>";
        }
        else {
            if ($DateFin == NUll && $NumeroContact != NULL ){
                $sql = "INSERT INTO STAGEENENTREPRISE (IDStageEntreprise, DateDebut, DateFin, CollaborateurIndustrielle, NumeroContact, MotCle1, MotCle2, IDPMatricule, IDEMatricule )
			    VALUES (NULL,'$DateDebut',NULL,'$CollaborateurIndustrielle','$NumeroContact','$MotCle1','$MotCle2','$IDPMatricule','$IDEMatricule')";
            }elseif($DateFin != NUll && $NumeroContact == NULL ){
                $sql = "INSERT INTO STAGEENENTREPRISE (IDStageEntreprise, DateDebut, DateFin, CollaborateurIndustrielle, NumeroContact, MotCle1, MotCle2, IDPMatricule, IDEMatricule )
			    VALUES (NULL,'$DateDebut','$DateFin','$CollaborateurIndustrielle',NULL,'$MotCle1','$MotCle2','$IDPMatricule','$IDEMatricule')";
            }
            elseif($DateFin == NUll && $NumeroContact == NULL ){
                $sql = "INSERT INTO STAGEENENTREPRISE (IDStageEntreprise, DateDebut, DateFin, CollaborateurIndustrielle, NumeroContact, MotCle1, MotCle2, IDPMatricule, IDEMatricule )
			    VALUES (NULL,'$DateDebut',NULL,'$CollaborateurIndustrielle',NULL,'$MotCle1','$MotCle2','$IDPMatricule','$IDEMatricule')";
            } else {
                $sql = "INSERT INTO STAGEENENTREPRISE (IDStageEntreprise, DateDebut, DateFin, CollaborateurIndustrielle, NumeroContact, MotCle1, MotCle2, IDPMatricule, IDEMatricule )
			    VALUES (NULL,'$DateDebut','$DateFin','$CollaborateurIndustrielle','$NumeroContact','$MotCle1','$MotCle2','$IDPMatricule','$IDEMatricule')";
            }
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

    <label for="DateDebut">Date de début</label>
    <input type="Date" name="DateDebut" id="DateDebut">

    <label for="DateFin">Date de fin</label>
    <input type="Date" name="DateFin" id="DateFin">

    <label for="CollaborateurIndustrielle">Collaborateur industrielle</label>
    <input type="text" name="CollaborateurIndustrielle" id="CollaborateurIndustrielle">

    <label for="NumeroContact">Numéro de contact</label>
    <input type="number" name="NumeroContact" id="NumeroContact">

    <label for="MotCle1">Mot-clé 1</label>
    <input type="text" name="MotCle1" id="MotCle1">

    <label for="MotCle2">Mot-clé 2</label>
    <input type="text" name="MotCle2" id="MotCle2">

    <!--========== connexion PERSONNEL et remplissage d'une liste ==============-->
    <?php
      $result = $bdd->query('SELECT IDPMatricule, Nom, Prenom FROM PERSONNEL');
      foreach ($result as $row) {
        $IDPM[] = array('IDPMatricule' => $row['IDPMatricule'],'Nom' => $row['Nom'], 'Prenom' => $row['Prenom']);
      }
    ?>
    <label for="IDPMatricule">IDPMatricule</label>
    <p>
      <!--========== Input IDPMatricule ==============-->
      <select name="IDPMatricule" id="IDPMatricule">
      <option value="">Select one</option>
      <?php foreach ($IDPM as $test): ?>
      <option value="<?php print_r($test['IDPMatricule']); ?>"><?php print_r($test['Nom']);?>  <?php print_r($test['Prenom']) ?></option>
      <?php endforeach; ?>
      </select>
    </p>
    <!--========== connexion Etudiant et remplissage d'une liste ==============-->
    <?php
      $result = $bdd->query('SELECT IDEMatricule, Nom, Prenom FROM ETUDIANT');
      foreach ($result as $row) {
        $IDEM[] = array('IDEMatricule' => $row['IDEMatricule'],'Nom' => $row['Nom'], 'Prenom' => $row['Prenom']);
      }
    ?>
    <label for="IDEMatricule">IDEMatricule</label>
    <p>
      <!--========== Input IDEMatricule ==============-->
      <select name="IDEMatricule" id="IDEMatricule">
      <option value="">Select one</option>
      <?php foreach ($IDEM as $test): ?>
      <option value="<?php print_r($test['IDEMatricule']); ?>"><?php print_r($test['Nom']);?>  <?php print_r($test['Prenom']) ?></option>
      <?php endforeach; ?>
      </select>
  </p>
    <input type="submit" name="submit" value="Submit">
</form>
