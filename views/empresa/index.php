<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Dados Empresa</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Designação Social</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Nif</th>
                                <th>Morada</th>
                                <th>Código Postal</th>
                                <th>Localidade</th>
                                <th>Capital Social</th>
                                <th>User Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($empresas as $empresa) { ?>
                                <tr>
                                    <td><?=$empresa->designacaosocial ?></td>
                                    <td><?=$empresa->email ?></td>
                                    <td><?= $empresa->telefone ?></td>
                                    <td><?= $empresa->nif ?></td>
                                    <td><?= $empresa->morada ?></td>
                                    <td><?= $empresa->codpostal ?></td>
                                    <td><?= $empresa->localidade ?></td>
                                    <td><?= $empresa->capitalsocial ?>€</td>
                                    <td>
                                        <a href="router.php?c=empresa&a=show&id=<?=$empresa->id ?>"
                                           class="btn btn-info" role="button">Detalhes</a>
                                        <a href="router.php?c=empresa&a=edit&id=<?=$empresa->id ?>"
                                           class="btn btn-warning" role="button">Editar</a>

                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>
