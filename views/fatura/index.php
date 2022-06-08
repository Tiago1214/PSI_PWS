<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Faturas
            <small>Gestão Faturas</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                        <div class="col-sm-6">
                            <h3>Emitir uma fatura</h3>
                            <p>
                                <a href="router.php?c=produto&a=create" class="btn btn-info"
                                   role="button">Nova</a>
                            </p>
                        </div>




                        <br><div class="row">

                            <div class="col-sm-12">
                                <table class="table tablestriped">
                                    <thead>
                                    <th>
                                        <h3>Id</h3>
                                    </th>
                                    <th>
                                        <h3>Data</h3>
                                    </th>
                                    <th>
                                        <h3>Valor Total</h3>
                                    </th>
                                    <th>
                                        <h3>Iva Total</h3>
                                    </th>
                                    <th>
                                        <h3>Estado</h3>
                                    </th>
                                    <th>
                                        <h3>Nome Cliente</h3>
                                    </th>
                                    <th>
                                        <h3>Nome Funcionário</h3>
                                    </th>
                                    <th>
                                        <h3>User Actions</h3>
                                    </th>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($faturas as $fatura) { ?>
                                        <tr>
                                            <td><?=$fatura->id ?></td>
                                            <td><?=$fatura->data ?></td>
                                            <td><?=$fatura->valortotal ?></td>
                                            <td><?= $fatura->ivatotal ?></td>
                                            <td><?= $fatura->estado ?></td>
                                            <td><?= $fatura->cliente->username ?></td>
                                            <td><?= $fatura->user->username ?></td>

                                            <td>
                                                <a href="router.php?c=fatura&a=show&id=<?=$fatura->id ?>"
                                                   class="btn btn-info" role="button">Show</a>

                                                <?php if($fatura->estado =='em lancamento')
                                                { ?>
                                                    <a href="router.php?c=fatura&a=edit&id=<?=$fatura->id ?>"
                                                       class="btn btn-info" role="button">Edit</a>
                                                <a href="router.php?c=fatura&a=delete&id=<?=$fatura->id ?>"
                                                   class="btn btn-warning" role="button">Delete</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
    </section>
</div>
</div>
</div>

