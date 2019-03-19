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
    <title>Notifications | Dischoolvery </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/pe-icons.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/notifications.css" rel="stylesheet">
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

    <script type="text/javascript">
    jQuery(document).ready(function($){
    'use strict';
        jQuery('body').backstretch([
            "http://placehold.it/800x600",
            "http://placehold.it/800x600",
            "http://placehold.it/800x600"
        ], {duration: 5000, fade: 500});

        $("#mapwrapper").gMap({ controls: false,
            scrollwheel: false,
            markers: [{     
                latitude:40.7566,
                longitude: -73.9863,
            icon: { image: "images/marker.png",
                iconsize: [44,44],
                iconanchor: [12,46],
                infowindowanchor: [12, 0] } }],
            icon: { 
                image: "images/marker.png", 
                iconsize: [26, 46],
                iconanchor: [12, 46],
                infowindowanchor: [12, 0] },
            latitude:40.7566,
            longitude: -73.9863,
            zoom: 14 });
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
                            <li><a href="vous.php">Mon Profil</a></li>
                            <li><a href="deconnexion.php">Déconnexion</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header><!--/header-->
    
    <div id="content-wrapper" style="margin-top: 100px;">
        <div class="mapage"> 
                            <h1> Notifications </h1>
                    
        </div>
        <section id="portfolio" class="white">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-4">
                     <h3>Demandes d'ajout au réseau</h3>
                        
                <?php 
                require 'configure.php' ;
                if($db_handle && $db_found){
                    
                    $SQLid = "SELECT id FROM utilisateur WHERE pseudo = '".$_SESSION['pseudo']."'" ;
                    $resultid = mysqli_query($db_handle, $SQLid);
                    $db_fieldid=mysqli_fetch_assoc($resultid);
                    $id = $db_fieldid['id'];

                    $SQL = "SELECT * FROM utilisateur WHERE id IN (SELECT iddemandeur FROM `notificationamitie` WHERE id = '".$id."')" ;
                    $result = mysqli_query($db_handle, $SQL);
                    
                    $SQLcount = "SELECT COUNT(*) AS nb FROM utilisateur WHERE id IN (SELECT iddemandeur FROM notificationamitie WHERE id = '".$id."')" ;
                    $resultcount = mysqli_query($db_handle, $SQLcount);
                    $db_fieldcount=mysqli_fetch_assoc($resultcount);
                    $nb = $db_fieldcount['nb'];
                    if($nb==0){
                        echo '<div style="margin-left: 5px;"> <h5> Vous n\'avez aucune demande de relation.</h5></div>';
                    }
                    else {
                        echo '<div style="margin-left: 5px;"> <h5> Vous avez '.$nb.' demande(s) de relation.</h5></div>';
                        while($db_field=mysqli_fetch_assoc($result)){
                        
                         $idami = $db_field['id'];
                         
                            
                         echo '
        
            <div class="container">
            <div class="gap"></div>             
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="service-block">
                            <div class="pull-left bounce-in">
                                <img src="'.$db_field['chemin_profil'].'" style="height: 60px; width: 60px; margin-right: 10px;">
                            </div>
                            <div class="media-body fade-up">
                                <h3 class="media-heading" style="margin-right: 2px;"><a href="profil.php?id='.$idami.'">'.$db_field['prenom'].' '.$db_field['nom'].'</a>
                                
                                </h3>
                            
                                <form method="post" action="accepterami.php" style="margin-right:0px;">
                                    <input type="hidden" name="idami" value="'.$idami.'"/>
                                    <input type="submit" value="Accepter" style="background-color: black; color: white;"/>
                                </form> 
                                <form method="post" action="refuserami.php" style="margin-right:0px;">
                                    <input type="hidden" name="idami" value="'.$idami.'"/>
                                    <input type="submit" value="Refuser" style="background-color: black; color: white;"/>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    
                    
                </div>
            </div>
            ';
                        }
                        
                        
                    }
                    
                    
                    
                    
                }

                ?>
                    </div>
                    
                    <div class="col-md-8" >
                        <h3 style="text-align: center;">Autres</h3>
                        <div class="row" style="text-align: center;">
                            <div class="col-md-6" style=" border-style: solid;">
                             <h4 >Commentaires </h4> <br>
                                
                                <?php
                                if($db_handle && $db_found){
                                    $SQLnot ="SELECT idpost, date, j.nom, j.prenom, notificationcommentaire.idcommentateur AS idcommentateur FROM notificationcommentaire INNER JOIN utilisateur u ON notificationcommentaire.id = u.id INNER JOIN utilisateur j ON idcommentateur =j.id WHERE u.id='".$id."' AND j.id != '".$id."' ORDER BY date DESC" ;
                                    $resultnot = mysqli_query($db_handle, $SQLnot);
                                    while($db_fieldnot=mysqli_fetch_assoc($resultnot)){
                                        $idpost=$db_fieldnot['idpost'];
                                        
                                        echo '<a href="profil.php?id='.$db_fieldnot['idcommentateur'].'">'.$db_fieldnot['prenom'].' '.$db_fieldnot['nom'].'</a> a commenté ce 
                                        <form method="post" action="pagepost.php" style="margin: 0px; padding:0px;">
                                        <input type="hidden" name="idpost" value="'.$idpost.'"/>
                                        <input type="submit" value="post" style="margin: 0px;"/>
                                        </form>';
                                    }
                                }
                                ?>
                                
                                
                                
                                
                            </div>
                            <div class="col-md-6" style="text-align: center; border-style: solid;">
                              <h4 style="text-align: center;">Likes </h4> <br>
                                
                                <?php
                                if($db_handle && $db_found){
                                    $SQLnot ="SELECT idpost, date, j.nom, j.prenom, notificationaime.idlikeur AS idlikeur FROM notificationaime INNER JOIN utilisateur u ON notificationaime.id = u.id INNER JOIN utilisateur j ON idlikeur =j.id WHERE u.id='".$id."' AND j.id != '".$id."' ORDER BY date DESC" ;
                                    $resultnot = mysqli_query($db_handle, $SQLnot);
                                    while($db_fieldnot=mysqli_fetch_assoc($resultnot)){
                                        $idpost=$db_fieldnot['idpost'];
                                        
                                        echo '<a href="profil.php?id='.$db_fieldnot['idlikeur'].'">'.$db_fieldnot['prenom'].' '.$db_fieldnot['nom'].'</a> a aimé ce 
                                        <form method="post" action="pagepost.php" style="margin: 0px; padding:0px;">
                                        <input type="hidden" name="idpost" value="'.$idpost.'"/>
                                        <input type="submit" value="post" style="margin: 0px;"/>
                                        </form>';
                                    }
                                }
                                ?>
                            </div>
                        
                        
                        
                        </div>
                    
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

    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/init.js"></script>
</body>
</html>