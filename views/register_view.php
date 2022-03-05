<!doctype html>
    <html lang="es">
        <head> 
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <meta name="author" content="Rubén Ramírez Rivera">
            <title>Registro</title>
        </head>
        <body>
            <header>
                <?php include('nav_view.php')?>
            </header>
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card rounded-3 bg-dark text-white" style="border-radius: 1rem;">
    
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registro</h3>

                        <form class="px-md-2" method="post" action="">

                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example1q">Nick</label>
                                <input type="text" name="usuario" id="usuario"  class="form-control" />
                                <span class="form-text text-muted"><?php echo $data['msgErrorUsuario']?></span>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example1q">Contraseña</label>
                                <input type="text" name="password" id="password" class="form-control"/>
                                <span class="form-text text-muted"><?php echo $data['msgErrorPassword']?></span>
                            </div>
                            <div class="dropdown-divider bg-light">

                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example1q">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" />
                                <span class="form-text text-muted"><?php echo $data['msgErrorNombre']?></span>
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example1q">Email</label>
                                <input type="email" name="email" id="email" class="form-control" />
                                <span class="form-text text-muted"><?php echo $data['msgErrorEmail']?></span>
                            </div>

                            <button type="submit" class="btn btn-success btn-lg mb-1">Registrarme</button>

                        </form>

                    </div>
                    </div>
                </div>
                </div>
            </div>
        </body>
    </html>