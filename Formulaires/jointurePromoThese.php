<?php
    require "../config.php";
    $bdd = new PDO($dsn, $username, $password);

    if (isset($_POST['submit'])) {
        try {

            $Promo  = $_POST['Promo'];
            $These = $_POST['These'];

            $sql = "INSERT INTO promoteur_these (IDPMatricule, IDThese) VALUES ('$Promo', '$These')";
            $Resultat = $bdd -> exec($sql);

            echo "Ajout reussie avec la base de donnée<br>";

        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }

    }
?>

<form method="post">
    <!-- ======================== PROMOTEUR ======================= -->
    <?php
    $result = $bdd->query('SELECT IDPMatricule, Nom, Prenom FROM personnel');
    foreach ($result as $row) {
        $IDPM[] = array('Promo' => $row['IDPMatricule'],'Nom' => $row['Nom'], 'Prenom' => $row['Prenom']);
    }
    ?>

    <label for="Promo">Promoteur</label>

    <select name="Promo" id="Promo">
        <option value="">Select one</option>
        <?php foreach ($IDPM as $test): ?>
            <option value="<?php print_r($test['Promo']);?>"> <?php print_r($test['Nom']);?>  <?php print_r($test['Prenom']) ?></option>
        <?php endforeach; ?>
    </select>

    <!-- ======================== THESE ======================= -->
    <?php
    $result = $bdd->query('SELECT IDThese, Titre FROM these');
    foreach ($result as $row) {
        $IDT[] = array('These' => $row['IDThese'],'Titre' => $row['Titre']);
    }
    ?>

    <label for="These">These</label>

    <select name="These" id="These">
        <option
            value="">Select one
        </option>
        <?php foreach ($IDT as $test): ?>
            <option
                value="<?php print_r($test['These']); ?>"><?php print_r($test['Titre']);?>
            </option>
        <?php endforeach; ?>
    </select>

    <input type="submit" name="submit" value="Submit">

</form>
