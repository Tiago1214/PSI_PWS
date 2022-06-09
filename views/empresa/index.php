<div class="content-wrapper">
<<<<<<< HEAD
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
                                <th>Id</th>
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
                                    <td><?=$empresa->id ?></td>
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
                                           class="btn btn-info" role="button">Show</a>
                                        <a href="router.php?c=empresa&a=edit&id=<?=$empresa->id ?>"
                                           class="btn btn-info" role="button">Edit</a>

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
=======




    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Empresa
            <small>Gestão Empresa</small>
        </h1>

    </section>
    <br><div class="row">

        <div class="col-sm-12">
            <table class="table tablestriped">
                <thead>
                    <th>
                        <h3>Id</h3>
                    </th>
                    <th>
                        <h3>Designação Social</h3>
                    </th>
                    <th>
                        <h3>Email</h3>
                    </th>
                    <th>
                        <h3>Telefone</h3>
                    </th>
                    <th>
                        <h3>Nif</h3>
                    </th>
                    <th>
                        <h3>Morada</h3>
                    </th>
                    <th>
                        <h3>Código Postal</h3>
                    </th>
                    <th>
                        <h3>Localidade</h3>
                    </th>
                    <th>
                        <h3>Capital Social</h3>
                    </th>
                    <th>
                        <h3>User Actions</h3>
                    </th>
                </thead>
                <tbody>
                <?php foreach ($empresas as $empresa) { ?>
                    <tr>
                        <td><?=$empresa->id ?></td>
                        <td><?=$empresa->designacaosocial ?></td>
                        <td><?=$empresa->email ?></td>
                        <td><?= $empresa->telefone ?></td>
                        <td><?= $empresa->nif ?></td>
                        <td><?= $empresa->morada ?></td>
                        <td><?= $empresa->codpostal ?></td>
                        <td><?= $empresa->localidade ?></td>
                        <td><?= $empresa->capitalsocial ?></td>
                        <td>
                            <a href="router.php?c=empresa&a=show&id=<?=$empresa->id ?>"
                               class="btn btn-info" role="button">Show</a>
                            <a href="router.php?c=empresa&a=edit&id=<?=$empresa->id ?>"
                               class="btn btn-info" role="button">Edit</a>

                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

>>>>>>> 5c0a66c80cba28f1982a22424214c97f26836c6a
        </div>
    </section>
</div>
