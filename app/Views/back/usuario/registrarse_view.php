<section class="container">
    <?php $validation = \Config\Services::validation(); ?>
    <form method="post" action="<?php echo base_url('/enviar_form'); ?>" class="mx-auto col-md-8 form-micss row g-3">
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

        <h2 id="titulo" class="text-center">Registro</h2>
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
        <div class="col-md-6">
            <label for="inputState" class="form-label">Provincia</label>
            <select name="provincia" id="inputState" class="form-select">
                <?php if ($validation->getError('provincia')) { ?>
                    <div class="alert alert-danger mt-2">
                        <?= $error = $validation->getError('provincia'); ?>
                    </div>
                <?php } ?>
                <option selected>Elegir...</option>
                <option value="Buenos Aires">Buenos Aires</option>
                <option value="Catamarca">Catamarca</option>
                <option value="Chaco">Chaco</option>
                <option value="Chubut">Chubut</option>
                <option value="Ciudad Autónoma Buenos Aires">
                    Ciudad Autónoma Buenos Aires
                </option>
                <option value="Córdoba">Córdoba</option>
                <option value="Corrientes">Corrientes</option>
                <option value="Entre Ríos">Entre Ríos</option>
                <option value="Formosa">Formosa</option>
                <option value="Jujuy">Jujuy</option>
                <option value="La Pampa">La Pampa</option>
                <option value="La Rioja">La Rioja</option>
                <option value="Mendoza">Mendoza</option>
                <option value="Misiones">Misiones</option>
                <option value="Neuquén">Neuquén</option>
                <option value="Río Negro">Río Negro</option>
                <option value="Salta">Salta</option>
                <option value="San Juan">San Juan</option>
                <option value="San Luis">San Luis</option>
                <option value="Santa Cruz">Santa Cruz</option>
                <option value="Santa Fe">Santa Fe</option>
                <option value="Santiago Del Estero">Santiago Del Estero</option>
                <option value="Tierra Del Fuego">Tierra Del Fuego</option>
                <option value="Tucumán">Tucumán</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputZip" class="form-label">Código Postal</label>
            <input name="codigo_postal" type="text" class="form-control" id="inputZip" />
            <?php if ($validation->getError('codigo_postal')) { ?>
                <div class="alert alert-danger mt-2">
                    <?= $error = $validation->getError('codigo_postal'); ?>
                </div>
            <?php } ?>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" required />
                <label class="form-check-label" for="gridCheck">
                    Acepto el almacenamiento en BD.
                </label>
            </div>
        </div>

        <div class="button">
            <button type="submit" class="btn btn-primary">Registrarse</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>
    </form>
</section>