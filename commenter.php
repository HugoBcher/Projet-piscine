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
            $idpersonnepost=$_POST['idpersonnepost'];
            $idpost = $_POST['iddupost'];
            $idcommentateur=$_POST['idducommentateur'];
            $texte=$_POST['texte'];
            require 'configure.php' ;
            if($db_handle && $db_found){
                $SQLid = "SELECT id FROM utilisateur WHERE pseudo = '".$_SESSION['pseudo']."'" ;
                $resultid = mysqli_query($db_handle, $SQLid);
                $db_fieldid=mysqli_fetch_assoc($resultid);
                $id = $db_fieldid['id'];
                date_default_timezone_set("Europe/Paris");
                $datetime = date("Y-m-d H:i:s");
                 $SQL1 ="INSERT INTO commentaire (idpost, idutilisateur, texte, date) VALUES ('$idpost' , '$idcommentateur' , '$texte' , '$datetime')";
                $result1 = mysqli_query($db_handle, $SQL1);
                
                $SQLnot ="INSERT INTO notificationcommentaire (id, idcommentateur, idpost, date) VALUES ('$idpersonnepost' , '$idcommentateur' , '$idpost' , '$datetime')";
                $resultnot = mysqli_query($db_handle, $SQLnot);
                
                echo '<meta http-equiv="refresh" content="0;URL=index.php">';
             }
                    
            

            ?>
        
    </body>
</html>