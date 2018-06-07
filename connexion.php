<?php 
 
$base = mysqli_connect("127.0.0.1", "root", "", "persons"); 
if ($base) { 
   echo 'Connection successful.<br />'; 
   echo 'Informations on the server:'.mysqli_get_host_info($base); 
} 
else { 
   printf('Erreur %d : %s.<br/>',mysqli_connect_errno(), mysqli_connect_error()); 
}
?>