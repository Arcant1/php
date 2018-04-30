<header>
    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <h2 align=center>Bienvenido a La biblioteca de tu vieja!</h2>
            </div>
            <div class="col-md-4">
                <br>
                <form class="navbar-form navbar-left" role="search" action="validaciones/validarSearch.php" method="get">
                    <div class="form-group">
                        <label class="radio-inline"><input type="radio" name="search-type" value="anio">Año</label>
                        <label class="radio-inline"><input type="radio" name="search-type" value="genero">Genero</label>
                        <label class="radio-inline"><input type="radio" name="search-type" value="nombre">Nombre</label>
                        <br>
                        <br>
                        <input type="text" class="form-control" placeholder="Buscar" name="search">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                        <br>
                        <br>
                    </div>
                </form>
            </div>
            
            <div class="col-md-4">
                <br><br>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Menu <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <?php
                        if(isset($_SESSION['estado'])){
                            echo "<li><a href='funciones/cerrar.php'>Cerrar Sesion</a></li>";
                            echo " ";
                            echo "<li><a href='/Test/profile.php'>Perfil</a></li>";
                            echo " ";
                            if(isset($_SESSION['admin'])){
                                echo "<li><a href='/Test/new_movie.php'>Add Movie</a></li>";
                                echo " ";
                                echo "<li><a href='/Test/delete_movie.php'>Delete Movie</a></li>";
                                echo " ";
                            }
                        }else{
                            echo "<li><a href='/Test/signup.php'>Registrarse</a></li>";
                            echo " ";
                            echo "<li><a href='/Test/signin.php'>Iniciar Sesion</a></li>";
                        }
                        ?>
                    </ul>
                    <a class='btn btn-primary' href='/Test/index.php'>Index</a> 
                </div>  
            </div>
        </div>
    </div>
</header>