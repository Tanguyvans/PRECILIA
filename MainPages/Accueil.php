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
        <?php include '../templates/header.php' ?>
        <div class="toolbarpage">
            <div class="toolbar">

            </div>
            <div class="page">
             <section>
               <div>
                   <img class="mySlides" src="../Images/ph1.jpg" style="width:100%">
                   <img class="mySlides" src="../Images/ph2.jpg" style="width:100%">
                   <img class="mySlides" src="../Images/ph3.jpg" style="width:100%">
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
                   <div><p>"Être ou ne pas être, telle est la question.
                           Y a-t-il plus de noblesse d'âme à subir la fronde et les flèches de la fortune outrageante, ou bien à s'armer contre une mer de douleurs et d'y faire front pour y mettre fin?
                           Mourir... dormir, rien de plus... et dire que, par ce sommeil, nous mettons fin aux maux du cœur et aux mille tortures naturelles qui sont le lot de la chair: c'est là un dénouement qu'on doit souhaiter avec ferveur.
                           Mourir... dormir; dormir, peut-être rêver.
                           Oui, voilà l'obstacle.
                           Car quels rêves peut-il nous venir dans ce sommeil de la mort, quand nous sommes débarrassés du tumulte de cette vie?
                           C'est cette réflexion-là qui donne à nos malheurs une si longue existence.
                           Nymphe, dans tes oraisons, souviens-toi de tous mes pêchés."</p></div>
                   <div><p>"Fils des mères encore vivantes, n’oubliez plus que vos mères sont mortelles.
                           Je n’aurai pas écrit en vain, si l’un de vous, après avoir lu mon chant de mort est plus doux avec sa mère,
                           un soir, à cause de moi et de ma mère. Soyez doux chaque jour avec votre mère. Aimez-la mieux que je n’ai su aimer ma mère.
                           Que chaque jour vous lui apportiez une joie, c’est ce que je vous dis du droit de mon regret, gravement du haut de mon deuil.
                           Ces paroles que je vous adresse, fils des mères encore vivantes, sont les seules condoléances qu’à moi-même je puisse m’offrir.
                           Pendant qu’il est temps, fils, pendant qu’elle est encore là. Hâtez-vous, car bientôt l’immobilité sera sur sa face imperceptiblement
                           souriante virginalement"</p></div>
               </div>
             </section>


             <section>
               <h2>Nos projets</h2>
             </section>


             <section>
               <h2>Que faisons-nous?</h2>
               <div class="doubleParagraphe">
                   <div><p>"Ah! cruel, tu m'as trop entendue.
                        Je t'en ai dit assez pour te tirer d'erreur.
                        Eh bien ! connais donc Phèdre et toute sa fureur.
                        J'aime. Ne pense pas qu'au moment que je t'aime,
                        Innocente à mes yeux, je m'approuve moi-même,
                        Ni que du fol amour qui trouble ma raison
                        Ma lâche complaisance ait nourri le poison.
                        Objet infortuné des vengeances célestes,
                        Je m'abhorre encor plus que tu ne me détestes.
                        Les dieux m'en sont témoins, ces dieux qui dans mon flanc
                        Ont allumé le feu fatal à tout mon sang,
                        Ces dieux qui se sont fait une gloire cruelle
                        De séduire le coeur d'une faible mortelle.
                        Toi-même en ton esprit rappelle le passé."</p></div>
                   <div><p>"Et en moi aussi, la marée monte. La vague se gonfle, elle se recourbe. Une fois de plus,
                        je sens renaître en moi un nouveau désir ; sous moi quelque chose se redresse comme le cheval fier
                        que son cavalier éperonne et retient tour à tour. Ô toi, ma monture, quel est l'ennemi que nous voyons
                        s'avancer vers nous, en ce moment où tu frappes du sabot le pavé des rues ? C'est la Mort.
                        La Mort est notre ennemi. C'est contre la Mort que je chevauche, l'épée au clair et les cheveux flottant au vent comme
                        ceux d'un jeune homme, comme flottaient au vent les cheveux de Perceval galopant aux Indes.
                        J'enfonce mes éperons dans les flancs de mon cheval. Invaincu, incapable de demander grâce,
                        c'est contre toi que je m'élance, ô Mort. "</p></div>
               </div>
             </section>


             <section>
               <h2>Nos partenaires</h2>
                <div id="AllPartenaires">
                    <div class="partenaire">
                       <img src="../Images/facebook.jpg" class="images-partenaire-taille">
                       <h3>Facebook</h3>
                       <p>La vie c'est des étapes... La plus douce c'est l'amour...
                        La plus dure c'est la séparation... La plus pénible c'est les adieux...
                        La plus belle c'est les retrouvailles.</p>
                    </div>
                    <div class="partenaire">
                       <img src="../Images/insta.jpg" class="images-partenaire-taille">
                       <h3>Instagram</h3>
                       <p>Exige beaucoup de toi-même et attends peu des autres.
                        Ainsi beaucoup d'ennuis te seront épargnés.</p>
                    </div>
                    <div class="partenaire">
                       <img src="../Images/twitter.jpg" class="images-partenaire-taille">
                       <h3>Twitter</h3>
                       <p>Dans la vie on ne fait pas ce que l'on veut mais on
                           est responsable de ce que l'on est.</p>
                    </div>
                </div>
             </section>
               </div>
        </div>

        <?php include '../templates/footer.php' ?>
    </body>
</html>