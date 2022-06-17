<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Main content -->
        <section class="invoice">

            <div id="imprimir">
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <i class="fa fa-globe"></i> Fatura +
                            <small class="pull-right">F+</small>
                        </h2>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">

                        <h4>Fatura nº<?php echo $fatura->id  ?></h4>
                        <h5>Data: <?= $fatura->data ?></h5>
                        <address>

                            <br>
                            <?php echo $empresa->designacaosocial; ?><br>
                            NIF: <?php echo $empresa->nif; ?><br>
                            Morada:<?php  echo $empresa->morada; ?><br>
                            Código Postal:<?php  echo $empresa->codpostal;?> <?php echo $empresa->localidade?><br>
                            Telefone: <?php echo $empresa->telefone; ?><br>
                            Capital Social: <?php echo $empresa ->capitalsocial?><br>

                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <address>
                            <br>
                            Nome:<?php  echo $fatura->cliente->username; ?><br>
                            NIF: <?php echo $fatura->cliente->nif; ?><br>
                            Morada:<?php  echo $fatura->cliente->morada; ?><br>
                            Código Postal:<?php  echo $fatura->cliente->codpostal;?> <?php echo $fatura->cliente->localidade?><br>
                        </address>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>REF</th>
                                <th>Descrição</th>
                                <th>QTD #</th>
                                <th>Valor Un.</th>
                                <th>Valor IVA</th>
                                <th>Taxa IVA</th>
                                <th>Subtotal</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php  foreach($fatura->linhafaturas as $linha){ ?>
                            <tr>
                                <td> <?=  $linha->produto->referencia  ; ?> </td>
                                <td> <?=  $linha->produto->descricao  ; ?></td>
                                <td> <?= $linha->quantidade  ; ?></td>
                                <td> <?= $linha->valorunitario ; ?>€</td>
                                <td> <?= $linha->valorunitario*$linha->taxaiva/100 ; ?>€</td>
                                <td> <?= $linha->taxaiva  ; ?>%</td>
                                <td><?=  $linha->valorunitario*$linha->quantidade+($linha->quantidade*($linha->valorunitario*$linha->taxaiva/100)) ?>€</td>
                                <?php }?>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-xs-9">
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-3">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Subtotal:</th>
                                    <td><?= $fatura->valortotal-$fatura->ivatotal ?>€</td>
                                </tr>
                                <tr>
                                    <th>Valor IVA:</th>
                                    <td> <?= $fatura->ivatotal ?> €</td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td><?= $fatura->valortotal?>€</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                    <p>Fatura emitida por: <?= $fatura->user->username; ?></p>
                </div>
            </div>
            <!-- /.row -->
            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-12">
                    <a href="router.php?c=fatura&a=pdf&idf=<?=$fatura->id?>" target="_blank" rel="noopener"
                       class="btn btn-primary"><i class="fas fa-print"></i> Gerar PDF</a>
                    <a href="router.php?c=fatura&a=index"
                       class="btn btn-success">Voltar</a>
                </div>
            </div>
        </section>
    </div>
</div>

