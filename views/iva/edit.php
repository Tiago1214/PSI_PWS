<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Editar Iva</h3>
                    </div>
                    <div class="box-body">
                        <form  action="router.php?c=iva&a=update&id=<?= $iva->id ?>" method="post">
                            <div class="mb-3">
                                <label for="percentagem" class="form-label">Percentagem</label>
                                <input class="form-control" type="number" max=99 min=1 maxlength="2" name="percentagem" required value="<?= $iva->percentagem ?>"></br>
                            </div>
                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição</label>
                                <input class="form-control" type="text" name="descricao" required value="<?= $iva->descricao ?>"></br>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success">Enviar</button>
                            <a href="router.php?c=iva&a=index"   class="btn btn-warning" role="button">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



