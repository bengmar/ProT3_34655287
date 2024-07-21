<section class="container col-11 col-sm-8 col-lg-6 col-xl-5">
<?php if(session()->getFlashdata('msg')):?>
    <div class="alert alert-warning">
        <?= session()->getFlashdata('msg')?>
    </div>
    <?php endif; ?>
    <form method="post" action="<?php echo base_url('/enviar_login') ?>"class="form-micss row g-3">
        <h2 id="titulo" class="text-center">Inicio De Sesión</h2>
        <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Correo Electrónico</label>
            <input name="email" type="email" class="form-control" id="inputEmail4" />
        </div>
        <div class="col-md-12">
            <label for="inputPassword4" class="form-label">Contraseña</label>
            <input name="pass" type="password" class="form-control" id="inputPassword4" />
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" />
                <label class="form-check-label" for="gridCheck">
                    Mantener sesión iniciada (sin implementar)
                </label>
            </div>
        </div>
        <div class="button">
            <button type="submit" class="btn btn-primary">Ingresar</button>

            <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>
        <div class="col-12">
            <a class="text-decoration-none text-white" href="<?php echo base_url('registrarse'); ?>">¿Desea Registrarse?</a>
        </div>
    </form>
</section>