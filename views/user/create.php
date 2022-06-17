<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Criar Utilizador
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <form action="router.php?c=user&a=store" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Nome Utilizador</label>
                                <input type="text" class="form-control" minlength="3" maxlength="25"  required name="username" value="<?php  if(isset($user)) { echo
                                $user->username; }?>" > </br> <?php if(isset($user->username)){ echo '<div class="alert alert-danger">'.$user->errors->on('username') .'</div>';}  ?>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" minlength="8" maxlength="16" class="form-control" required name="password" value="<?php if(isset($user)) { echo
                                $user->password; }?>">
                                </br>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" required name="email" value="<?php if(isset($user)) { echo
                                $produto->email; }?>">
                                </br>
                            </div>
                            <div class="mb-3">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="tel" maxlength="9" class="form-control" required name="telefone" value="<?php if(isset($user)) { echo
                                $produto->telefone; }?>">
                                </br>
                            </div>
                            <div class="mb-3">
                                <label for="nif" class="form-label">NIF</label>
                                <input type="number" max=899999999 min=200000000 class="form-control" required name="nif" value="<?php if(isset($user)) { echo
                                $produto->nif; }?>">
                                </br>
                            </div>
                            <div class="mb-3">
                                <label for="morada" class="form-label">Morada</label>
                                <input type="text"  class="form-control" required name="morada" value="<?php if(isset($user)) { echo
                                $produto->morada; }?>">
                                </br>
                            </div>
                            <div class="mb-3">
                                <label for="codpostal" class="form-label">Código Postal</label>
                                <input type="tel" maxlength="8" class="form-control" required name="codpostal" id="codpostal" minlength="8" maxlength="8" placeholder="____-___" value="<?php if(isset($user)) { echo
                                $produto->codpostal; }?>">
                                </br>
                            </div>
                            <div class="mb-3">
                                <label for="localidade" class="form-label">Localidade</label>
                                <input type="text" class="form-control" required name="localidade" value="<?php if(isset($user)) { echo
                                $produto->localidade; }?>">
                                </br>
                            </div>
                            <?php if($role=='administrador'){?>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role">
                                        <option>administrador</option>
                                        <option>funcionario</option>
                                        <option>cliente</option>
                                    </select>
                                    </br>
                                </div>
                            <?php } else if($role=='funcionario'){?>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role">
                                        <option>cliente</option>
                                    </select>
                                    </br>
                                </div>
                               <?php
                            }?>
                            <button type="submit" class="btn btn-success">Enviar</button>
                            <a href="router.php?c=produto&a=index"  class="btn btn-warning" role="button">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


