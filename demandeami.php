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
            $idami = $_POST['idami'];
            require 'configure.php' ;
            if($db_handle && $db_found){
                $SQLid = "SELECT id FROM utilisateur WHERE pseudo = '".$_SESSION['pseudo']."'" ;
                $resultid = mysqli_query($db_handle, $SQLid);
                $db_fieldid=mysqli_fetch_assoc($resultid);
                $id = $db_fieldid['id'];
                
                 $SQL1 ="INSERT INTO notificationamitie (id, iddemandeur) VALUES ('".$idami."' , '".$id."')";
                $result1 = mysqli_query($db_handle, $SQL1);
                
                echo '<meta http-equiv="refresh" content="0;URL=chercher.php">';
             }
                    
            

            ?>
        
    </body>
</html>