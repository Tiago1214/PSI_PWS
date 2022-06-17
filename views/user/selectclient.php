<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Clientes
            <small>Gestão Clientes</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <br><div class="row">

                            <div class="col-sm-12">
                                <table class="table tablestriped">
                                    <thead>

                                    <th>
                                        <h3>Username</h3>
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
                                        <h3>User Actions</h3>
                                    </th>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($users as $user) {
                                        if($user->role == 'cliente'){ ?>
                                        <tr>
                                            <td><?=$user->username ?></td>
                                            <td><?=$user->email ?></td>
                                            <td><?=$user->telefone ?></td>
                                            <td><?= $user->nif ?></td>
                                            <td><?= $user->morada ?></td>
                                            <td><?= $user->codpostal ?></td>
                                            <td><?= $user->localidade ?></td>

                                            <td>
                                                <a href="router.php?c=fatura&a=store&id=<?=$user->id ?>"
                                                   class="btn btn-info" role="button">Selecionar</a>
                                            </td>
                                        </tr>

                                    <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

