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
                 require 'configure.php' ;
                if($db_handle && $db_found){
                    $SQL1 = "SELECT chemin_fond FROM utilisateur WHERE pseudo='".$_SESSION['pseudo']."'";
                    $result1 = mysqli_query($db_handle, $SQL1);
                    $db_field1=mysqli_fetch_assoc($result1);     
                    $chemin_fond=$db_field1['chemin_fond'];
                    $SQLid = "SELECT id FROM utilisateur WHERE pseudo='".$_SESSION['pseudo']."'";
                    $resultid = mysqli_query($db_handle, $SQLid);
                    $db_fieldid=mysqli_fetch_assoc($resultid);     
                    $id=$db_fieldid['id'];
                    }    
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
    
    
    <div id="content-wrapper" style="margin-top: 55px;">

            

            <?php
                $idpost = $_POST['idpost'];
        echo $idpost;
        
        
                
            ?>

        

        <section id="about-us" class="white" style="padding-top: 0; margin-top: 0px;">
            <div class="row " >
            
                    
            
            <div class="col-sm-8">
        	<div style="margin-top: 10px;">
                
                
              
                <?php

                if($db_handle && $db_found){
                     $SQLaime ="SELECT COUNT(*) AS a FROM aime WHERE idpost='".$idpost."' AND idutilisateur='".$id."'";
                        $resultaime = mysqli_query($db_handle, $SQLaime);
                        $db_fieldaime=mysqli_fetch_assoc($resultaime);
                        $like=$db_fieldaime['a'];
                    
                    
                    $SQL1 = "
                    SELECT * FROM post INNER JOIN photo ON post.id = photo.id INNER JOIN utilisateur ON post.idutilisateur = utilisateur.id WHERE post.id='".$idpost."'";
                    $result1 = mysqli_query($db_handle, $SQL1);
                    
                    
                    $db_field1=mysqli_fetch_assoc($result1);
                       
                        
                        //$db_field2=mysqli_fetch_assoc($result2);
                        echo '<div style="margin-bottom: 10px;" class="col-sm-12">
                    <div style="border: 1px solid #0B0000;" class="row">
                    
                        <div class="col-sm-6"><h3>Posté par : <a href="profil.php?id='.$db_field1['idutilisateur'].'">'.$db_field1['prenom'].' '.$db_field1['nom'].'</a></h3></div>
                    
                    
                        <div class="col-sm-4"><h3>Date : '.$db_field1['date'].' </h3></div>
                        
                        
                   
                   </div>
                    
                     <div style="border: 0.5px solid #0B0000; padding-top : 5px;" class="row">
                    
                         <div class="col-sm-6"><a class="preview btn btn-outlined btn-primary" href="'.$db_field1['chemin'].'" rel="prettyPhoto"><img src="'.$db_field1['chemin'].'" style="height: 200px; width:300px;"></a></div>
                    
                    
                        <div class="col-sm-6"><p>'.$db_field1['texte'].'</p></div>';
                        
                        if($like==0){
                            echo '<form method="post" action="aimerpost.php" style="margin-top:200px;">
                                <input type="hidden" name="idpost" value="'.$idpost.'"/>
                                <input type="hidden" name="idpersonnepost" value="'.$db_field1['idutilisateur'].'"/>
                                <input type="submit" value="Aimer le post" style="margin-top: 5px; background-color: black; color: white;"/>
                            </form>';
                            }
                       else if($like==1){
                            echo '<form method="post" action="plusaimerpost.php" style="margin-top:200px;">
                                <input type="hidden" name="idpost" value="'.$idpost.'"/>
                                <input type="hidden" name="idpersonnepost" value="'.$db_field1['idutilisateur'].'"/>
                                <input type="submit" value="Ne plus aimer le post" style="margin-top: 5px; background-color: black; color: white;"/>
                            </form>';
                            }
                   
                   echo '</div>
                </div>'  ;
                        
                }
                
                
                
    ?>
                
                
                <div class="row" style="margin-left: 20px;">
                    <h2>Likes <br></h2>
                <?php
                
                    $SQLlikeurs ="SELECT * FROM utilisateur WHERE id IN (SELECT idutilisateur FROM aime WHERE idpost='".$idpost."')";
                $resultlikeurs = mysqli_query($db_handle, $SQLlikeurs);
                    
                    
                    while($db_fieldlikeurs=mysqli_fetch_assoc($resultlikeurs)){
                        echo '<a href="profil.php?id='.$db_fieldlikeurs['id'].'">'.$db_fieldlikeurs['prenom'].' '.$db_fieldlikeurs['nom'].'</a>, ';
                    }
                
                
                
                ?>
                    
                </div>
                <div class="row" style="margin-left: 20px;">
                 <h2>Commentaires</h2>
                    
                <?php
                    $idpersonnepost = $db_field1['idutilisateur'];
                    echo '<form method="post" action="commenter.php">
                        <input type="hidden" name="idpersonnepost" value="'.$idpersonnepost.'"/>
                        <input type="hidden" name="iddupost" value="'.$idpost.'"/>
                        <input type="hidden" name="idducommentateur" value="'.$id.'"/>
                        <textarea type="text" name="texte" id="name" placeholder="Votre commentaire ici"

                                          style="height: 100px; width: 500px; background: #D5D8DC; color: black;"></textarea>
                        <input type="submit" value="Commenter" style="margin-left: 5px; background-color: black; color: white;"/>
                    </form>';
                    
                    $SQLcom="SELECT commentaire.id AS idcom, utilisateur.id as id, texte, date, nom, prenom FROM commentaire INNER JOIN utilisateur ON commentaire.idutilisateur = utilisateur.id WHERE idpost='".$idpost."' ORDER BY date DESC";
                    $resultcom = mysqli_query($db_handle, $SQLcom);
                    
                    
                    while($db_fieldcom=mysqli_fetch_assoc($resultcom)){
                        $idcommentateur=$db_fieldcom['id'];
                        echo '<div class="row" style="margin-left: 25px;">
                            <h5>Commentaire de : <a href="profil.php?id='.$idcommentateur.'">'.$db_fieldcom['prenom'].' '.$db_fieldcom['nom'].'</a> ('.$db_fieldcom['date'].') </h5>
                            <p>'.$db_fieldcom['texte'].'
                            
                            </p>
                            
                        
                        
                       </div> ';
                    }
                ?>
                
	           
 
                    
                    
                    
                    
                </div>
            </div>      
            </div>
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
    <script src="js/init.js"></script>
</body>
</html>