<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Dados Tarefas</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="col-sm-6">
                        <h3>Criar uma Tarefa</h3>
                        <p>
                            <a href="router.php?c=tarefa&a=create" class="btn btn-success"
                               role="button">Novo</a>
                        </p>
                    </div>

                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Descrição</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $auth = new Auth();
                            $id = $auth->getUserId();
                            ?>
                            <?php foreach ($tarefas as $tarefa) { ?>
                                    <?php if($tarefa->user_id ==$id ) {?>
                                <tr>
                                    <?php if($tarefa->done == 'realizada')
                                        { ?>
                                             <td style="color: grey;"><strike><?=$tarefa->description ?></strike></td>
                                  <?php  } else  { ?>
                                            <td> <?=$tarefa->description ?></td>
                                 <?php   } ?>
                                    <td>
                                        <a href="router.php?c=tarefa&a=show&id=<?=$tarefa->id ?>"
                                           class="btn btn-info" role="button">Detalhes</a>
                                        <a href="router.php?c=tarefa&a=edit&id=<?=$tarefa->id ?>"
                                           class="btn btn-warning" role="button">Editar</a>
                                        <?php if($tarefa->done=='nao realizada'){?>
                                        <a href="router.php?c=tarefa&a=done&id=<?=$tarefa->id ?>"
                                           class="btn btn-danger" role="button">Concluir</a>
                                        <?php } ?>

                                    </td>
                                </tr>
                            <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <section class="content-header">
        <h1>
            Criar Tarefa

        </h1>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <form action="router.php?c=tarefa&a=store" method="post">
                            <div class="mb-3">

                                <label for="description" class="form-label">Descrição</label>
                                <input type="text"  class="form-control" required name="description" value="" >
                            </div>
                            <input type="hidden" class="form-control" required name="done" value="nao realizada">

                            <button type="submit" class="btn btn-success">Enviar</button>
                            <a href="router.php?c=tarefa&a=index"  class="btn btn-danger" role="button">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
