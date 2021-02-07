<!DOCTYPE html>
<?php
require_once "logininininin.php";
require_once "genredb.php";

?>
<html>
    <head>
    <meta charset="utf-8"/>
        <title>Artify</title>
        <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
        <link href="css/csssignup.css" type="text/css" rel="stylesheet"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/file.js"></script>
        <script type="text/javascript" src="js/bootstrap-filestyle.js"></script>
    </head>
    <body>
<!-- Navbar-->
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light py-3">

    </nav>
</header>


<div class="container">
    <div class="row py-5 mt-4 align-items-center">
        <!-- For Demo Purpose -->
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="https://res.cloudinary.com/mhmd/image/upload/v1569543678/form_d9sh6m.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
            <h1>Add an album</h1>
            <p class="font-italic text-muted mb-0">Release music for countless users</p>
        </div>

        <!-- Registeration -->
        <div class="col-md-7 col-lg-6 ml-auto">
            <form action="addalbu.php" method="post" enctype="multipart/form-data">
                <div class="row">

                    <!-- First Name -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="firstName" type="text" name="firstname" placeholder="Album Name" class="form-control bg-white border-left-0 border-md" required="true">
                    </div>

                    <!-- Last Name -->
                    
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input type="date" id="lastName" type="text" name="lastname" placeholder="Formation Date" class="form-control bg-white border-left-0 border-md" required="true">
                    </div>

                    <!-- Email Address -->
                 
                    <!-- Phone Number -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                        </div>
                        <select id="job" name="jobtitle" class="form-control custom-select bg-white border-left-0 border-md">
                            <?php
                            $a = new genredb();
                            $aa = $a->select();
                            foreach($aa as $a){ ?>
                            <option value="<?php echo $a->getId(); ?>"> <?php echo $a->getName(); ?> </option>
                            <?php }
                            ?>
                        </select>
                    </div>


                    <!-- Job -->
    

                    <!-- Password Confirmation -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <input type="file" class="filestyle btn btn-primary btn-block py-2" data-input="false" name="prop" accept="image/*" data-text="Album Cover Photo" required="true">
                    </div>
                    <br/>
                    <br/>
<div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm" style="font-weight: bold">Add your album</button>
                    </div>
                    <!-- Divider Text -->


                    <!-- Social Login -->

                    <!-- Already Registered -->
               
                </div>
            </form>
        </div>
    </div>
</div>
    </body>
</html>