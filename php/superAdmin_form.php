<!-- 
    PROJET : Projet de traceur GPS pour vélo à hydrogène.
    AUTEUR : Letitia ALVES & Michi ODAKA (I.FA-P3A)
    DESC.: Dans le cadre d'un projet de vélo à hydrogène nommé H2-Lem, on vous charge de développer la partie logicielle qui réceptionnera en continu les traces GPS envoyées via internet par le traceur GPS du vélo. Le logiciel devra aussi permettre d'afficher sur une carte le parcours instantané de chaque vélo ainsi que des indicateurs (ex: vitesse) et proposer une interface d'administration.
    VERSION : 02.09.2020 v.1
-->

<?php

session_start();

// salt du superAdmin
$options = ['cost' => 5];

$user = filter_input(INPUT_POST, $pseudo, FILTER_SANITIZE_STRING);

// hash du password donné par le user 
// sera vérifié en comparant avec celui dans la BD
$hash = password_hash($password, PASSWORD_BCRYPT, $options);

if(isset($_POST['connexion']))
{
    $u = verifierHash($user);
    if(password_verify($hash, $u['hash'] ))
    {
        header("Location: accueil.php");
       // $_SESSION['password']= $password;
    }
    else
    {
        header("Location: superAdmin_form.php");
        echo "mdp incorrecte";
    }
}

/*if(isset($_POST['connexion']))
{
    if( password_verify($password, $hash) == true )
    {
        echo $hash
    }
    else
    {
        echo "NON";
    }
}*/



// password verify : https://www.php.net/manual/fr/function.password-verify.php
// add superAdmin to BD and take his hash 

// HASH test OK
// $_SESSION['password'] = $password; 

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
    <form action="accueil.php" method="POST" >
            <fieldset>
                <table>
                    <tr>
                        <td> <label for="pseudo">Pseudo : </label></td>
                        <td> <input  class="form-control"  type="text" name="pseudo" id="pseudo" placeholder="Admin" value="<?php $pseudo ?>" required/></td>
                    </tr>
                    <tr>
                        <td><label for="psw" >Password : </label></td>
                        <td><input   class="form-control" type="password" name="psw" id="psw" placeholder="Mot de passe" value="<?php $password ?>" required/></td>
                    </tr>
                    <tr>
                        <td colspan="2"> <input class="btn btn-success my-2 my-sm-0"  type="submit" name="connexion" value="connexion"/></td>
                        <td></td>
                    </tr>
                </table>
     </fieldset>
   
</form>
           <!-- FontAwesome kitCode  -->
        <script src="https://kit.fontawesome.com/b49b3eeefb.js" crossorigin="anonymous"></script>
        
        <!-- Bootstrap JS  -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>