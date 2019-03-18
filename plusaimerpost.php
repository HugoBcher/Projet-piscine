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
            $idpost = $_POST['idpost'];
         $idpersonnepost = $_POST['idpersonnepost'];
            require 'configure.php' ;
            if($db_handle && $db_found){
                $SQLid = "SELECT id FROM utilisateur WHERE pseudo = '".$_SESSION['pseudo']."'" ;
                $resultid = mysqli_query($db_handle, $SQLid);
                $db_fieldid=mysqli_fetch_assoc($resultid);
                $id = $db_fieldid['id'];
                
                
                date_default_timezone_set("Europe/Paris");
                 $SQL1 ="DELETE FROM aime WHERE idpost='".$idpost."' AND idutilisateur='".$id."'";
                $result1 = mysqli_query($db_handle, $SQL1);
                
                $SQLnot ="DELETE FROM notificationaime WHERE idpost='".$idpost."' AND idlikeur='".$id."'";
                $resultnot = mysqli_query($db_handle, $SQLnot);
                
                echo '<meta http-equiv="refresh" content="0;URL=index.php">';
             }
                    
            

            ?>
        
    </body>
</html>