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
                
                 $SQL1 ="DELETE FROM reseau WHERE id1='".$idami."' AND id2='".$id."'";
                $result1 = mysqli_query($db_handle, $SQL1);
                
                $SQL2 ="DELETE FROM reseau WHERE id2='".$idami."' AND id1='".$id."'";
                $result2 = mysqli_query($db_handle, $SQL2);
                echo '<meta http-equiv="refresh" content="0;URL=monreseau.php">';
             }
                    
            

            ?>
        
    </body>
</html>