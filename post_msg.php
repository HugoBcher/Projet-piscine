<?php
require 'configure.php' ;

  // 1. Analyser les paramètres passés en POST (author, content)
   if($db_handle && $db_found){
  $id_chat= $_POST['id_chat'];
  $id1= $_POST['id1'];
  $id_evenement= rand(1,1000);
  $today = date("Y-m-d");
  $hour = date("H:i:s");
  $date =$today." ". $hour;
  $content = $_POST['content'];

  if($content==""){

  }

  else{
  // 2. Créer une requête qui permettra d'insérer ces données
  $sql = "INSERT INTO message(date_m,Text, Chat, id_sender) VALUES ('".$date."','".$content."','".$id_chat."' , '".$id1."')";
  mysqli_query($db_handle, $sql);
  header('Location: chat.php?id='.$id1.'&id_chat='.$id_chat.'');

}


$sql2= "SELECT Member1_C, Member2_C FROM chat WHERE ID_C= '".$id_chat."'";
$result2 = mysqli_query($db_handle, $sql2);
$db_field2=mysqli_fetch_assoc($result2);

if ($id1== $db_field2['Member1_C'])
{
 $id_recep= $db_field2['Member2_C'];
}
else {
 $id_recep= $db_field2['Member1_C'];
}

$sql3= "SELECT email,nom, prenom FROM utilisateur WHERE id= '".$id_recep."'";
$result3 = mysqli_query($db_handle, $sql3);
$db_field3=mysqli_fetch_assoc($result3);




}




?>