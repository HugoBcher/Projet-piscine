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
    <title>Accueil | Dischoolvery</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/pe-icons.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/icones/network.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/ico/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/ico/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" href="images/ico/apple-touch-icon-57x57.png">

    <script type="text/javascript">
    jQuery(document).ready(function($){
	'use strict';
      	jQuery('body').backstretch([
	        "images/bg/bg1.jpg",
	        "images/bg/bg2.jpg",
	        "images/bg/bg3.jpg"
	    ], {duration: 5000, fade: 500, centeredY: true });
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
                <?php 
                require 'configure.php' ;
                if($db_handle && $db_found){
                    
                    $SQLid = "SELECT type FROM utilisateur WHERE pseudo = '".$_SESSION['pseudo']."'" ;
                    $resultid = mysqli_query($db_handle, $SQLid);
                    $db_fieldid=mysqli_fetch_assoc($resultid);
                    $type = $db_fieldid['type'];

                    
                    if($type==0){
                        
                        echo '<a class="navbar-brand" href="indexT.php"><h1><span></span><img src="images/icones/network.png" style="height: 40px; width: 40px;"> DISCHOOLVERY </h1></a>';
                    }
                    else if ($type==1){
                        echo '<a class="navbar-brand" href="indexL.php"><h1><span></span><img src="images/icones/network.png" style="height: 40px; width: 40px;"> DISCHOOLVERY </h1></a>';
                    }
                }
                        ?>
                 
    
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?php 
                    if($type==1){
                        echo'<li><a href="indexL.php"><img src="images/icones/home.png" style="height: 30px; width: 30px; margin: 3px;">Accueil</a></li>';
                    }
                        else if($type==0){
                            echo'<li><a href="indexT.php"><img src="images/icones/home.png" style="height: 30px; width: 30px; margin: 3px;">Accueil</a></li>';
                        }
                    
                    ?>
                    
                    <li><a href="monreseau.php"><img src="images/icones/reseau.png" style="height: 30px; width: 30px; margin: 3px;">Messages</a></li>
                    <li><a href="notifications.php"><img src="images/icones/notifications.png" style="height: 30px; width: 30px; margin: 3px;">Notifications</a></li>
                    

                    <li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="images/icones/vous.png" style="height: 30px; width: 30px; margin: 3px;">Vous <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                            <?php 
                    
                    if($type==0){
                        
                        echo '<a href="vousT.php">Mon Profil</a>';
                    }
                    else if ($type==1){
                        echo '<a href="vousL.php"> Mon Profil </a>';
                    }
                
                        ?>
                                 </li>
                            <li><a href="deconnexion.php">Déconnexion</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header><!--/header-->



    <div id="content-wrapper">
        <section id="contact" class="white">
                <div class="container">
                	<div class="gap"></div>
                    <div class="center gap fade-down section-heading" style="border-color: black;">
                        <h2 class="main-title">RECHERCHER</h2>
                        <hr>
                        <p>Entrez une recherche, un nom d'école, une spécialité...</p>
                    </div>    
                    <div class="gap"></div>

                    <div class="row">

                        <div class="col-sm-3"></div>
                        <div class="col-sm-4" style="margin-left: 20px;">
                            <div id="message"></div>
                            <form method="post" action="recherche.php">
                                <input type="text" name="rech" id="rech" placeholder="" style="width: 500px; background: #D5D8DC; color: black;"/><br><br>
                                
                                <input class="btn btn-outlined" style="background-color: black; color: white; margin-left: 50px;"type="submit" name="rechercher" value="Rechercher" /> 
                            </form>
                             
                            
                                </div>
                        
          
                    </div><!-- row -->        
                </div>
            </section>
        <section id="services" class="white">
            <div class="container">
            
        </section>
            
           



        <section id="about-us" class="white" style="padding-top: 0;">
        	<div class="container">
              
                <?php

                 require 'configure.php' ;
                if($db_handle && $db_found){

                    $SQLid = "SELECT id FROM utilisateur WHERE pseudo = '".$_SESSION['pseudo']."'" ;
                    $resultid = mysqli_query($db_handle, $SQLid);
                    $db_fieldid=mysqli_fetch_assoc($resultid);
                    $id = $db_fieldid['id'];
                    $SQL1 = "
                   SELECT post.id as idpost, nom, prenom, chemin, date, texte, utilisateur.id as idpersonnepost FROM post INNER JOIN photo ON post.id = photo.id INNER JOIN utilisateur ON post.idutilisateur = utilisateur.id WHERE post.id IN (SELECT post.id FROM post INNER JOIN utilisateur ON post.idutilisateur = utilisateur.id WHERE post.idutilisateur IN (SELECT id FROM utilisateur WHERE pseudo IN (SELECT pseudo FROM utilisateur WHERE id IN (SELECT id2 FROM reseau WHERE id1 = '".$id."')))) ORDER BY post.date DESC ";
                    $result1 = mysqli_query($db_handle, $SQL1);

                    while($db_field1=mysqli_fetch_assoc($result1)){
                        
                         $idpost = $db_field1['idpost'];
                        $idpersonnepost = $db_field1['idpersonnepost'];
                        
                        $SQLaime ="SELECT COUNT(*) AS a FROM aime WHERE idpost='".$idpost."' AND idutilisateur='".$id."'";
                        $resultaime = mysqli_query($db_handle, $SQLaime);
                        $db_fieldaime=mysqli_fetch_assoc($resultaime);
                        $like=$db_fieldaime['a'];
                        
                        echo '<div style="margin-bottom: 10px;" class="col-sm-12">
                    <div style="border: 1px solid #0B0000;" class="row">
                    
                        <div class="col-sm-8"><h3>Posté par : <a href="profil.php?id='.$idpersonnepost.'">'.$db_field1['prenom'].' '.$db_field1['nom'].'</a></h3></div>
                    
                    
                        <div class="col-sm-4"><h3>Date : '.$db_field1['date'].' </h3></div>
                   
                   </div>
                    
                     <div style="border: 0.5px solid #0B0000; padding-top : 5px;" class="row">
                    
                         <div class="col-sm-4"><a class="preview btn btn-outlined btn-primary" href="'.$db_field1['chemin'].'" rel="prettyPhoto"><img src="'.$db_field1['chemin'].'" style="height: 200px; width:300px;"></a></div>
                    
                    
                        <div class="col-sm-8"><p>'.$db_field1['texte'].'</p>
                        <div style="margin-top: 200px;">
                            <form method="post" action="pagepost.php">
                                <input type="hidden" name="idpost" value="'.$idpost.'"/>
                                <input type="submit" value="Voir les commentaires" style="background-color: black; color: white;"/>
                            </form>';
                            if($like==0){
                            echo '<form method="post" action="aimerpost.php">
                                <input type="hidden" name="idpost" value="'.$idpost.'"/>
                                <input type="hidden" name="idpersonnepost" value="'.$idpersonnepost.'"/>
                                <input type="submit" value="Aimer le post" style="margin-top: 5px; background-color: black; color: white;"/>
                            </form>';
                            }
                       else if($like==1){
                            echo '<form method="post" action="plusaimerpost.php">
                                <input type="hidden" name="idpost" value="'.$idpost.'"/>
                                <input type="hidden" name="idpersonnepost" value="'.$idpersonnepost.'"/>
                                <input type="submit" value="Ne plus aimer le post" style="margin-top: 5px; background-color: black; color: white;"/>
                            </form>';
                            }
                        echo '</div>
                        </div>
                   
                   </div>
                </div>';
                        
                    }
                        
                        
                }
                
    ?>
                
	           
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