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
                $idami = $_POST['idami'];
            
                $SQLid = "SELECT id FROM utilisateur WHERE pseudo = '".$_SESSION['pseudo']."'" ;
                $resultid = mysqli_query($db_handle, $SQLid);
                $db_fieldid=mysqli_fetch_assoc($resultid);
                $id = $db_fieldid['id'];
                
                $SQL1 ="DELETE FROM notificationamitie WHERE id ='".$id."' AND iddemandeur='".$idami."'";
                $result1 = mysqli_query($db_handle, $SQL1);
                
                echo '<meta http-equiv="refresh" content="0;URL=notifications.php">';
             }
                    
            

            ?>
        
    </body>
</html>