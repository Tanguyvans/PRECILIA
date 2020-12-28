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


         <section>
           <div class="Carrousel">
               <center>
               <img class="mySlides" src="../Images/1.%20Prérequis%20et%20Approches%20de%20l'IA.PNG" style="width:auto"/>
               <img class="mySlides" src="../Images/2.%20Machine%20Learning.PNG" style="width:auto"/>
               <img class="mySlides" src="../Images/3.%20Processus%20Machine%20Learning.png" style="width:auto"/>
               <img class="mySlides" src="../Images/4.%20Explainable%20Artificial%20Intelligence.png" style="width:auto"/>
               <img class="mySlides" src="../Images/5.%20Déploiement%20Cloud%20d'applications%20IA%20.png" style="width:auto"/>
               <img class="mySlides" src="../Images/6.%20Multimedia%20Retrieval%20with%20Big%20Data%20and%20Deep%20Learning.png" style="width:auto"/>
               </center>
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
                   setTimeout(carousel, 1000); // Change image every 2 seconds
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

               <div class="listesAcc">
                   <ul>
                       <li>Structures de données et algorithmique (Pr. Mohammed Benjelloun et Saïd Mahmoudi) ;</li>
                       <li>Programmation Orienté Objet (Pr. Mohammed Benjelloun) ;</li>
                       <li>Projet d’Ingénierie Informatique (Pr. Mohammed Benjelloun) ;</li>
                       <li>Vision Artificielle (Pr. Mohammed Benjelloun) ;</li>
                       <li>Applications Mobiles (Pr. Saïd Mahmoudi) ;</li>
                       <li>Expertise Digitale et Logicielle (Pr. Saïd Mahmoudi) ;</li>
                       <li>Modélisation de données, Big Data et Projet (Pr. Sidi Ahmed Mahmoudi) ;</li>
                       <li>Ingénierie des bases de données et projet (Pr. Sidi Ahmed Mahmoudi) ;</li>
                       <li>Bases de données Web et Web Sémantique (Pr. Sidi Ahmed Mahmoudi) ;</li>
                   </ul>
                   <ul>
                       <li> Intelligence Artificielle (Pr. Sidi Ahmed Mahmoudi) ;</li>
                       <li>Technologies du Web (Pr. Sidi Ahmed Mahmoudi) ;</li>
                       <li> Machine & Deep for Multimedia Retrieval (Pr. Sidi Ahmed Mahmoudi) ;</li>
                       <li> Cloud & Edge Computing (Pr. Sidi Ahmed Mahmoudi) ;</li>
                       <li> Advanced Deep Learning (Pr. Sidi Ahmed Mahmoudi) ;</li>
                       <li> Workshop en Intelligence Artificielle (Pr. Sidi Ahmed Mahmoudi) ;</li>
                       <li> Défis en Intelligence Artificielle (Pr. Sidi Ahmed Mahmoudi, Pr. X. Siebert et Pr. S. Ben Taieb) ;</li>
                       <li>Etc.</li>
                   </ul>
               </div>
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

                 <center><img src="../imageEvent/<?php echo $line['IDEvenement']; ?>.png" /></center>
                 <div class="legendesimg">
                     <div><h3>Titre: <?php echo $line['Nom'] ?></h3></div>
                     <div><h4>Type : <?php echo $line['Type'] ?></h4></div>
                     <div><h4>Duree: <?php echo $line['Duree'] ?></h4></div>
                 </div>

                <?php
                 $i++;
             }
             ?>

             <center><a href="Evenements.php"><p class="Plus">Plus de projets...</p></a></center>
         </section>


         <section>
           <h2>Nos activités</h2>
           <div class="doubleParagraphe">
               <div><p>Les activités du service ILIA sont liées aux nouvelles technologies de l’information permettant
                       de collecter, gérer et traiter efficacement différents types de données. Le service ILIA est
                       fort impliqué dans ces activités :</p></div>

               <div class="listesAcc">
                   <ul>
                       <li>Développement d’algorithmes d’Intelligence Artificielle et plus particulièrement dans les
                       <li>domaines de Machine et Deep Learning ;</li>
                       <li> Déploiement de modèles IA sur ressources HPC parallèles et distribuées</li>
                       <li>Déploiement de modèles et algorithmes IA sur ressources Cloud et Edge ;</li>
                       <li>Développement de modèles et algorithmes IA pour la recherche multimédia, analyse de mouvements</li>

                   </ul>
                   <ul>
                       <li>(vidéosurveillance), contrôle de production, etc.</li>
                       <li> Développement d’outils d’aide à la décision dans le domaine d’imagerie médicale ;</li>
                       <li>Mise en œuvre de services exploitant des capteurs et ressources connectées « IoT » ;</li>
                       <li>Mise en place de solutions informatique dans le domaine du Smart Framing.</li>
                       <li>Etc.</li>
                   </ul>
               </div>

               <div>
                   <center>
                   Ces activités sont réalisées en collaboration avec différents partenaires académiques
                   et industrielle et ce à l’échelle internationale.
                   </center>
               </div>
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