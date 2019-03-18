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
    <title>Emplois | Network</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/pe-icons.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/notifications.css" rel="stylesheet">
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
    <header class="navbar navbar-inverse navbar-fixed-top " role="banner" style="background-color: rgba(0, 0, 0);">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-bars"></i>
                </button>
                 <a class="navbar-brand" href="index.php"><h1><span></span><img src="images/icones/network.png" style="height: 40px; width: 40px;"> Network </h1></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php"><img src="images/icones/home.png" style="height: 30px; width: 30px; margin: 3px;">Accueil</a></li>
                    <li><a href="monreseau.php"><img src="images/icones/reseau.png" style="height: 30px; width: 30px; margin: 3px;">Mon réseau</a></li>
                    <li><a href="notifications.php"><img src="images/icones/notifications.png" style="height: 30px; width: 30px; margin: 3px;">Notifications</a></li>
                    <li><a href="emploi.php"><img src="images/icones/emploi.png" style="height: 30px; width: 30px; margin: 3px;">Emplois</a></li>

                    <li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="images/icones/vous.png" style="height: 30px; width: 30px; margin: 3px;">Vous <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="vous.php">Ma Page</a></li>
                            <li><a href="deconnexion.php">Déconnexion</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </header><!--/header-->



    <div id="content-wrapper" style="margin-top: 80px;">
        <div class="mapage" style="background-color: grey;"> 
                            <h1> Emplois </h1>
                    
        </div>
        <section id="contact" class="white">
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
                    $SQL1 = "SELECT * FROM emploi ORDER BY emploi.date DESC";
                    $result1 = mysqli_query($db_handle, $SQL1);

                    while($db_field1=mysqli_fetch_assoc($result1)){
                        echo '<div style="margin-bottom: 10px;" class="col-sm-12">
                    <div style="border: 1px solid #0B0000;" class="row">
                    
                        <div class="col-sm-4"><h3>Poste : '. $db_field1['poste'].'</h3></div>
                    
                        <div class="col-sm-4"><h3> Contrat : '. $db_field1['contrat'].'</h3></div>
                        <div class="col-sm-4"><h3 style="text-align:right;"> Date : '.$db_field1['date'].'</h3></div>
                   
                   </div>
                    
                     <div style="border: 0.5px solid #0B0000; padding-top : 5px;" class="row">
                    
                    
                    
                        <div class="col-sm-8">
                            <p><strong> Entreprise : </strong>'.$db_field1['entreprise'].'</p>
                            <p>'.$db_field1['texte'].'</p>
                        </div>
                        <div class="col-sm-3">
                            <p><strong> Contactez-nous : </strong><br>'.$db_field1['contact'].'</p>
                        </div>
                   </div>
                </div>';
                        
                    }
                        
                        
                }
                
    ?>
                
               
            </div> 
        </section>



            
        </div>

    <div id="footer-wrapper">
        <section id="bottom" class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 about-us-widget">
                        <h4>Network</h4>
                        <p>Le LinkedIn made in ECE.</p>
                    </div><!--/.col-md-3-->

                    

                    <div class="col-md-6 col-sm-6">
                        <h4>Contactez-nous</h4>
                        <address>
                            <strong>Maxime Fontaine et Dany Bouzemame</strong><br>
                            maxime.fontaine@edu.ece.fr<br>
                            dany.bouzemame@edu.ece.fr<br>
                        </address>
                    </div> <!--/.col-md-3-->
                </div>
            </div>
        </section><!--/#bottom-->

        <footer id="footer" class="">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        &copy; 2018 Network by Maxime Fontaine et Dany Bouzemame (ECE Paris). All Rights Reserved.
                    </div>
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