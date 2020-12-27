<?php
require "../config.php";
try{
    $bdd = new PDO($dsn, $username, $password);

    $sql = "SELECT * FROM Personnel";
    $resultat = $bdd->query($sql);

}
catch (Exception $e){
    die('Erreur : '.$e->getMessage());
}
?>
<form method="post">

<section>
    <!-- contruction de la table-->
        <!-- PHP CODE pour remplir la table-->
        <?php
        while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
        {
            ?>
            <div id="col">
                    <!--remplissage de la table avec la base de donnée-->
                <div class = "img-containerPersonnel">
                    <img src="../imageP/<?php echo $ligne['IDPMatricule']; ?>.png" />
                </div>
                <div class="descr-container">
                    <h3>Nom: <?php echo $ligne['Nom'];?> <?php echo $ligne['Prenom'];?></h3>
                    <h4>Email: <?php echo $ligne['Email'];?></h4>
                    <h4>tel: <?php echo $ligne['Telephone'];?></h4>
                    <h4>Grade: <?php echo $ligne['Grade'];?></h4>
                </div>
            </div>
            <?php
        }
        ?>
</section>
