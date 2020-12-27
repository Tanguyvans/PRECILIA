<?php
    session_start();
?>

<html lang="fr">

<head>
    <!---->

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Header</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
    <!-- Template Main CSS File -->
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
<header id="headerH">
    <div id="containerH">
        <div id="container1H">
            <a href='../MainPages/Accueil.php'> <h1> Prescilia </h1> </a>
        </div>
        <nav id="container2H">
            <div class="activeH"><a href='../MainPages/Recherche.php'>Recherche</a></div>
            <div class="activeH"><a href='../MainPages/Membres.php'>Membres</a></div>
            <div class="activeH"><a href='../MainPages/Evenements.php?table=none'>Événements</a></div>
            <div class="activeH"><a href='../MainPages/Enseignement.php'>Enseignements</a></div>
            <?php
                if(isset($_SESSION["Psession"])){
                    echo "<div class='activeH'><a href='../MainPages/Profil.php'>Profil</a></div>";
                    echo "<div class='activeH'><a href='../MainPages/logout.inc.php'>log out</a></div>";
                }elseif (isset($_SESSION["Esession"])){
                    echo "<div class='activeH'><a href='../MainPages/Profil.php'>Profil</a></div>";
                    echo "<div class='activeH'><a href='../MainPages/logout.inc.php'>log out</a></div>";
                }else{
                    echo "<div class='activeH'><a href='../MainPages/ConnexionPersonnel.php'>Connexion Personnel</a></div>";
                    echo "<div class='activeH'><a href='../MainPages/ConnexionEtudiant.php'>Connexion Etudiant</a></div>";
                }
            ?>
        </nav>
    </div>
</header>
</body>
</html>
