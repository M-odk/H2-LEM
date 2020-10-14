<!-- 
    PROJET : Projet de traceur GPS pour vélo à hydrogène.
    AUTEUR : Letitia ALVES & Michi ODAKA (I.FA-P3A)
    DESC.: Dans le cadre d'un projet de vélo à hydrogène nommé H2-Lem, on vous charge de développer la partie logicielle qui réceptionnera en continu les traces GPS envoyées via internet par le traceur GPS du vélo. Le logiciel devra aussi permettre d'afficher sur une carte le parcours instantané de chaque vélo ainsi que des indicateurs (ex: vitesse) et proposer une interface d'administration.
    VERSION : 02.09.2020 v.1
-->

<?php
session_start();

// HASH test OK
// echo ' psw: ' . $_SESSION['password'];

?>

<!DOCTYPE html>

<html lang="fr">
    <head>
        <title>Design Page</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Bootstrap CSS  -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/mainCss.css"/> 
    </head>
    <body>
        
        <header>


        </header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

          <!-- Logo -->
          <a class="navbar-brand" href="#"><i class="fas fa-biking"></i></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item ">
                <!--  HOME  -->
                <b><a class=" navbar-brand nav-link active textLink" href="#">Home <span class="sr-only">(current)</span> </a></b>
              </li>
              <li class="nav-item">
                <!-- ABOUT US  -->
                <b><a class="navbar-brand nav-link textLink" href="#">About Us</a></b>
              </li>
            </ul>
              <!-- LINK TO SUPERADMIN FORM -->
              <a class="btn btn-outline-success my-2 my-sm-0" href="superAdmin_form.php" >Admin</a>
          </div>
        </nav>
        <section >
            <div class="ContainMap">
               <article>
                <h1> Placement de la carte </h1>
              </article>
            </div>
  
        </section>
           
        <!-- form action= lien method = post/get-->

           <!-- FontAwesome kitCode  -->
        <script src="https://kit.fontawesome.com/b49b3eeefb.js" crossorigin="anonymous"></script>
        <!-- Bootstrap JS  -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>
