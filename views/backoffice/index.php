

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Painel de Controlo
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
            <li class="active">Painel de Controlo</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <?php if($role=='administrador'||$role=='funcionario'){
            ?>
            <div class="row">
                <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-blue-gradient">
                        <div class="inner">
                            <h3>Faturas</h3>

                            <p>Criar Fatura</p>
                        </div>
                        <div class="icon">
                            <i class="ion-android-add"></i>
                        </div>
                        <a href="router.php?c=fatura&a=create" class="small-box-footer">Criar Fatura<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-blue-gradient">
                        <div class="inner">
                            <h3>Faturas</h3>

                            <p>Ver Faturas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-paper"></i>
                        </div>
                        <a href="router.php?c=fatura&a=index" class="small-box-footer">Ver Faturas <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-blue-gradient">
                        <div class="inner">
                            <h3>Produtos</h3>

                            <p>Ver Produtos</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-contract"></i>
                        </div>
                        <a href="router.php?c=produto&a=index" class="small-box-footer">Ver Produtos<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-blue-gradient">
                        <div class="inner">
                            <h3>Utilizadores</h3>

                            <p>Ver Utilizadores</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="router.php?c=user&a=index" class="small-box-footer">Ver Utilizadores <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        <?php
        }else if($role=='cliente'){
            ?>
        <div class="row">
            <div class="col-lg-12 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue-gradient">
                    <div class="inner">
                        <h3>Ver Faturas</h3>
                        <p>Minhas Faturas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-paper"></i>
                    </div>
                    <a href="router.php?c=fatura&a=showclientinvoice" class="small-box-footer">Ver as minhas faturas<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <br>
            <div class="col-lg-2"></div>
            <div class="col-lg-8 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue-gradient">
                    <div class="inner">
                        <h3>Faturas</h3>
                        <p>Minhas Últimas cinco Faturas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-paper"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xs-6">
                <table class="table tablestriped">
                    <thead>
                    <th>
                        <h3>Data</h3>
                    </th>
                    <th>
                        <h3>Valor Total</h3>
                    </th>
                    <th>
                        <h3>Iva Total</h3>
                    </th>
                    <th>
                        <h3>Nome Cliente</h3>
                    </th>
                    <th>
                        <h3>Nome Funcionário</h3>
                    </th>
                    </thead>
                    <tbody>
                    <?php $contador=0 ?>
                    <?php foreach ($faturas as $fatura) { ?>
                        <?php $contador++;
                        if($fatura->cliente_id==$client&&$contador<5){
                            ?>
                            <tr>
                                <td><?=$fatura->data ?></td>
                                <td><?=$fatura->valortotal ?>€</td>
                                <td><?= $fatura->ivatotal ?>€</td>
                                <td><?= $fatura->cliente->username ?></td>
                                <td><?= $fatura->user->username ?></td>
                            </tr>
                        <?php } ?>
                    <?php }?>

                    </tbody>
                </table>
            </div>
        </div>
        <?php
        } ?>
    </section>
</div>