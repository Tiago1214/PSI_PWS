<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Utilizadores
            <small>Gestão Utilizadores</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                        <div class="col-sm-6">
                            <h3>Criar um Utilizador</h3>
                            <p>
                                <a href="router.php?c=user&a=create" class="btn btn-success"
                                   role="button">Novo</a>
                            </p>
                        </div>
                    </div>
                    <br><div class="row">
                        <div class="col-sm-12">
                            <table class="table tablestriped">
                                <thead>
                                <th>
                                    <h3>Utilizador</h3>
                                </th>
                                <th>
                                    <h3>Email</h3>
                                </th>
                                <th>
                                    <h3>Telefone</h3>
                                </th>
                                <th>
                                    <h3>NIF</h3>
                                </th>
                                <th>
                                    <h3>Morada</h3>
                                </th>
                                <th>
                                    <h3>Código Postal</h3>
                                </th>
                                <th>
                                    <h3>Localidade</h3>
                                </th>
                                <th>
                                    <h3>Role</h3>
                                </th>
                                <th>
                                    <h3>Estado</h3>
                                </th>
                                <th>
                                    <h3>User Actions</h3>
                                </th>
                                </thead>
                                <tbody>
                                <?php foreach ($users as $user) { ?>
                                    <tr>
                                        <?php if($role=='administrador'){?>
                                            <td><?=$user->username ?></td>
                                            <td><?= $user->email ?></td>
                                            <td><?= $user->telefone ?></td>
                                            <td><?= $user->nif ?></td>
                                            <td><?= $user->morada ?></td>
                                            <td><?= $user->codpostal ?></td>
                                            <td><?= $user->localidade ?></td>
                                            <td><?= $user->role ?></td>
                                            <td><?php if($user->estado==1){
                                                    echo 'Ativo';
                                                }else{
                                                    echo 'Desativo';
                                                } ?>
                                            </td>
                                            <td>
                                                <a href="router.php?c=user&a=show&id=<?=$user->id ?>"
                                                   class="btn btn-info" role="button">Show</a>
                                                <?php if($user->role=='administrador'){
                                                    ?>

                                                <?php
                                                }else{?>
                                                    <a href="router.php?c=user&a=edit&id=<?=$user->id ?>"
                                                   class="btn btn-warning" role="button">Edit</a>
                                                <?php
                                                }?>

                                                <?php if($user->estado==1){?>
                                                    <a href="router.php?c=user&a=posicao&id=<?=$user->id ?>"
                                                   class="btn btn-danger" role="button">Desativar</a>
                                                <?php
                                                }else if($user->estado==0){?>
                                                    <a href="router.php?c=user&a=posicao&id=<?=$user->id ?>"
                                                   class="btn btn-success" role="button">Ativar</a>
                                                <?php
                                                }?>
                                            </td>
                                        <?php }else if($role=='funcionario'&&$user->role=='cliente'){ ?>
                                            <td><?=$user->username ?></td>
                                            <td><?=$user->password ?></td>
                                            <td><?= $user->email ?></td>
                                            <td><?= $user->telefone ?></td>
                                            <td><?= $user->nif ?></td>
                                            <td><?= $user->morada ?></td>
                                            <td><?= $user->codpostal ?></td>
                                            <td><?= $user->localidade ?></td>
                                            <td><?= $user->role ?></td>
                                            <td><?php if($user->estado==1){
                                                    echo 'Ativo';
                                                }else{
                                                    echo 'Desativo';
                                                } ?></td></td>
                                            <td>
                                                <a href="router.php?c=user&a=show&id=<?=$user->id ?>"
                                                   class="btn btn-info" role="button">Show</a>
                                                <a href="router.php?c=user&a=edit&id=<?=$user->id ?>"
                                                   class="btn btn-warning" role="button">Edit</a>
                                            </td>
                                        <?php }?>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
