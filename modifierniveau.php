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
       
            $experience = $_POST['experience'];
                
                $SQL1 = "UPDATE tutor SET Level = '".$experience."' WHERE LoginT =  '".$_SESSION['pseudo']."'";
                $result1 = mysqli_query($db_handle, $SQL1);
              
                echo '<meta http-equiv="refresh" content="0;URL=vousT.php">';
             }

            ?>
        
    </body>
</html>