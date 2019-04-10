<?php


require 'configure.php' ;

  // 1. Analyser les paramètres passés en POST (author, content)
   if($db_handle && $db_found){
        if(array_key_exists("id", $_GET)){
                          $id1 = $_GET['id'];
                        }
                     if(array_key_exists("id2", $_GET)){
                          $id2 = $_GET['id2'];
                        }
       $sqltest = "SELECT ID_C,Member1_C, Member2_C FROM chat WHERE Member1_C ='".$id1."' AND Member2_C ='".$id2."'";
       $resulttest = mysqli_query($db_handle, $sqltest);
    $db_fieldtest=mysqli_fetch_assoc($resulttest);
       
       if($db_fieldtest==""){
       
    $sql = "INSERT INTO chat(Member1_C,Member2_C) VALUES ('".$id1."' , '".$id2."')";
  mysqli_query($db_handle, $sql);
       
    $sql2 = "SELECT ID_C FROM chat WHERE Member1_C = '".$id1."' AND Member2_C = '".$id2."'";
        $result2 = mysqli_query($db_handle, $sql2);
    $db_field2=mysqli_fetch_assoc($result2);
       echo $db_field2['ID_C'];
                                    
  header('Location: chat.php?id='.$id1.'&id_chat='.$db_field2['ID_C'].'');

       
   } else {
           header('Location: chat.php?id='.$id1.'&id_chat='.$db_fieldtest['ID_C'].'');
       }

   }




?>