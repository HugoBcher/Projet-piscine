<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Network</title>
        <meta charset="utf-8" />
    </head>
    
    <body>

        <?php
            
             require 'configure.php' ;
                if($db_handle && $db_found){
       
                $chemin_fond = $_POST['chemin_fond'];
                
                $SQL1 ="UPDATE utilisateur SET chemin_fond ='".$chemin_fond."' WHERE pseudo='".$_SESSION['pseudo']."'";
                $result1 = mysqli_query($db_handle, $SQL1);
              
                echo '<meta http-equiv="refresh" content="0;URL=vous.php">';
             }

            ?>
        
    </body>
</html>