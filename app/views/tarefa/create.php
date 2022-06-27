<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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