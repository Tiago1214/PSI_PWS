<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Editar Iva</h3>
                    </div>
                    <div class="box-body">
                        <form  action="router.php?c=empresa&a=update&id=<?= $empresa->id ?>" method="post">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Designação Social</label>
                                <input class="form-control" type="text" required name="designacaosocial" value="<?= $empresa->designacaosocial ?>"></br> <?php /* if(isset($book->errors)){ echo $book->errors->on('nome') ;} */ ?>
                            </div>
                            <div class="mb-3">
                                <label for="isbn" class="form-label">Email</label>
                                <input class="form-control" type="email" required name="isbn" value="<?= $empresa->email ?>"></br>
                            </div>
                            <div class="mb-3">
                                <label for="isbn" class="form-label">Telefone</label>
                                <input class="form-control" type="tel" maxlength="9" required name="isbn" value="<?= $empresa->telefone ?>"></br>
                            </div>
                            <div class="mb-3">
                                <label for="isbn" class="form-label">NIF</label>
                                <input class="form-control" type="tel" maxlength="9" name="isbn" value="<?= $empresa->nif ?>"></br>
                            </div>
                            <div class="mb-3">
                                <label for="isbn" class="form-label">Morada</label>
                                <input class="form-control" type="text" required name="isbn" value="<?= $empresa->morada ?>"></br>
                            </div>
                            <div class="mb-3">
                                <label for="isbn" class="form-label">Código Postal</label>
                                <input class="form-control" type="tel" maxlength="8" name="isbn" value="<?= $empresa->codpostal ?>"></br>
                            </div>
                            <div class="mb-3">
                                <label for="isbn" class="form-label">Localidade</label>
                                <input class="form-control" type="text" name="isbn" value="<?= $empresa->localidade ?>"></br>
                            </div>
                            <div class="mb-3">
                                <label for="capitalsocial" class="form-label">Capital Social</label>
                                <input class="form-control" type="number" name="capitalsocial" value="<?= $empresa->capitalsocial ?>"></br>
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


