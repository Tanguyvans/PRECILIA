<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../css/style.css"/>
<?php
session_start();
require "../config.php";
require "../includes/functions.inc.php";
$bdd = new PDO($dsn, $username, $password);
?>

<?php
// quand l'utilisateur valide le formulaire
if (isset($_POST['submit'])) {
    try {
        if(isset($_SESSION["Psession"])){
            $ID = $_SESSION['Psession'];
            $Nom = $_POST['Nom'];
            $Prenom = $_POST['Prenom'];
            $Email = $_POST['Email'];
            $Telephone = $_POST['Telephone'];
            $Grade = $_POST['Grade'];
            $MDP = $_POST['MotDePasse'];
            if (ifModif($Nom)) { //modification que des champs modifiés par l utilisateur
                $sql = "UPDATE Personnel SET Nom='$Nom' WHERE IDPMatricule='$ID'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($Prenom)) {
                $sql = "UPDATE Personnel SET Prenom='$Prenom' WHERE IDPMatricule='$ID'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($Email)) {
                $sql = "UPDATE Personnel SET Email='$Email' WHERE IDPMatricule='$ID'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($Telephone)) {
                $sql = "UPDATE Personnel SET Telephone='$Telephone' WHERE IDPMatricule='$ID'";
                $Resultat = $bdd->exec($sql);
            }

            if (ifModif($Grade)) {
                $sql = "UPDATE Personnel SET Grade='$Grade' WHERE IDPMatricule='$ID'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($MDP)) {

                $hashedMDP = password_hash($MDP, PASSWORD_DEFAULT);

                $sql = "UPDATE Personnel SET MotDePasse='$hashedMDP' WHERE IDPMatricule='$ID'";
                $Resultat = $bdd->exec($sql);
            }
        }
        if(isset($_SESSION["Esession"])){
            $ID = $_SESSION['Esession'];
            $Nom = $_POST['Nom'];
            $Prenom = $_POST['Prenom'];
            $Email = $_POST['Email'];
            $Telephone = $_POST['Telephone'];
            $MDP = $_POST['MotDePasse'];
            if (ifModif($Nom)) { //modification que des champs modifiés par l utilisateur
                $sql = "UPDATE Etudiant SET Nom='$Nom' WHERE IDEMatricule='$ID'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($Prenom)) {
                $sql = "UPDATE Etudiant SET Prenom='$Prenom' WHERE IDEMatricule='$ID'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($Email)) {
                $sql = "UPDATE Etudiant SET Email='$Email' WHERE IDEMatricule='$ID'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($Telephone)) {
                $sql = "UPDATE Etudiant SET Telephone='$Telephone' WHERE IDEMatricule='$ID'";
                $Resultat = $bdd->exec($sql);
            }
            if (ifModif($MDP)) {

                $hashedMDP = password_hash($MDP, PASSWORD_DEFAULT);

                $sql = "UPDATE Etudiant SET MotDePasse='$hashedMDP' WHERE IDEMatricule='$ID'";
                $Resultat = $bdd->exec($sql);
            }
        }
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
?>

<?php
//include du header
include "../templates/header.php";
try {
    //recuperation de l'id par l'url

    if(isset($_SESSION["Psession"])){
        $ID = $_SESSION['Psession'];
        $result = $bdd -> query ("SELECT * FROM Personnel WHERE IDPMatricule ='$ID' ");
        while($line = $result->fetch(PDO::FETCH_ASSOC)){
        ?>
        <form method="post" class="FormulaireModif">
            <label for="Nom">Nom</label>
            <input type="text" name="Nom" id="Nom" placeholder="<?php echo ($line['Nom']); ?>">
            <label for="Prenom">Prenom</label>
            <input type="text" name="Prenom" id="Prenom" placeholder="<?php echo ($line['Prenom']); ?>">
            <label for="Email">Adresse email</label>
            <input type="text" name="Email" id="Email" placeholder="<?php echo ($line['Email']); ?>">
            <label for="Telephone">Numéro de téléphone</label>
            <input type="number" name="Telephone" id="Telephone" placeholder="<?php echo ($line['Telephone']); ?>">
            <p>
                <label for="Grade">Choisissez le Grade</label><br />
                <select name="Grade" id="Grade" value="placeholder="<?php echo ($line['Grade']); ?>"">
                <option value="Chef de service">Chef de service</option>
                <option value="Professeur">Professeur</option>
                <option value="Doctorant">Doctorant</option>
                <option value="Stagiaire">Stagiaire</option>
                <option value="Charge de cours">Chargé de cours</option>
                <option value="Assistant">Assistant</option>
                <option value="Chercheur">Chercheur</option>
                <option value="Technicien">Technicien</option>
                </select>
            </p>
            <label for="MotDePasse">Mot de passe</label>
            <input type="password" name="MotDePasse" id="MotDePasse">
            <input type="submit" name="submit" value="Submit">
        </form><?php
        }
    }
    if(isset($_SESSION["Esession"])) {
        $ID = $_SESSION['Esession'];
        $result = $bdd -> query ("SELECT * FROM Etudiant WHERE IDEMatricule ='$ID' ");
        while($line = $result->fetch(PDO::FETCH_ASSOC)){ ?>
            <form method="post">
            <label for="Nom">Nom</label>
            <input type="text" name="Nom" id="Nom" placeholder="<?php echo ($line['Nom']); ?>">
            <label for="Prenom">Prenom</label>
            <input type="text" name="Prenom" id="Prenom" placeholder="<?php echo ($line['Prenom']); ?>">
            <label for="Email">Adresse email</label>
            <input type="text" name="Email" id="Email" placeholder="<?php echo ($line['Email']); ?>">
            <label for="MotDePasse">Mot de passe</label>
            <input type="password" name="MotDePasse" id="MotDePasse">
            <input type="submit" name="submit" value="Submit">
        </form> <?php
        }
    }
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
} ?>

<a href="../MainPages/Profil.php"><p class="lienAffichage">Retour</p></a>

<?php
include "../templates/footer.php";
?>
</html>
