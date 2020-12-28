<html lang="fr">

<head>
    <!---->

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Toolbar</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
    <!-- Template Main CSS File -->
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
<header id="ensembleT">
    <div id="LiensT">
        <div class="activeT"><a href='../MainPages/Profil.php'>Profil</a></div>
        <?php if(isset($_SESSION["Psession"])){?>
            <div class="activeT"><a href='../MainPages/Ajout.php'>Ajouter</a></div>
        <?php } ?>
        <div class="activeT"><a href='../MainPages/VoirInscription.php'>Participation(s)</a></div>
    </div>
</header>
</body>
</html>