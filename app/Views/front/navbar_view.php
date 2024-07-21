<?php
$session = session();
$nombre = $session->get('nombre');
$perfil = $session->get('perfil_id');
?>



<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo base_url('principal') ?>"><img class="logo" src="<?php echo base_url('assets/img/logos/bengmar.png') ?>" alt="logo navegacion"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo base_url('principal') ?>">Principal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('quienes_somos') ?>">Quiénes Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('acerca_de') ?>">Acerca De</a>
                </li>
                <?php if (session()->perfil_id == 1) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ADMIN: <?php echo session('nombre'); ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo base_url('ingresar') ?>">Iniciar como usuario</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('registrarse') ?>">Registrar como nuevo usuario</a></li>
                            <a class="dropdown-item" href="<?php echo base_url('/logout') ?>">Cerrar Sesión Admin</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="<?php echo base_url('/panel') ?>">Ver Usuarios Registrados</a></li>
            </ul>
            </li>
            </ul>
        <?php elseif (session()->perfil_id == 2) : ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Cuenta Usuario
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php echo base_url('/panel') ?>">Panel De Usuario</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url('/logout') ?>">Cerrar Sesión</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item disabled" href="#">Próximamente</a></li>
                </ul>
            </li>
            </ul>
        <?php else : ?>
            <!--USUARIOS NO LOGUEADOS-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Usuarios
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php echo base_url('ingresar') ?>">Cuenta</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url('registrarse') ?>">Registrarse</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item disabled" href="#">Próximamente</a></li>
                </ul>
            </li>
            </ul>
        <?php endif; ?>
        <!--Barra de búsqueda sin tocar-->
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Próximamente" aria-label="Search">
            <button class="btn btn-details" type="submit">Buscar</button>
        </form>
        </div>
    </div>
</nav>