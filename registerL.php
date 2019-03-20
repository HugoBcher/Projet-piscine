<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	 <?php

             require 'configure.php' ;
                if($db_handle && $db_found){
            	$nom = $_POST['nom'];
            	$prenom = $_POST['prenom'];
				$mdp = $_POST['mdp'];
            	$mail = $_POST['mail'];
            	$pseudo = $_POST['pseudo'];
				$filiere = $_POST['filiere'];
				$classe = $_POST['classe'];

                $SQL = "INSERT INTO utilisateur (nom, prenom, pseudo, email, chemin_profil, chemin_fond,type,Password) VALUES('$nom','$prenom','$pseudo','$mail', 'images/avatar.png', '','1','$mdp')";
                $result = mysqli_query($db_handle, $SQL);
                $SQL2 = "SELECT id FROM utilisateur WHERE pseudo= '".$pseudo."' ";
                $result2 = mysqli_query($db_handle, $SQL2);
                $db_field2=mysqli_fetch_assoc($result2);  

                $SQL3 = "INSERT INTO student (LoginS,Password,LastName,FirstName,Photo,Mail,Sector,Level,Tag1,Tag2,Tag3,Tag4,Description) VALUES ('$pseudo','$mdp','$nom','$prenom','images/avatar.png','$mail','$filiere','$classe','','','','','')";
                $result3 = mysqli_query($db_handle, $SQL3);



                echo '<meta http-equiv="refresh" content="0;URL=login_page.html">';
                
            }
	 ?>

</body>
</html>