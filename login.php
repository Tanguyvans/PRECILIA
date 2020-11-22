<?php include 'templates/header.php' ?>

 <section class="login">
     <h2> log in </h2>
     <div class="">
         <form action="includes/login.inc.php" method="post">
             <input type="text" name="Matricule" placeholder="Matricule/Email...">
             <input type="password" name="MDP" placeholder="Password...">
             <button type="submit" name="submit">Log in</button>
         </form>



     </div>
 </section>

<?php include 'templates/footer.php' ?>

