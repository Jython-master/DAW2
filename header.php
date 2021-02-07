        <!-- *** NAVBAR ***
        _________________________________________________________ -->

        <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand scrollTo" id="userrr">Artify</a>
                </div>

                <div class="navbar-collapse collapse" id="navigation">

                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#intro">Search Something</a>
                        </li>
                        <li><a href="#section1">Featured</a>
                        </li>
                        <li>
                            <a id="latestReleases">Latest Releases</a>
                        </li>
                        <li><a href="#section2" id="sort">Genres</a>
                            <div id="dropdowncontent" style="background-color: #fff;">
                                <ul>
                                <?php
                                    require_once "genredb.php";
                                $genrelist = new genredb();
                                $genrelist = $genrelist->select();
                                foreach($genrelist as $a){ ?>
                                    <li><a class="ling" id="genre<?php echo $a->getId()?>"><?php echo $a->getName(); ?></a></li>
                              <?php  }
                                ?>
                                </ul>
                            </div>
                        </li>
                        <li><a id="settingsss">Settings</a>
                        </li>
                        <li><a id="logout">Logout</a>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
                <script>
                $().ready(function(){
                    $("#logout").click(function(){
                        window.location.href = "logoutUser.php";
                    });
                    $("#settingsss").click(function(){
                        window.location.href = "settings.php";
                    });
                    $("#userrr").click(function(){
                        window.location.href = "userrr.php";
                    });
                    $("#latestReleases").click(function(){
                        window.location.href = "latestReleases.php";
                    });
                    $("#sort").click(function(){
                        $("#dropdowncontent").slideToggle();
                    });
                     <?php
                                foreach($genrelist as $a){ ?>
                    $("#genre<?php echo $a->getId(); ?>").click(function(){
                        window.location.href = "genre.php?id=<?php echo $a->getId(); ?>";
                    });
                    <?php  }
                                ?>
                });
                </script>
            </div>
        </div>
        <!-- /#navbar -->
        <!-- *** NAVBAR END *** -->
