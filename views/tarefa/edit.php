<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Editar Tarefa</h3>
                    </div>
                    <div class="box-body">
                        <form  action="router.php?c=tarefa&a=update&id=<?= $tarefa->id ?>" method="post">

                            <div class="mb-3">
                                <label for="description" class="form-label">Descrição</label>
                                <input class="form-control" type="text" required name="description" value="<?= $tarefa->description ?>"></br>
                            </div>
                            <div class="mb-3">
                                <label for="done" class="form-label">Descrição</label>
                                <input class="form-control" type="text" required name="done" value="<?= $tarefa->done ?>"></br>
                            </div>



                            <button type="submit" class="btn btn-success">Enviar</button>
                            <a href="router.php?c=empresa&a=index"  class="btn btn-warning" role="button">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


