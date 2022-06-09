<div class="content-wrapper">
    <form  action="router.php?c=user&a=update&id=<?= $user->id ?>" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Utilizador</label>
            <input type="text" readonly name="username" value="<?= $user->username ?>"></br>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" name="password" value="<?= $user->password ?>"></br>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" value="<?= $user->email ?>"></br>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" value="<?= $user->telefone ?>"></br>
        </div>
        <div class="mb-3">
            <label for="nif" class="form-label">NIF</label>
            <input type="text" name="nif" value="<?= $user->nif ?>"></br>
        </div>
        <div class="mb-3">
            <label for="morada" class="form-label">Morada</label>
            <input type="text" name="morada" value="<?= $user->morada ?>"></br>
        </div>
        <div class="mb-3">
            <label for="codpostal" class="form-label">Código Postal</label>
            <input type="text" name="codpostal" value="<?= $user->codpostal ?>"></br>
        </div>
        <div class="mb-3">
            <label for="localidade" class="form-label">Localidade</label>
            <input type="text" name="localidade" value="<?= $user->localidade ?>"></br>
        </div>
        <?php
        if($role=='administrador'){
            ?>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input type="text" name="role" value="<?= $user->role ?>"></br>
            </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="router.php?c=user&a=index"  class="btn btn-info" role="button">Cancelar</a>
    </form>
</div>


