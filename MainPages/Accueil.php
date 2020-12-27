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
        <link rel="stylesheet" href="../css/style.css"/>
    </head>

    <body>
        <?php
            include '../templates/header.php';
            require "../config.php";
            $bdd = new PDO($dsn, $username, $password);
        ?>
        <div class="toolbarpage">
            <div class="toolbar">

            </div>
            <div class="page">
                 <section>
                   <div class="Carrousel">
                       <img class="mySlides" src="../Images/1.%20Prérequis%20et%20Approches%20de%20l'IA.PNG" style="width:auto">
                       <img class="mySlides" src="../Images/2.%20Machine%20Learning.PNG" style="width:auto">
                       <img class="mySlides" src="../Images/3.%20Processus%20Machine%20Learning.png" style="width:auto">
                       <img class="mySlides" src="../Images/4.%20Explainable%20Artificial%20Intelligence.png" style="width:auto">
                       <img class="mySlides" src="../Images/5.%20Déploiement%20Cloud%20d'applications%20IA%20.png" style="width:auto">
                       <img class="mySlides" src="../Images/6.%20Multimedia%20Retrieval%20with%20Big%20Data%20and%20Deep%20Learning.png" style="width:auto">
                   </div>
                   <script>
                       var slideIndex = 0;
                       carousel();
                       function carousel() {
                           var i;
                           var x = document.getElementsByClassName("mySlides");
                           for (i = 0; i < x.length; i++) {
                               x[i].style.display = "none"; }
                           slideIndex++;
                           if (slideIndex > x.length) {slideIndex = 1}
                           x[slideIndex-1].style.display = "block";
                           setTimeout(carousel, 3000); // Change image every 2 seconds
                       }
                   </script>
                 </section>


                 <section>
                   <h2>Qui sommes-nous?</h2>
                   <div class="doubleParagraphe">
                       <div><p>Le service d’Informatique, Logiciel et Intelligence Artificielle (ILIA) fait partie du département IG
                               à la faculté polytechnique de l’UMONS (FPMS-UMONS). Le service ILIA, représenté par 14 chercheurs dont
                               4 professeurs, recouvre différentes activités de recherche telles que l’Intelligence Artificielle, le
                               Cloud et Edge Computing, le Big Data, le calcul à haute performance (HPC), l’internet des objets (IoT),
                               la vision par ordinateur et recherche multimédia, l’imagerie médicale et outils d’aide à la décision, etc.
                               Ces activités de recherche sont réalisées en collaboration avec différents services membres des instituts
                               Infortech et numédiart. En termes d’enseignement, le service ILIA est impliqué dans différentes activités
                               d’apprentissage à Mons et Charleroi :</p></div>

                       <div><p>Structures de données et algorithmique (Pr. Mohammed Benjelloun et Saïd Mahmoudi) ;
                               Programmation Orienté Objet (Pr. Mohammed Benjelloun) ;
                               Projet d’Ingénierie Informatique (Pr. Mohammed Benjelloun) ;
                               Vision Artificielle (Pr. Mohammed Benjelloun) ;
                               Applications Mobiles (Pr. Saïd Mahmoudi) ;
                               Expertise Digitale et Logicielle (Pr. Saïd Mahmoudi) ;
                               Modélisation de données, Big Data et Projet (Pr. Sidi Ahmed Mahmoudi) ;
                               Ingénierie des bases de données et projet (Pr. Sidi Ahmed Mahmoudi) ;
                               Bases de données Web et Web Sémantique (Pr. Sidi Ahmed Mahmoudi) ;</p></div>

                       <div><p>Intelligence Artificielle (Pr. Sidi Ahmed Mahmoudi) ;
                               Technologies du Web (Pr. Sidi Ahmed Mahmoudi) ;
                               Machine & Deep for Multimedia Retrieval (Pr. Sidi Ahmed Mahmoudi) ;
                               Cloud & Edge Computing (Pr. Sidi Ahmed Mahmoudi) ;
                               Advanced Deep Learning (Pr. Sidi Ahmed Mahmoudi) ;
                               Workshop en Intelligence Artificielle (Pr. Sidi Ahmed Mahmoudi) ;
                               Défis en Intelligence Artificielle (Pr. Sidi Ahmed Mahmoudi, Pr. X. Siebert et Pr. S. Ben Taieb) ;
                               Etc.</p></div>
                   </div>
                 </section>


                 <section>
                   <h2>Nos événements</h2>
                     <?php
                     $CurrentDate = date("Y/m/d");
                     try {
                         $result = $bdd->query("SELECT * FROM EVENEMENT WHERE DateDebut < '$CurrentDate'");
                         $i = 0;
                     } catch (Exception $e) {
                         die('Erreur : ' . $e->getMessage());
                     }
                     while ($i<3){
                         $line = $result->fetch(PDO::FETCH_ASSOC);
                        ?>

                         <img src="../imageEvent/<?php echo $line['IDEvenement']; ?>.png" />
                         <h3>Titre: <?php echo $line['Nom'] ?></h3>
                         <h4>Type : <?php echo $line['Type'] ?></h4>
                         <h4>Duree: <?php echo $line['Duree'] ?></h4>

                        <?php
                         $i++;
                     }
                     ?>

                     <a href="Evenements.php"><p class="lienAffichage">Plus de projets...</p></a>
                 </section>


                 <section>
                   <h2>Nos activités</h2>
                   <div class="doubleParagraphe">
                       <div><p>Les activités du service ILIA sont liées aux nouvelles technologies de l’information permettant
                               de collecter, gérer et traiter efficacement différents types de données. Le service ILIA est
                               fort impliqué dans ces activités :</p></div>

                       <div><p>Développement d’algorithmes d’Intelligence Artificielle et plus particulièrement dans les
                               domaines de Machine et Deep Learning ;
                               Déploiement de modèles IA sur ressources HPC parallèles et distribuées
                               Déploiement de modèles et algorithmes IA sur ressources Cloud et Edge ;
                               Développement de modèles et algorithmes IA pour la recherche multimédia, analyse de mouvements
                               (vidéosurveillance), contrôle de production, etc.
                               Développement d’outils d’aide à la décision dans le domaine d’imagerie médicale ;
                               Mise en œuvre de services exploitant des capteurs et ressources connectées « IoT » ;
                               Mise en place de solutions informatique dans le domaine du Smart Framing.
                               Etc.</p></div>

                       <div><p>
                               Ces activités sont réalisées en collaboration avec différents partenaires académiques
                               et industrielle et ce à l’échelle internationale.
                           </p></div>
                   </div>
                 </section>


                 <section>
                   <h2>Nos partenaires académiques</h2>
                    <div id="AllPartenaires">
                        <div class="partenaire">
                           <img src="../Images/uliege.png" class="images-partenaire-taille">
                           <h3>Université de Liège, ULiège (Belgique)</h3>
                        </div>
                        <div class="partenaire">
                           <img src="../Images/lausane%20FP.png" class="images-partenaire-taille">
                           <h3>Ecole Polytechnique Fédérale de Lausanne (Suisse)</h3>
                        </div>
                        <div class="partenaire">
                            <img src="../Images/lille%201.jpg" class="images-partenaire-taille">
                            <h3>Université de Lille 1 (France)</h3>
                        </div>
                        <div class="partenaire">
                            <img src="../Images/mohamed.jpg" class="images-partenaire-taille">
                            <h3>Université de Mohammed V (Rabat, Maroc)</h3>
                        </div>
                        <div class="partenaire">
                            <img src="../Images/tlemcem.png" class="images-partenaire-taille">
                            <h3>Université de Tlemcen (Algérie)</h3>
                        </div>
                    </div>
                 </section>

                <section>
                    <h2>Nos partenaires industriels</h2>
                    <div id="AllPartenaires">
                        <div class="partenaire">
                            <img src="../Images/infrabel.jpg" class="images-partenaire-taille">
                            <h3>Infrabel</h3>
                        </div>
                        <div class="partenaire">
                            <img src="../Images/eleveo.svg" class="images-partenaire-taille">
                            <h3>Elevéo</h3>
                        </div>
                        <div class="partenaire">
                            <img src="../Images/sonaca.jpg" class="images-partenaire-taille">
                            <h3>Sonaca</h3>
                        </div>
                        <div class="partenaire">
                            <img src="../Images/necko.PNG" class="images-partenaire-taille">
                            <h3>Necko Technologies/h3>
                        </div>
                    </div>
                </section>

        <?php include '../templates/footer.php' ?>
    </body>
</html>