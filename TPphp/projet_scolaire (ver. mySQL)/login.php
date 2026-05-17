<?php
session_start();
?>

<body>
<html>
<?php
    @include("connexion.php");
    $a=$_POST["login"];
    $b=$_POST["mdp"];
   
    $_SESSION["login"] = $_POST["login"];
    
   
    $requete= "SELECT * from users where login= '$a' and mdp= '$b' ";   

    $resultat=mysqli_query($conn, $requete);
    

    $ligne=mysqli_num_rows($resultat);
    $enreg=mysqli_fetch_array($resultat);
     
    $_SESSION["profil"] = $enreg["profil"];
   
    if ($ligne==1) 
    
        header("location:menu.php");
        
    else
       header("location:index.php");
    

      
  
?>
</body>
</html>
