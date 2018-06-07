<!DOCTYPE html> 
   <head> 
      <title>Read person's table</title> 
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
   </head> 
<body> 
 
 
<?php 
// Connexion à la base de données 
$base = mysqli_connect("127.0.0.1", "root", "", "persons"); 
if ($base) { 
    
   // Exécution de la requête 
   $resultat = mysqli_query($base, 'SELECT nom,favorit_color, pet FROM persons'); 
   if ($resultat == FALSE) { 
      echo "Request failed to execute.<br />"; 
   } 
   else { 
      //fetch sur chaque ligne ramenée par la requête 
      while ($ligne = mysqli_fetch_assoc($resultat)) { 
         // Affichage du nom et prénom des personnes 
         echo "My name is ".$ligne['nom']." my favorit color is ".$ligne['favorit_color']." and I own a : ".$ligne['pet']."<br />"; 
      } 
   } 
  
   if (mysqli_close($base)) { 
      echo 'Disconnected successfuly.<br />'; 
   } 
   else { 
      echo 'Echec de la déconnexion.'; 
   } 
 
} 
else { 
   printf('Erreur %d : %s.<br/>',mysqli_connect_errno(), 
mysqli_connect_error()); 
} 
?>
 
</body> 
</html>