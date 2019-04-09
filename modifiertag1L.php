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
       
            $interet = $_POST['interet'];
                
                $SQL1 = "UPDATE student SET Tag1 = '".$interet."' WHERE LoginS =  '".$_SESSION['pseudo']."'";
                $result1 = mysqli_query($db_handle, $SQL1);
              
                echo '<meta http-equiv="refresh" content="0;URL=vousL.php">';
             }

            ?>
        
    </body>
</html>