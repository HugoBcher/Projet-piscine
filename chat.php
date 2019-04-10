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
    <title>Mon réseau | Dischoolvery</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/pe-icons.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/chat.css" rel="stylesheet">
    <link href="css/monreseau.css" rel="stylesheet">
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


    
    <div id="content-wrapper" style="margin-top: 100px;">
        <div class="mapage"style="background-color: #3F90F2;"> 
                            <h1> Chat </h1>
                    
                </div>
        <section id="services" class="white">
          
        <div class="row">
                
        <div class="messages" style="margin-left: 25%; border: blue;">
         <div class="monchat" style=" text-align: center; overflow:scroll; height: 300px; width: 60%; border-style: groove; border-color: #3F90F2; border-radius: 0.8%;">      
                <div class="center"style=" font-size: 30px;">
         <?php
                require 'configure.php' ;
                if($db_handle && $db_found){
                    if(array_key_exists("id_chat", $_GET)){
                          $id_chat = $_GET['id_chat'];
                        }

                    $SQL1 = "SELECT id FROM utilisateur WHERE pseudo = '".$_SESSION['pseudo']."'" ;
                    $result1 = mysqli_query($db_handle, $SQL1);
                    $db_field1=mysqli_fetch_assoc($result1);
                    $id_profile = $db_field1['id'];

                    $SQL2 = "SELECT Text,id_sender, date_m FROM message WHERE chat = '".$id_chat."' ORDER BY date_m";
                   
                    $result2 = mysqli_query($db_handle, $SQL2);
                    $idami= 0 ;
                   

                    while($db_field2=mysqli_fetch_assoc($result2)){
                     if($db_field2["id_sender"]!= $id_profile){
                            echo ' <div class="incoming_msg">
                                          <div class="received_msg">
                                            <div class="received_withd_msg">
                                              <p> "'.$db_field2['Text'].'"</p>
                                              <span class="time_date"> "'.$db_field2['date_m'].'"</span></div>
                                          </div>
                                    </div> ';   

                                }       

                    else {
                                echo '<div class="outgoing_msg">
                                          <div class="sent_msg">
                                            <p>"'.$db_field2['Text'].'"</p>
                                            <span class="time_date"> "'.$db_field2['date_m'].'"</span> 
                                          </div>
                                      </div>                        ';   

                    }                
                            
                         }
                    
                                        
                }
    ?>  
                </div>

</div>
                  
    
    
       
        
        <div class="reponse" style="width:60%;">
                     <?php
                require 'configure.php' ;
                if($db_handle && $db_found){
                     if(array_key_exists("id", $_GET)){
                          $id1 = $_GET['id'];
                        }
                     if(array_key_exists("id_chat", $_GET)){
                          $id_chat = $_GET['id_chat'];
                        }

                    echo '<form action="post_msg.php" method="POST">
                             <div class="panel-footer">
                                 <div class="input-group">
                                    <input id="content" name = "content" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                                    <input type="hidden" name="id_chat" id="id_chat" value="'.$id_chat.'"/>
                                    <input type="hidden" name="id1" id="id1" value="'.$id1.'"/>
                                    <span class="input-group-btn"> 
                                    <button class="btn btn-primary btn-sm" type="submit">Send</button>
                                    </span>
                                </div>
                            </div>  
                        </form>' ;
                    }


                    ?>
                        
              </div> 
        </div>    
        </section>

    </div>
    <div id="footer-wrapper">
        

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