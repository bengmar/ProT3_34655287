<section class="container-fluid mt-2">
    <div class="row justify-content-md-center">
        <div class="col-md-10 col-xl-7">
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif; ?>
            <br><br>
            <h2 id="titulo" class="text-center">CUENTA DE USUARIO</h2>
            <div class="table-responsive">
            <table class="table" style="border: 2px solid #79611f">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">Usuario</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Apellido</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">Editar</th>
                        <th class="text-center">Eliminar Cuenta</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center"><?= $user['usuario'] ?></td>
                        <td class="text-center"><?= $user['nombre'] ?></td>
                        <td class="text-center"><?= $user['apellido'] ?></td>
                        <td class="text-center"><?= $user['email'] ?></td>
                        <td class="text-center">
                            <a class="btn btn-warning" href="<?= base_url('editarCuenta')?>">Editar</a>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-outline-danger" href="<?= base_url('eliminar/' . $user['id_usuario']) ?>" onclick="return confirm('¿Está seguro de que desea eliminar este usuario?');">Eliminar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</section>