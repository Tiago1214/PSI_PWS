<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Produtos
            <small>Gestão Produtos</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                        <div class="col-sm-6">
                            <h3>Criar um Produto</h3>
                            <p>
                                <a href="router.php?c=produto&a=create" class="btn btn-success"
                                   role="button">Novo</a>
                            </p>
                        </div>




        <br><div class="row">

                <div class="col-sm-12">
                    <table class="table tablestriped">
                        <thead>
                            <th>
                                <h3>Referência</h3>
                            </th>
                            <th>
                                <h3>Descrição</h3>
                            </th>
                            <th>
                                <h3>Preço</h3>
                            </th>
                            <th>
                                <h3>Stock</h3>
                            </th>
                            <th>
                                <h3>IVA</h3>
                            </th>
                            <th>
                                <h3>User Actions</h3>
                            </th>
                        </thead>
                        <tbody>
                        <?php foreach ($produtos as $produto) { ?>
                            <tr>
                                <td><?=$produto->referencia ?></td>
                                <td><?=$produto->descricao ?></td>
                                <td><?= $produto->preco ?>€</td>
                                <td><?= $produto->stock ?></td>
                                <td><?= $produto->iva->percentagem ?></td>
                                <td>
                                    <a href="router.php?c=produto&a=show&id=<?=$produto->id ?>"
                                       class="btn btn-info" role="button">Detalhes</a>
                                    <a href="router.php?c=produto&a=edit&id=<?=$produto->id ?>"
                                       class="btn btn-warning" role="button">Editar</a>
                                    <?php if($produto->estado==1){?>
                                        <a href="router.php?c=produto&a=posicao&id=<?=$produto->id ?>"
                                           class="btn btn-danger" role="button">Desativar</a>
                                        <?php
                                    }else if($produto->estado==0){?>
                                        <a href="router.php?c=produto&a=posicao&id=<?=$produto->id ?>"
                                           class="btn btn-success" role="button">Ativar</a>
                                        <?php
                                    }?>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

