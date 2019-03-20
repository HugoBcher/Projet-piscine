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
            	$mail = $_POST['mail'];
            	$pseudo = $_POST['pseudo'];
                $mdp = $_POST['mdp'];
                $school = $_POST['school'];
                $level = $_POST['level'];
                $tag1 = $_POST['tag1'];

                $SQL = "INSERT INTO utilisateur (nom, prenom, pseudo, email, chemin_profil, chemin_fond, type, Paswword) VALUES('$nom','$prenom','$pseudo','$mail', 'images/avatar.png', '', '0', '$mdp')";
                $result = mysqli_query($db_handle, $SQL);
                $SQL2 = "SELECT id FROM utilisateur WHERE pseudo= '".$pseudo."' ";
                $result2 = mysqli_query($db_handle, $SQL2);
                $db_field2=mysqli_fetch_assoc($result2);  

                $SQL3 = "INSERT INTO tutor (LoginT, Password, LastName, FirstName, School, Photo, Mail, Sector, Level, Tag1, Tag2, Tag3, Tag4) VALUES ('$pseudo', '$mdp', '$nom', '$prenom', '$school', 'images/avatar.png', '$mail', '', '$level', '$tag1', '', '', '')";
                $result3 = mysqli_query($db_handle, $SQL3);



                echo '<meta http-equiv="refresh" content="0;URL=login_page.html">';
                
            }
	 ?>

</body>
</html>