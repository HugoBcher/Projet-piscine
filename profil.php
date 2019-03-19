<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Votre page | Network </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
     
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/pe-icons.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/vous.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <script src="js/jquery.js"></script>
    <link rel="shortcut icon" href="images/icones/network.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/images/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57x57.png">

    <?php
                $idpersonne = $_GET['id'];
                 require 'configure.php' ;
                if($db_handle && $db_found){
                    $SQL1 = "SELECT chemin_fond FROM utilisateur WHERE id='".$idpersonne."'";
                    $result1 = mysqli_query($db_handle, $SQL1);
                    $db_field1=mysqli_fetch_assoc($result1);     
                    $chemin_fond=$db_field1['chemin_fond'];
                    }
                if($db_handle && $db_found){
                    
                    
                    
                    $SQLid="SELECT id FROM utilisateur WHERE pseudo='".$_SESSION['pseudo']."'";
                    $resultid = mysqli_query($db_handle, $SQLid);
                    $db_fieldid=mysqli_fetch_assoc($resultid);
                    $monid=$db_fieldid['id'];
                    
                    $SQLdemande = "SELECT * FROM notificationamitie WHERE iddemandeur='".$idpersonne."' AND id='".$monid."'";
                    $resultdemande = mysqli_query($db_handle, $SQLdemande);
                    $db_fielddemande=mysqli_fetch_assoc($resultdemande);     
                    $pasdemande=$db_fielddemande['iddemandeur'];
                    
                    
                    
                    $SQLami = "SELECT * FROM reseau WHERE id1='".$monid."' AND id2='".$idpersonne."'";
                    $resultami = mysqli_query($db_handle, $SQLami);
                    $db_fieldami=mysqli_fetch_assoc($resultami);     
                    $pasami=$db_fieldami['id1'];
                    
                    $SQL1 = "SELECT * FROM utilisateur WHERE id='".$idpersonne."'";
                    $result1 = mysqli_query($db_handle, $SQL1);
                    $db_field1=mysqli_fetch_assoc($result1);    
                     if($monid==$idpersonne){
             echo '<meta http-equiv="refresh" content="0;URL=vous.php">';
        }
                   else if($monid != $idpersonne){
    ?>

    <script type="text/javascript">
        var chemin = '<?php echo $chemin_fond ;?>';
        
    jQuery(document).ready(function($){
    'use strict';
        jQuery('body').backstretch([
            chemin

        ], {duration: 5000, fade: 500});

        
    });
    </script>
</head><!--/head-->
<body>
<div id="preloader"></div>
      <header class="navbar navbar-inverse navbar-fixed-top " role="banner" style="background-color: #3F90F2;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-bars"></i>
                </button>
                 <a class="navbar-brand" href="index.php"><h1><span></span><img src="images/icones/network.png" style="height: 40px; width: 40px;"> DISCHOOLVERY </h1></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php"><img src="images/icones/home.png" style="height: 30px; width: 30px; margin: 3px;">Accueil</a></li>
                    <li><a href="monreseau.php"><img src="images/icones/reseau.png" style="height: 30px; width: 30px; margin: 3px;">Messages</a></li>
                    <li><a href="notifications.php"><img src="images/icones/notifications.png" style="height: 30px; width: 30px; margin: 3px;">Notifications</a></li>
                    

                    <li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="images/icones/vous.png" style="height: 30px; width: 30px; margin: 3px;">Vous <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="vous.php">Mon Profil</a></li>
                            <li><a href="deconnexion.php">Déconnexion</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header><!--/header-->
    
    
    <div id="content-wrapper" style="margin-top: 100px;">

            

            <?php
                 
             
                    
                
                    
                    echo '<div class="mapage">
                            <div class="row">
                                <div class="col-sm-4" style="margin-left: 10px;">
                                    <img src="'.$db_field1['chemin_profil'].'" style="height: 120px; width:140px;  margin-left:10px; margin-top:10px;">
                                </div>
                                
                                <div class="col-sm-6" >
                                    <h1>'.$db_field1['prenom'].' '.$db_field1['nom'].' ('.$db_field1['pseudo'].')</h1>';
                                    if($pasami==0 && $pasdemande==0){
                                echo '<form method="post" action="demandeami.php" style="margin-right:0px;">
                                            <input type="hidden" name="idami" value="'.$idpersonne.'"/>
                                            <input type="submit" value="Ajouter au réseau" style="background-color: black; color: white;"/>
                                        </form>';
                    }
                    else if($pasami==0){
                                echo '<div class="row">
                                <div class="col-sm-12">
                                <form method="post" action="accepterami.php" style="margin-right:0px;">
                                    <input type="hidden" name="idami" value="'.$idpersonne.'"/>
                                    <input type="submit" value="Accepter la demande" style="background-color: black; color: white;"/>
                                </form> 
                                <form method="post" action="refuserami.php" style="margin-right:0px;">
                                    <input type="hidden" name="idami" value="'.$idpersonne.'"/>
                                    <input type="submit" value="Refuser la demande" style="background-color: black; color: white;"/>
                                </form> 
                                </div>
                                </div>';
                    }
                    if($pasami!=0 && $pasdemande==0){
                        echo '<form method="post" action="suppressionami.php" style="margin-right:0px;">
                                    <input type="hidden" name="idami" value="'.$idpersonne.'"/>
                                    <input type="submit" value="Supprimer la relation" style="background-color: black; color: white;"/>
                                </form> ';
                    }
                       
                       
                  echo  '</div>
                                
                            </div>    
                          </div>';
                                
                }
              
        
                
            ?>
        <section id="about-us" class="white" style="padding-top: 0; margin-top: 0px;">
            <div class="row " >
            <div class="col-sm-4 colgauche">
                <h3 style="text-align: center;">Infos</h3>
                <div style="text-align: left; margin-left: 50px;">
                    <?php
                        if($db_handle && $db_found){
                        $SQL1 = "SELECT * from cv WHERE idutilisateur ='".$idpersonne."'";
                        $result1 = mysqli_query($db_handle, $SQL1);
                        $db_field1=mysqli_fetch_assoc($result1);
                        echo '<strong><br><br>Formation :</strong><br> '.$db_field1['formation'].' 
                            
                        <br><br><strong>Expérience :</strong><br> '.$db_field1['experience'].'
                        
                        <br><br> <strong>Intérêts :</strong><br> '.$db_field1['interets'];

                        }
                    ?>
                </div>
            </div>
                    
            
            <div class="col-sm-8">
        	<div style="margin-top: 10px;">
                
                
              
                <?php

                if($db_handle && $db_found){
                    if($pasami!=0){
                    $SQL1 = "
                    SELECT post.id as id, prenom, nom, chemin, texte, date FROM post INNER JOIN photo ON post.id = photo.id INNER JOIN utilisateur ON post.idutilisateur = utilisateur.id WHERE post.idutilisateur ='".$idpersonne."' ORDER BY post.date DESC";
                    $result1 = mysqli_query($db_handle, $SQL1);
                    
                    
                    while($db_field1=mysqli_fetch_assoc($result1)) {
                        $idpost = $db_field1['id'];
                        
                        //$db_field2=mysqli_fetch_assoc($result2);
                        echo '<div style="margin-bottom: 10px;" class="col-sm-12">
                    <div style="border: 1px solid #0B0000;" class="row">
                    
                        <div class="col-sm-6" ><h3>Posté par : '. $db_field1['prenom'].' '.$db_field1['nom'].'</h3></div>
                    
                    
                        <div class="col-sm-4"><h3>Date : '.$db_field1['date'].' </h3></div>
                        
                        
                   
                   </div>
                    
                     <div style="border: 0.5px solid #0B0000; padding-top : 5px;" class="row">
                    
                         <div class="col-sm-6"><a class="preview btn btn-outlined btn-primary" href="'.$db_field1['chemin'].'" rel="prettyPhoto"><img src="'.$db_field1['chemin'].'" style="height: 200px; width:300px;"></a></div>
                    
                    
                        <div class="col-sm-6"><p>'.$db_field1['texte'].'</p></div>
                        <div style="margin-top: 200px;">
                            <form method="post" action="pagepost.php">
                                <input type="hidden" name="idpost" value="'.$idpost.'"/>
                                <input type="submit" value="Voir les commentaires" style="background-color: black; color: white;"/>
                            </form>
                            </div>
                   
                   </div>
                </div>'  ;
                        
                }
                }
                }
    ?>
                
	           
 
            </div>      
            </div>
            </div>
                        

        </section>



            
        </div>

    <div id="footer-wrapper" style="background-color: #3F90F2;">
        <section id="bottom" class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 about-us-widget">
                        
                    </div><!--/.col-md-3-->

                    

                   
                </div>
            </div>
        </section><!--/#bottom-->

        <footer id="footer" class=""  >
            <div class="container" >
                <div class="row">
                    <div class="col-sm-6">
                        &copy; 2019 Dischoolvery (ECE Paris). All Rights Reserved.
                    </div>
                     <div class="col-md-6 col-sm-6">
                        <h2>Contactez-nous</h2>
                        <address>
                            <strong>Dischoolvery</strong><br>
                            Facebook : <a href="https://www.facebook.com/dischoolvery/">Dischoolvery</a>  <br>
                        </address>
                    </div> <!--/.col-md-3-->
                    <div class="col-sm-6">
                        <ul class="pull-right">
                            <li><a id="gototop" class="gototop" href="#"><i class="fa fa-chevron-up"></i></a></li><!--#gototop-->
                        </ul>
                    </div>
                </div>
            </div>
        </footer><!--/#footer-->
    </div>
    
    


    <script src="js/plugins.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>   
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWDPCiH080dNCTYC-uprmLOn2mt2BMSUk&amp;sensor=true"></script> 
    <script src="js/init.js"></script>
    
</body>
</html>
<?php
                    
                }
                    
                    ?>