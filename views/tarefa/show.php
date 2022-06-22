<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ver Dados das Tarefas

        </h1>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="router.php?c=tarefa&a=edit&id=<?=$tarefa->id ?>"
                           class="btn btn-warning" role="button">Editar</a>
                        <h3>Descrição</h3><td><?=$tarefa->description ?></td>
                        <h3>Done</h3><td><?=$tarefa->done ?></td>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
