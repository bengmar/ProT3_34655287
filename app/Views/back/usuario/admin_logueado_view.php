<section class="container mt-2">
    <div class="row justify-content-md-center">
        <div class="col-xl-6">
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif; ?>
            <br><br>
            <h2 id="titulo" class="text-center">Lista de usuarios registrados</h2>
            <table class="table" style="border: 2px solid #79611f">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">Usuario</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">¿De Baja en BD?</th>
                        <th class="text-center">Eliminar Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <tr>
                            <td class="text-center"><?= esc($usuario['usuario']) ?></td>
                            <td class="text-center"><?= esc($usuario['email']) ?></td>
                            <td class="text-center"><?= esc($usuario['baja']) ?></td>
                            <?php if($usuario['perfil_id'] == 2): ?>
                            <td class="text-center">
                                <a class="btn btn-outline-danger" href="<?= site_url('eliminar/' . $usuario['id_usuario']) ?>" onclick="return confirm('¿Está seguro de que desea eliminar este usuario?');">Eliminar</a>
                            </td>
                            <?php else: ?>
                                <td class="text-center">
                                <button class="btn btn-warning">ADMIN</button> 
                            </td>
                            <?php endif;?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

</section>