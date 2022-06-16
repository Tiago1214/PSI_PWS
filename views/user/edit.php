<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Editar Utilizador</h3>
                    </div>
                    <div class="box-body">
                        <form  action="router.php?c=user&a=update&id=<?= $user->id ?>" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Utilizador</label>
                                <input class="form-control" type="text" readonly name="username" value="<?= $user->username ?>"></br>
                            </div>
                            <?php
                            if($role=='administrador'&&$user->role!='administrador'){
                            ?><div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control" type="password" name="password" value="<?= $user->password ?>"></br>
                              </div>
                            <?php } ?>
                            <?php
                            if($role=='funcionario'&&$user->role!='administrador'&&$user->role!='funcionario'){
                                ?><div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control" type="password" name="password" value="<?= $user->password ?>"></br>
                                </div>
                            <?php } ?>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control"  type="email" required name="email" value="<?= $user->email ?>"></br>
                            </div>
                            <div class="mb-3">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input class="form-control"  type="tel" maxlength="9" required name="telefone" value="<?= $user->telefone ?>"></br>
                            </div>
                            <div class="mb-3">
                                <label for="nif" class="form-label">NIF</label>
                                <input class="form-control"  type="tel" maxlength="9" required name="nif" value="<?= $user->nif ?>"></br>
                            </div>
                            <div class="mb-3">
                                <label for="morada" class="form-label">Morada</label>
                                <input class="form-control"  type="text" name="morada" required value="<?= $user->morada ?>"></br>
                            </div>
                            <div class="mb-3">
                                <label for="codpostal" class="form-label">Código Postal</label>
                                <input class="form-control"  type="tel" maxlength="9" required name="codpostal" value="<?= $user->codpostal ?>"></br>
                            </div>
                            <div class="mb-3">
                                <label for="localidade" class="form-label">Localidade</label>
                                <input class="form-control"  type="text" name="localidade" value="<?= $user->localidade ?>"></br>
                            </div>
                            <?php
                            if($role=='administrador'){
                                ?>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role">
                                        <option>funcionario</option>
                                        <option>cliente</option>
                                    </select>
                                </div>
                            <?php } ?>
                            <button type="submit" class="btn btn-success">Enviar</button>
                            <a href="router.php?c=user&a=index"  class="btn btn-warning" role="button">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>


