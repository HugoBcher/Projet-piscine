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
    <title>Votre page | Dischoolvery </title>
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
    
    
    <div id="content-wrapper" style="margin-top: 82px;">

            
                            
                    
        

            <?php
                 require 'configure.php' ;
                if($db_handle && $db_found){
                    $SQL1 = "SELECT * FROM utilisateur WHERE pseudo='".$_SESSION['pseudo']."'";
                    $result1 = mysqli_query($db_handle, $SQL1);
                    $db_field1=mysqli_fetch_assoc($result1);     
                    
                    echo '<div class="mapage" style="background-color: #ABBED6; height: 80px;">
                            
                                
                                <div class="col-sm-5" >
                                    <h1>'.$db_field1['prenom'].' '.$db_field1['nom'].'</h1>
                                </div>
                               
                          </div>';
                    }
        
                
            ?>

        

        <section  class="white" style="padding-top: 0; margin-top: 0px; width: 100%;">
            <div class="row" >
            <div style="text-align: center; width: 100%;">
                <h2 >Vos informations</h2>
                
                    <?php
                        if($db_handle && $db_found){
                        $SQL1 = "SELECT * FROM student WHERE LoginS = '".$_SESSION['pseudo']."'";
                        $result1 = mysqli_query($db_handle, $SQL1);
                        $db_field1=mysqli_fetch_assoc($result1);
                            if($db_field1['Level']==1){
                                $level="Seconde";
                            }
                            if($db_field1['Level']==2){
                                $level="Premiere";
                            }
                            if($db_field1['Level']==3){
                                $level="Terminale";
                            }
                        echo '<strong><br><br>Formation</strong><br> '.$db_field1['Sector'].' 
                            <form method="post" action="modificationformationL.php">
                                <input type="submit" value="Modifier la formation" style="background-color: #3F90F2; color: white; margin-top:15px; height: 30px; "/>
                            </form>
                        <br> <strong>Niveau d\'études</strong><br> '.$level.'
                        <form method="post" action="modificationniveauL.php">
                                <input type="submit" value="Modifier votre niveau" style="background-color: #3F90F2; color: white; margin-top:15px; height: 30px; "/>
                                </form>
                        <br> <strong>Intérêts </strong><br> '.$db_field1['Tag1'].'
                        <br><form method="post" action="modificationtag1L.php">
                            <input type="submit" value="Modifier les intérêts" style="background-color: #3F90F2; color: white; margin-top:15px; height: 30px; "/>
                            </form>';

                        }
                    ?>
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
    <script src="js/init.js"></script>
</body>
</html>