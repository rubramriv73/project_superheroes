<!doctype html>
    <html lang="es">
        <head> 
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <meta name="author" content="Rubén Ramírez Rivera">
            <title>Inicio de sesion</title>
        </head>
        <body>
            <header>
                <?php include('nav_view.php')?>
            </header>
            <main>
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="card bg-dark text-white" style="border-radius: 1rem;">
                                <div class="card-body p-5 text-center">
                                    <div class="mb-md-5 mt-md-4 pb-5">
                                        <form action="" method="post">
                                            <h2 class="fw-bold mb-2 text-uppercase">Inicio de sesion</h2>
                                            <p class="text-white-50 mb-5">Introduzca su usuario y contraseña</p>
        
                                            <div class="form-outline form-white mb-4">
                                                <label class="form-label" for="typeEmailX">Usuario</label>
                                                <input type="text" name="nombre" id="nombre" class="form-control form-control-lg" />
                                                <span class="form-text text-muted"><?php echo $data['msgErrorNombre']?></span>
                                            </div>
        
                                            <div class="form-outline form-white mb-4">
                                                <label class="form-label" for="typePasswordX">Contraseña</label>
                                                <input type="password" name="password" id="password" class="form-control form-control-lg" />
                                                <span class="form-text text-muted"><?php echo $data['msgErrorPassword']?></span>
                                            </div>
        
                                            <!-- <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p> -->
        
                                            <button class="btn btn-outline-light btn-lg px-5" type="submit">Iniciar Sesion</button>
                                        </form>
    
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </body>
    </html>
    

