<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Editar Quantidade</h3>
                    </div>
                    <div class="box-body">
                        <form  action="router.php?c=linhafatura&a=guardarquantidade&idlf=<?= $linhafatura->id ?>" method="post">
                            <div class="mb-3">
                                <label for="quantidade" class="form-label">Quantidade</label>
                                <input class="form-control" type="number" min=1 max="<?= $linhafatura->produto->stock ?>" name="quantidade"
                                       required value="<?= $linhafatura->quantidade ; ?>"></br>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <a href="router.php?c=fatura&a=edit&idf=<?= $linhafatura->fatura_id ?>"   class="btn btn-info" role="button">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



