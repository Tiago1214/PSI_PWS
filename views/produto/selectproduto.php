<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Produtos
            <small>Selecionar Produtos</small>
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
                                        <h3>Referencia</h3>
                                    </th>
                                    <th>
                                        <h3>Descricao</h3>
                                    </th>
                                    <th>
                                        <h3>Preço</h3>
                                    </th>
                                    <th>
                                        <h3>Stock</h3>
                                    </th>
                                    <th>
                                        <h3>User Actions</h3>
                                    </th>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($produtos as $produto) {
                                        if($produto->estado == '1'){ ?>
                                            <tr>
                                                <td><?=$produto->referencia ?></td>
                                                <td><?=$produto->descricao ?></td>
                                                <td><?=$produto->preco ?></td>
                                                <td><?= $produto->stock ?></td>

                                                <td>
                                                    <a href="router.php?c=linhafatura&a=create&idp=<?=$produto->id ?>&idf=<?=$fatura->id ?>"
                                                       class="btn btn-info" role="button">Select</a>
                                                </td>
                                            </tr>

                                        <?php } } ?>
                                    </tbody>
                                </table>
    </section>
</div>
</div>
</div>

