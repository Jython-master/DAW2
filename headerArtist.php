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
                    <a class="navbar-brand scrollTo" id="mainnnn" href="artistMain.php">Artify</a>
                </div>

                <div class="navbar-collapse collapse" id="navigation">

                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#intro">Search Something</a>
                        </li>
                        <li><a id="albuns">Add albuns</a>
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
                        window.location.href = "logoutArtist.php";
                    });
                    $("#albuns").click(function(){
                        window.location.href = "AddAlbum.php";
                    });
                    $("#settingsss").click(function(){
                        window.location.href = "settingsArtist.php";
                    });
                    $("#mainnnn").click(function(){
                        window.location.href = "artistMain.php";
                    });
                });
                </script>
            </div>
        </div>
        <!-- /#navbar -->
        <!-- *** NAVBAR END *** -->
