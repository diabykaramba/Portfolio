<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="connexion.css"
</head>
<body>
    <center>
        <form action="login.php" method="POST">
        <div class="connexion">
        <h1>Connexion</h1>
        <br>
        <!-- Champ de texte pour taper login et mot de passe -->
        <input type="text" placeholder="Identifiant" name="login" required>
        <br>
        <input type="password" placeholder="Mot de passe" name="password" required>
        <br><br>
        <input type="submit" value="Identifiez vous" class="style"><br>
        <input type="reset" value="Annuler" class="style"><br>
        <!-- Partie inscription -->
        <h3>Pas encore inscrit ?</h3>
        <a href="inscription.html">Inscrivez-vous</a>
        </div>
        </form>
    </center>
</body>
</html>