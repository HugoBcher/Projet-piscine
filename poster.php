<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	 <?php
                require 'configure.php' ;
                if($db_handle && $db_found){
                $SQL1 = "SELECT id FROM utilisateur WHERE pseudo = '".$_SESSION['pseudo']."'" ;
                $result1 = mysqli_query($db_handle, $SQL1);
                $db_field1=mysqli_fetch_assoc($result1);
                $id = $db_field1['id'];
                //echo $id;
                
                
                if(!empty($_POST['chemin']) && !empty($_POST['texte'])){
                    $chemin = $_POST['chemin'];

                    $texte = $_POST['texte'];
                    
                    $datetime = date("Y-m-d");
                    
                    $SQL2 = "INSERT INTO post (idutilisateur, date, texte) VALUES('$id', '$datetime', '$texte')";
                    $result2 = mysqli_query($db_handle, $SQL2);
                    
                    $SQL3 = "SELECT MAX(id) AS id FROM post";
                    $result3 = mysqli_query($db_handle, $SQL3);
                    $db_field3=mysqli_fetch_assoc($result3);
                    $idpost = $db_field3['id'];

                    $SQL4 = "INSERT INTO photo (id, chemin) VALUES('$idpost', '$chemin')";
                    $result4 = mysqli_query($db_handle, $SQL4);
                    
                    echo '<meta http-equiv="refresh" content="0;URL=index.php">';
                }
                
                else if(empty($_POST['chemin']) || empty($_POST['texte'])){
                    echo '<meta http-equiv="refresh" content="0;URL=index.php">';
                }
                
            }
	 ?>

</body>
</html>