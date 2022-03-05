<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo DIRBASEURL ?>/">SUPERHEROES</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL ?>/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        </li>
                        <?php   
                            if($_SESSION['perfil'] == 'invitado') {
                                echo "<li class='nav-item'><li class='nav-item dropdown'>";
                                    echo "<a class='nav-link dropdown-toggle' href='#'id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Acceso</a>";
                                    echo "<ul class='dropdown-menu' aria-labelledby='navbarDropdown'>";
                                        echo "<li><a class='dropdown-item' href='". DIRBASEURL ."/login'>Inicia Sesion</a></li>";
                                        echo "<li><hr class='dropdown-divider'></li>";
                                        echo "<li><a class='dropdown-item' href='". DIRBASEURL ."/register/ciudadano'>Registrate</a></li>";
                                    echo "</ul>";
                                echo "</li>";
                            } else if ($_SESSION['perfil'] == 'ciudadano' || $_SESSION['perfil'] == 'superheroe') {
                                echo "<li class='nav-item'><li class='nav-item dropdown'>";
                                    echo "<a class='nav-link dropdown-toggle' href='#'id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>". strtoupper($_SESSION['nombreUsuario']) . "</a>";
                                    echo "<ul class='dropdown-menu' aria-labelledby='navbarDropdown'>";
                                        echo "<li><a class='dropdown-item' href='". DIRBASEURL ."/". $_SESSION['perfil'] ."/profile/" . $_SESSION['id']."'>Perfil</a></li>";
                                        echo "<li><hr class='dropdown-divider'></li>";
                                        echo "<li><a class='dropdown-item' href='". DIRBASEURL ."/logout'>Cerrar Sesion</a></li>";
                                    echo "</ul>";
                                echo "</li>";
                            }

                            if($_SESSION['perfil'] == 'ciudadano') {
                                echo "<li class='nav-item'>";
                                    echo "<a class='nav-link' href='#'></a>";
                                echo "</li>";
                                echo "<li class='nav-item'>";
                                    echo "<a class='nav-link active' aria-current='page' href=" . DIRBASEURL ."/ayuda>Pedir Ayuda</a>";
                                echo "</li>";
                            }

                            if($_SESSION['perfil'] == 'superheroe') {
                                echo "<li class='nav-item'>";
                                    echo "<a class='nav-link' href='#'></a>";
                                echo "</li>";
                                echo "<li class='nav-item'>";
                                    echo "<a class='nav-link active' aria-current='page' href=" . DIRBASEURL ."/habilidades>Habilidades</a>";
                                echo "</li>";
                                echo "<li class='nav-item'>";
                                    echo "<a class='nav-link' href='#'></a>";
                                echo "</li>";
                                echo "<li class='nav-item'>";
                                    echo "<a class='nav-link active' aria-current='page' href=" . DIRBASEURL ."/habilidades>Peticiones</a>";
                                echo "</li>";

                                if($_SESSION['evolucion'] == 'experto'){
                                    echo "<li class='nav-item'>";
                                        echo "<a class='nav-link' href='#'></a>";
                                    echo "</li>";
                                    echo "<li class='nav-item'>";
                                        echo "<a class='nav-link active' aria-current='page' href='" . DIRBASEURL ."/register/superheroe'>Crear Superheroe</a>";
                                    echo "</li>";
                                }
                            }

                        ?>
                    </ul>
                    <form class="d-flex" action="superheroes/search" method="post">
                        <input class="form-control me-2" name="busqueda" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" name="buscar" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>