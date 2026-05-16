<?php
session_start();
?>

<body>
<html>
<?php
    @include("connexion.php");
    $a=$_POST["login"];
    $b=$_POST["password"];
   
    $_SESSION["login"] = $_POST["login"];
    
   
    $requete= "SELECT * FROM personnel WHERE login= '$a' and password= '$b'";   

    $resultat=mysqli_query($conn, $requete);
    

    $ligne=mysqli_num_rows($resultat);
    $enreg=mysqli_fetch_array($resultat);
     
    $_SESSION["fonction"] = $enreg["fonction"];
   
    if ($ligne==1)
        if ($_SESSION["fonction"] == "Directeur") {
        header("location:menu_admin.php");
        }
        else {
            header("location:menu_employe.php");
        }      
    else
    header("location:index.php");
    
    

      
  
?>
</body>
</html>
