<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <form action="login.php" method="post">
        <center><h1>Se connecter</h1></center>
        <center><div>
        Nom de Login : <input type="text" name="login" style='margin-bottom: 5px;'><br>
        Mot de passe : <input type="password" name="mdp" style='margin-bottom: 5px;'><br>
    
        <input type="submit" value="Identifiez vous" style='margin-bottom: 5px;'><br>
        <input type="reset" value="Annuler" class="style">
        <!-- Le bouton s'enregistrer ne marchait pas, donc j'ai improvisé"-->
        <a href="enregistrer.html" style="background-color: #F3F3F1; border: 0.2px solid #6D7061; text-decoration: none; color: black; padding: 3px;">S'enregistrer</a>
        </div></center>
        </form>
        
    </body>
    </html>