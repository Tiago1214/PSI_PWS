<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ver Taxa de Iva

        </h1>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="router.php?c=iva&a=edit&id=<?=$iva->id ?>"
                           class="btn btn-warning" role="button">Editar</a>
                            <h3>Percentagem</h3><td><?=$iva->percentagem ?>%</td>
                            <h3>Descrição</h3><td><?=$iva->descricao ?></td>
                            <h3>Em vigor</h3><td><?php if($iva->emvigor == '1') echo 'Ativo'; else echo 'Desativo';?></td>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>