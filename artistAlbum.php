
<!DOCTYPE html>
<?php
require_once "logininininin.php";
require_once "genredb.php";
require_once "albumdb.php";
require_once "artistdb.php";
$aa = new albumdb();
$artis = new Artistdb();
$aa = $aa->selectOne($_GET['id']);
foreach($aa as $albummm){
?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
    <!--<![endif]-->

    <head>
        <meta charset="utf-8">
        <meta name="robots" content="all,follow">
        <meta name="googlebot" content="index,follow,snippet,archive">
        <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="js2/jquery-1.11.0.min.js"></script>
        <title>Artify</title>

        <meta name="keywords" content="">

        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>

        <!-- Bootstrap and Font Awesome css -->
        <link href="css2/font-awesome.css" rel="stylesheet">
        <link href="css2/bootstrap.min.css" rel="stylesheet">

        <!-- owl carousel css -->

        <link href="css2/owl.carousel.css" rel="stylesheet">
        <link href="css2/owl.theme.css" rel="stylesheet">	        

        <!-- Theme stylesheet -->
        <link href="css2/style.default.css" rel="stylesheet" id="theme-stylesheet">

        <!-- Custom stylesheet - for your changes -->
        <link href="css2/custom.css" rel="stylesheet">

        <!-- CSS Animations -->
        <link href="css2/animate.css" rel="stylesheet">

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.png">

        <!-- Mordernizr -->
        <script src="js2/modernizr-2.6.2.min.js"></script>

        <!-- Responsivity for older IE -->
        <!--[if lt IE 9]>
        <script src="js2/respond.min.js"></script>
    <![endif]-->

        <meta property="og:title" content="Landing Page | Landing Page Bootstrap Theme by Bootstrapious.com!">
        <meta property="og:site_name" content="Landing Page | Landing Page Bootstrap Theme by Bootstrapious.com!">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">

        <meta property="og:image" content="">  

        <meta name="twitter:card" content="summary">
        <meta name="twitter:creator" content="@bootstrapious">
        <link href="css/randomfile.css" type="text/css" rel="stylesheet"/>

    </head>

    <body data-spy="scroll" data-target="#navigation" data-offset="120">


<?php require_once "headerArtist.php"; ?>

        <div id="all">


            <!-- *** INTRO IMAGE ***
        _________________________________________________________ -->
            <div id="intro" class="clearfix">
                <div class="item">
                    <div class="container">
                        <div class="row">

                            <h1 data-animate="fadeInDown"><?php echo $albummm->getName(); ?></h1>
                             <p class="lead"><a href="UpdateAlbum.php?id=<?php echo $albummm->getId(); ?>">Update</a> <?php echo $albummm->getName(); ?></p>
                            <p  class="message" data-animate="fadeInUp">By <?php echo $artis->selectname($albummm->getArtist()); ?>| Release Year: <?php echo $albummm->getRelease(); ?>| Genre: <?php 
                         $ge = new genredb();
                         echo $ge->selectOne($albummm->getGenre()); ?></p>
                            <div class="col-md-6 col-md-offset-3" data-animate="fadeInUp">
                                <form action="" method="get" id="frm-landingPage1" class="form">
                                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search songs within the album" name="email" id="frm-landingPage1-email" >

                                        <span class="input-group-btn">

                                            <input class="btn btn-default" type="submit" value="Submit" name="_submit" id="frm-landingPage1-submit">
                                        </span>

                                    </div>
                                    <!-- /input-group -->
                                </form>

                                <p class="text-small">See how you found them</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- *** INTRO IMAGE END *** -->



            <!-- *** SERVICES ***
        _________________________________________________________ -->
            <div class="section" id="section1">
                <div class="container">
                    <div class="col-md-12">
                        <h2 class="title" data-animate="fadeInDown"><?php echo $albummm->getName();?></h2>

<?php
                            require_once "musicdb.php";
                                $c = new musicdb();
                            $a = new albumdb();
                            if(isset($_GET['email']) && $_GET['email'] !== ""){
                                $nameee = $c->selectAlbumMusic($_GET['id'], $_GET['email']);
                            }
                            else{
                                $nameee = $c->selectAlbumMusic($_GET['id']);
                            }
                                 
                         
                            ?>
                        <div class="row services">
                            <h1 class="lead">Songs</h1>
                           <?php foreach($nameee as $artist){ ?>
                             <div class="col-md-4" data-animate="fadeInUp">
                                <div class="icon"><img src="img/<?php echo $artist->getPhoto(); ?>" class="fa albumimg" alt="profile picture">
                                </div>
                                <h3 class="heading"><?php echo $artist->getNome(); ?></h3>Album: <?php echo $artist->getAn(); ?>
                                         <form method="post" action="UpdateSong.php"><input type="hidden" name="id" value="<?php echo $artist->getId(); ?>"><input type="submit" value="Update"></form><form method="post" action="deleteSong.php"><input type="hidden" name="id" value="<?php echo $artist->getId(); ?>"><input type="submit" value="Delete"></form><br/>
                                 <audio controls id="music<?php echo $artist->getId(); ?>">
                                <source src="music/<?php echo $artist->getArquivo(); ?>" type="audio/mpeg"> 
                            </audio>
                            </div>
                               <?php }
                            ?>
                            </div>

                    </div>
                    <!-- /.12 -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.section -->

            <!-- *** SERVICES END *** -->

            <!-- *** FOOTER ***
        _________________________________________________________ -->

            <div class="section" id="footer">
                <div class="container">

                    <div class="row">

                        <div class="col-sm-6">

                            <p class="social">
                                <a href="#" class="external facebook" data-animate-hover="shake" data-animate="fadeInUp"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="external instagram" data-animate-hover="shake" data-animate="fadeInUp"><i class="fa fa-instagram"></i></a>
                                <a href="#" class="external twitter" data-animate-hover="shake" data-animate="fadeInUp"><i class="fa fa-twitter"></i></a>
                                <a href="mailto:#" class="email" data-animate-hover="shake" data-animate="fadeInUp"><i class="fa fa-envelope"></i></a>
                            </p>
                        </div>
                        <!-- /.6 -->

                        <div class="col-sm-6">
                            <p>&copy; 2016 Your name goes here. 
                                <!-- Do not remove the attribution, thx! If you need to do so, pls donate (http://bootstrapious.com/donate) to support us! -->
                                Template by <a href="https://www.bootstrapious.com/landing-pages" class="external">Bootstrapious</a>.</p>
                        </div>

                    </div>

                </div>
                <!-- /.container -->
            </div>
            <!-- /.section -->

            <!-- *** FOOTER END *** -->
        </div>

        <!-- js base -->
        <script src="js2/bootstrap.min.js"></script>


        <!-- waypoints for scroll spy -->
        <script src="js2/waypoints.min.js"></script>

        <!-- owl carousel -->
        <script src="js2/owl.carousel.min.js"></script>        

        <!-- jQuery scroll to -->
        <script src="js2/jquery.scrollTo.min.js"></script>

        <!-- main js file -->

        <script src="js2/front.js"></script>        
            <script>
            $().ready(function(){
                <?php foreach($nameee as $artist){ ?>
                $("#music<?php echo $artist->getId(); ?>").click(function(){
                    var myMusic = document.getElementById("<?php echo $artist->getArquivo(); ?>");
                    audio.myMusic();
                }
                );
                <?php } ?>
            });
            </script>

    </body>
</html>
<?php } ?>