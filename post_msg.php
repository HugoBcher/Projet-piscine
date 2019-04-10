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
  $sql = "INSERT INTO message(ID_M,date_m,Text, Chat, id_sender) VALUES ('".$id_evenement."','".$date."','".$content."','".$id_chat."' , '".$id1."')";
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



$mail = $db_field3['email']; // Déclaration de l'adresse de destination.
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn|).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
  $passage_ligne = "\r\n";
}
else
{
  $passage_ligne = "\n";
}
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "Bonjour, '".$db_field3['prenom']."' '".$db_field3['nom']."' vient de t'envoyer un message! /n Rends toi vite sur la plateforme Dischoolvery pour lui répondre ;)";
$message_html = "<html><head></head><body><b>Bonjour,</b>, '".$db_field3['prenom']."' '".$db_field3['nom']."' vient de t'envoyer un message! /n Rends toi vite sur la plateforme Dischoolvery pour lui répondre ;) <i>script PHP</i>.</body></html>";
//==========
 
//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = "Tu as reçu un nouveau message !!";
//=========
 
//=====Création du header de l'e-mail.
$header = "From: \"WeaponsB\"<Dischoolvery@outlook.fr>".$passage_ligne;
$header.= "Reply-to: \"WeaponsB\"  <augustin.guermond@gmail.com>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========
 
//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
//==========

}




?>