<?php

if (isset($_POST[submit])){

    $IDPMatricule = $_POST["IDPMatricule"];
    $MDP = $_POST["MDP"];

    require "config.php";
    require "includes/functions.inc.php";

    if(emptyInputLogin($IDPMatricule, $MDP) !==false){
        echo"une case n'est pas completée";
    }

    loginUser($conn, $IDPMatricule, $MDP);

}
?>

<?php include 'templates/header.php' ?>

 <section class="login">
     <h2> log in </h2>
     <div class="">
         <form method="post">
             <input type="text" name="IDPMatricule" placeholder="Matricule/Email...">
             <input type="password" name="MDP" placeholder="Password...">
             <button type="submit" name="submit">Log in</button>
         </form>



     </div>
 </section>

<?php include 'templates/footer.php' ?>

