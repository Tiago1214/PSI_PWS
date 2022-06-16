
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Editar Utilizador</h3>
                    </div>
                    <div class="box-body">
                        <form  action="router.php?c=user&a=changedadosupdate&id=<?= $user->id ?>" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control" type="email" required name="email" value="<?= $user->email ?>"></br>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Criar Nova Password</label>
                                <input class="form-control" type="password" name="password" required"></br>
                            </div>
                            <button type="submit" class="btn btn-success">Enviar</button>
                            <a href="router.php?c=backoffice&a=index"  class="btn btn-warning" role="button">Cancelar</a>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
    </section>
</div>



