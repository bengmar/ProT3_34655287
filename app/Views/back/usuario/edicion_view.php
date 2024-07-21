<?php $validation = \Config\Services::validation(); ?>
<?php if (session()->getFlashdata('msg')) : ?>
    <div class="alert alert-warning">
        <?= session()->getFlashdata('msg') ?>
    </div>
<?php endif; ?>
<form method="post" action="<?= base_url('editar/' . $user['id_usuario']) ?>" class="mx-auto col-md-8 form-micss row g-3">
    <?= csrf_field(); ?>
    <?= csrf_field(); ?>
    <?php if (!empty(session()->getFlashdata('fail'))) : ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('fail'); ?>
        </div>
    <?php endif ?>
    <?php if (!empty(session()->getFlashdata('success'))) : ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif ?>

    <h2 id="titulo" class="text-center">Editar Cuenta</h2>
    <div class="col-md-6">
        <label for="inputSurname" class="form-label">Apellido/s</label>
        <input name="apellido" type="text" class="form-control" id="inputSurname" />
        <?php if ($validation->getError('apellido')) { ?>
            <div class="alert alert-danger mt-2">
                <?= $error = $validation->getError('apellido'); ?>
            </div>
        <?php } ?>
    </div>
    <div class="col-md-6">
        <label for="inputName" class="form-label">Nombre/s</label>
        <input name="nombre" type="text" class="form-control" id="inputName" />
        <?php if ($validation->getError('nombre')) { ?>
            <div class="alert alert-danger mt-2">
                <?= $error = $validation->getError('nombre'); ?>
            </div>
        <?php } ?>
    </div>
    <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Correo Electrónico</label>
        <input name="email" type="email" class="form-control" id="inputEmail4" />
        <?php if ($validation->getError('email')) { ?>
            <div class="alert alert-danger mt-2">
                <?= $error = $validation->getError('email'); ?>
            </div>
        <?php } ?>
    </div>
    <div class="col-md-6">
        <label for="inputUser" class="form-label">Usuario</label>
        <input name="usuario" type="text" class="form-control" id="inputUser" />
        <?php if ($validation->getError('usuario')) { ?>
            <div class="alert alert-danger mt-2">
                <?= $error = $validation->getError('usuario'); ?>
            </div>
        <?php } ?>
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Contraseña</label>
        <input name="pass" type="password" class="form-control" id="inputPassword4" />
        <?php if ($validation->getError('pass')) { ?>
            <div class="alert alert-danger mt-2">
                <?= $error = $validation->getError('pass'); ?>
            </div>
        <?php } ?>
    </div>

    <div class="button">
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <button type="reset" class="btn btn-danger">Resetear Campos</button>
    </div>
</form>