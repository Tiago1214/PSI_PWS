<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Iva
            <small>Gestão Ivas</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                        <div class="col-sm-6">
                            <h3>Criar um Iva</h3>
                            <p>
                                <a href="router.php?c=iva&a=create" class="btn btn-info"
                                   role="button">Novo</a>
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
                        <h3>Percentagem</h3>
                    </th>
                    <th>
                        <h3>Descrição</h3>
                    </th>
                    <th>
                        <h3>Em vigor</h3>
                    </th>
                    <th>
                        <h3>User Actions</h3>
                    </th>
                </thead>
                <tbody>
                <?php foreach ($ivas as $iva) { ?>
                    <tr>
                        <td><?=$iva->id ?></td>
                        <td><?=$iva->percentagem ?></td>
                        <td><?=$iva->descricao ?></td>
                        <td><?php if($iva->emvigor == '1') echo 'Ativo'; else echo 'Desativo';?></td>

                        <td>
                            <a href="router.php?c=iva&a=show&id=<?=$iva->id ?>"
                               class="btn btn-info" role="button">Show</a>
                            <a href="router.php?c=iva&a=edit&id=<?=$iva->id ?>"
                               class="btn btn-info" role="button">Edit</a>
                            <a href="router.php?c=iva&a=delete&id=<?=$iva->id ?>"
                               class="btn btn-warning" role="button">Delete</a>

                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
    </section>
        </div>
    </div>
</div>
