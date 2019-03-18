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
       
                $idpost = $_POST['idpost'];
                $texte = $_POST['texte'];
                $chemin = $_POST['chemin'];
            
                $SQL1 ="UPDATE post SET texte ='".$texte."' WHERE id='".$idpost."'";
                $result1 = mysqli_query($db_handle, $SQL1);
                
                $SQL2 ="UPDATE photo SET chemin ='".$chemin."' WHERE id='".$idpost."'";
                $result2 = mysqli_query($db_handle, $SQL2);
                echo '<meta http-equiv="refresh" content="0;URL=vous.php">';
             }

            ?>
        
    </body>
</html>