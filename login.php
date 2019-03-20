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
                             if($_POST['email']== $db_field['email'] && $_POST['password']==$db_field['Password']){
                                    
                                  
                                 if($db_field['type']==1)
								 { 
							        $SQL1 = "SELECT pseudo FROM utilisateur where email ='".$_POST['email'] ."'";
									$result1 = mysqli_query($db_handle, $SQL1);
									$db_fieldpseudo = mysqli_fetch_assoc($result1);
									$pseudo = $db_fieldpseudo['pseudo'];
                                    $_SESSION['pseudo'] = $pseudo;									
                                    echo '<meta http-equiv="refresh" content="0;URL=indexL.php">';
                                 $co=1;
                                 }
                                 if($db_field['type']==0)
								 {  
							        $SQL2 = "SELECT pseudo FROM utilisateur where email = '".$_POST['email'] ."'";
									$result2 = mysqli_query($db_handle, $SQL2);
									$db_fieldpseudo = mysqli_fetch_assoc($result2);
									$pseudo = $db_fieldpseudo['pseudo'];
                                    $_SESSION['pseudo'] = $pseudo;
                                    echo '<meta http-equiv="refresh" content="0;URL=indexT.php">';
                                 $co=1;
                                 }
                             }
                             else if($_POST['email']!= $db_field['email'] || $_POST['password']!=$db_field['Password'])
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