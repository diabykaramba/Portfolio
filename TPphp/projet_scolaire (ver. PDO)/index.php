<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" type="text/css" href="log2.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <form action="login.php" method="post">
        <center>
            <h1>Se connecter</h1>
            <div>
                <label for="login">Nom de Login :</label><br>
                <input type="text" id="login" name="login" class="style1" required><br>
                
                <label for="mdp">Mot de passe :</label><br>
                <input type="password" id="mdp" name="mdp" class="style2" required><br>
            
                <input type="submit" value="Identifiez-vous" class="style"><br>
                <input type="reset" value="Annuler" class="style"><br>
                <a href="enregistrer.html">S'enregistrer</a>
            </div>
        </center>
    </form>
</body>
</html>