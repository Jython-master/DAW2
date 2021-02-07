<!DOCTYPE html>
<?php
require_once "logininininin.php";
require_once "genredb.php";
require_once "musicdb.php";
$a = new musicdb();
$a = $a->selectOne($_POST['id']);
$genero = new genredb();
foreach($a as $song){
?>
<html>
    <head>
    <meta charset="utf-8"/>
        <title>Artify</title>
        <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
        <link href="css/csslogin.css" type="text/css" rel="stylesheet"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-filestyle.js"></script>
    </head>
<div class="container-fluid">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-6 d-none d-md-flex bg-image"></div>


        <!-- The content half -->
        <div class="col-md-6 bg-light">
            <div class="login d-flex align-items-center py-5">

                <!-- Demo content-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-7 mx-auto">
                            <h3 class="display-4">Add music!</h3>
                            <form method="post" action="updateson.php" enctype="multipart/form-data" method="post">
                                <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
                                <input type="hidden" name="album" value="<?php echo $song->getAlbum(); ?>">
                                <div class="form-group mb-3">
                                    <input id="inputEmail" type="text" placeholder="Song Title" required="" autofocus="" name="email" class="form-control rounded-pill border-0 shadow-sm px-4" value="<?php echo $song->getNome(); ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <select id="job" name="jobtitle" class="form-control custom-select bg-white border-left-0 border-md">
                                        <option value="<?php echo $song->getGenero(); ?>"> <?php echo $genero->selectOne($song->getGenero()); ?></option>
                            <?php
                            $a = new genredb();
                            $aa = $a->select();
                            foreach($aa as $a){ ?>
                            <option value="<?php echo $a->getId(); ?>"> <?php echo $a->getName(); ?> </option>
                            <?php }
                            ?>
                        </select>
                                </div>
                                <div class="form-group col-lg-12 mx-auto mb-0">
                        <input type="file" class="filestyle btn btn-primary btn-block py-2" data-input="false" name="prop" accept="audio/*" data-text="File of the song" required="true">
                    </div>
                                <br/>
                                <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Add song</button>
                            </form>
                        </div>
                    </div>
                </div><!-- End -->

            </div>
        </div><!-- End -->

    </div>
</div>
</html>
<?php } ?>