<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Produto

        </h1>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="router.php?c=produto&a=edit&id=<?=$produto->id ?>"
                           class="btn btn-info" role="button">Edit</a>

                            <h3>ID</h3><td><?=$produto->id ?></td>
                            <h3>Referência</h3><td><?=$produto->referencia ?></td>
                            <h3>Descrição</h3><td><?=$produto->descricao ?></td>
                            <h3>Preço</h3><td><?=$produto->preco ?></td>
                            <h3>Stock</h3><td><?=$produto->stock ?></td>
                            <h3>Iva</h3><td><?=$produto->iva->id ?></td>


    </section>
</div>
</div>
</div>