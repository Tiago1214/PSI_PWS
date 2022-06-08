<div class="content-wrapper">
    <form  action="router.php?c=user&a=update&id=<?= $user->id ?>" method="post">
        <div class="mb-3">
            <label for="referencia" class="form-label">Utilizador</label>
            <input type="text" readonly name="referencia" value="<?= $user->username ?>"></br> <?php /* if(isset($book->errors)){ echo $book->errors->on('nome') ;} */ ?>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Password</label>
            <input type="text" name="descricao" value="<?= $user->password ?>"></br>
        </div>
        <div class="mb-3">
            <label for="preco" class="form-label">Email</label>
            <input type="text" name="preco" value="<?= $user->email ?>"></br>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Telefone</label>
            <input type="text" name="stock" value="<?= $user->telefone ?>"></br>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">NIF</label>
            <input type="text" name="stock" value="<?= $user->nif ?>"></br>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Morada</label>
            <input type="text" name="stock" value="<?= $user->morada ?>"></br>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Código Postal</label>
            <input type="text" name="stock" value="<?= $user->codpostal ?>"></br>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Localidade</label>
            <input type="text" name="stock" value="<?= $user->localidade ?>"></br>
        </div>
        <?php
        if($role=='administrador'){
            ?>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input type="text" name="stock" value="<?= $user->role ?>"></br>
            </div>
        <?php }
        else if($role=='funcionario'){
            ?>

        <?php }
        ?>
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="router.php?c=empresa&a=index"  class="btn btn-info" role="button">Cancelar</a>
    </form>
</div>


