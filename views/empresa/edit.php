<div class="content-wrapper">
    <form  action="router.php?c=empresa&a=update&id=<?= $empresa->id ?>" method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Designação Social</label>
            <input type="text" required name="designacaosocial" value="<?= $empresa->designacaosocial ?>"></br> <?php /* if(isset($book->errors)){ echo $book->errors->on('nome') ;} */ ?>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">Email</label>
            <input type="email" required name="isbn" value="<?= $empresa->email ?>"></br>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">Telefone</label>
            <input type="tel" maxlength="9" required name="isbn" value="<?= $empresa->telefone ?>"></br>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">NIF</label>
            <input type="tel" maxlength="9" name="isbn" value="<?= $empresa->nif ?>"></br>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">Morada</label>
            <input type="text" required name="isbn" value="<?= $empresa->morada ?>"></br>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">Código Postal</label>
            <input type="tel" maxlength="8" name="isbn" value="<?= $empresa->codpostal ?>"></br>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">Localidade</label>
            <input type="text" name="isbn" value="<?= $empresa->localidade ?>"></br>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">Capital Social</label>
            <input type="number" name="isbn" value="<?= $empresa->capitalsocial ?>"></br>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="router.php?c=empresa&a=index"  class="btn btn-info" role="button">Cancelar</a>
    </form>
</div>
<h3>Editar Empresa</h3>
</br>
</div>


