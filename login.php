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
                $SQL = "SELECT*FROM utilisateur";
                $co = 0;
                $result = mysqli_query($db_handle, $SQL);
                     if(!empty($_POST['email']) && !empty($_POST['password'])){
                         while($db_field=mysqli_fetch_assoc($result)) {
                             if($_POST['email']== $db_field['email'] && $_POST['password']==$db_field['pseudo']){
                                    
                                  $_SESSION['pseudo'] = $_POST['password'];
                                 if($db_field['type']==1){
                                    echo '<meta http-equiv="refresh" content="0;URL=indexL.php">';
                                 $co=1;
                                 }
                                 if($db_field['type']==0){
                                    echo '<meta http-equiv="refresh" content="0;URL=indexT.php">';
                                 $co=1;
                                 }
                             }
                             else if($_POST['email']!= $db_field['email'] || $_POST['password']!=$db_field['pseudo'])
                            {
                                if($co==0){
                                    ?>
                                    
                                    <?php
                                    echo '<meta http-equiv="refresh" content="0;URL=login_page.html">';
                                }
                            }

                        }
                             if($co==0){
                         ?>
                         <script>
                           alert("Email ou mot de passe incorrect.");
                         </script>
                        <?php
                             }
                    }
                    
            }

            ?>
        
    </body>
</html>