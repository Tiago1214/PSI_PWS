<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Utilizador

        </h1>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <?php if($user->role=='administrador'){?>
                        <?php
                        } else{?>
                            <a href="router.php?c=user&a=edit&id=<?=$user->id ?>"
                           class="btn btn-warning" role="button">Editar</a>
                        <?php }?>
                        <h3>Utilizador</h3><td><?=$user->username ?></td>
                        <h3>Password</h3><td><?=$user->password ?></td>
                        <h3>Email</h3><td><?=$user->email ?></td>
                        <h3>Telefone</h3><td><?=$user->telefone ?></td>
                        <h3>Nif</h3><td><?=$user->nif ?></td>
                        <h3>Morada</h3><td><?=$user->morada ?></td>
                        <h3>Código Postal</h3><td><?=$user->codpostal ?></td>
                        <h3>Localidade</h3><td><?=$user->localidade ?></td>
                        <h3>Role</h3><td><?= $user->role ?></td>
                        <h3>Estado</h3><td><?php if($user->estado==1){
                            echo 'Ativo';
                            }else{
                            echo 'Desativo';
                            } ?></td>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>