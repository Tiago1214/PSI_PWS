<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Main content -->
        <section class="invoice">

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
                            <th>Taxa IVA</th>
                            <th>Valor IVA</th>
                            <th>Valor Total</th>
                            <th>User Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $subtotal=0;
                               $ivatotal=0;
                                $total=0;

                        ?>
                        <?php  foreach($fatura->linhafaturas as $linha){
                                $subtotal=$subtotal+$linha->produto->preco*$linha->quantidade;
                                $ivatotal=$ivatotal+($linha->valoriva * $linha->quantidade);
                            ?>
                        <tr>
                                <td> <?=  $linha->produto->referencia  ; ?> </td>
                                <td> <?=  $linha->produto->descricao  ; ?></td>
                                <td><?=  $linha->quantidade  ; ?></td>
                                <td> <?= $linha->valorunitario."€" ; ?></td>
                                <td> <?= $linha->produto->iva->percentagem."%" ; ?></td>
                                <td><?=$linha->valoriva * $linha->quantidade. "€"?></td>
                                <td> <?=$linha->produto->preco*$linha->quantidade+$linha->valoriva * $linha->quantidade. "€"?></td>
                                <td><a href="router.php?c=linhafatura&a=editquantidade&idf=<?= $fatura->id ?>&idlf=<?= $linha->id ?>"  class="btn btn-warning" role="button">Edit</a>

                                <a href="router.php?c=linhafatura&a=delete&idlf=<?= $linha->id ?>&idf=<?= $fatura->id ?>" class="btn btn-danger">Delete</a>

                                </td>

                                </td>

                        </tr>
                        <?php }?>

                        <?php if(is_null($produto)) { ?>


                            <tr>
                               <td><a href="router.php?c=produto&a=selectproduto&id=<?= $fatura->id?>" class="btn btn-primary" >Escolher Produto</a></td>
                                    <td><input type="number" class="form-control" placeholder="QTD" name="quantidade"  value="1" style="width: 100px"></td>
                            </tr>

                            <?php }else
                        { ?>
                        <form action="router.php?c=linhafatura&a=store&idf=<?= $fatura->id?>&idp=<?= $produto->id?>" method="post">
                            <tr>
                                <td>
                                    <?=$produto->referencia?><br>
                                </td>
                                <td>
                                    <?=$produto->descricao?><br>
                                </td>
                                <td><input type="number" class="form-control" placeholder="QTD" name="quantidade"  value="1" min=1 max="<?= $produto->stock ?>" style="width: 100px"></td>
                                <td>
                                    <input type="hidden" class="form-control" name="valorunitario" value=" <?=$produto->preco?>">
                                    <?=$produto->preco."€"?><br>
                                </td>
                                <td>
                                    <input type="hidden" class="form-control" name="valoriva" value=" <?=$produto->preco*($produto->iva->percentagem/100)?>">
                                    <?=$produto->preco*($produto->iva->percentagem/100)?><br>
                                </td>
                                <td>
                                    <?=$produto->iva->percentagem?><br>
                                </td>
                                <td>
                                    <?=$produto->preco+($produto->iva->percentagem/100)?><br>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary" style="background-color: green"><img src="./public/img/Accept-icon.png"></button>
                                    <a href="router.php?c=linhafatura&a=create&idf=<?= $fatura->id?>" class="btn btn-danger" style="background-color: red"><img src="./public/img/Actions-file-close-icon.png"></a>

                                </td>

                            </tr>
                        </form>
                        <?php }?>


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
                        <form action="router.php?c=fatura&a=update&idf=<?= $fatura->id?>" method="post">
                            <div class="col-xs-3">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td><?= $subtotal."€" ?></td>
                                        </tr>
                                        <tr>
                                            <th>IVA:</th>
                                            <td><?= $ivatotal."€"?></td>
                                            <input type="hidden" name="ivatotal" value="<?= $ivatotal?>">
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td name="valortotal">
                                                <?= $total=$total+($subtotal+$ivatotal); ?>€
                                                <input type="hidden" name="total" value="<?= $total?>">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row no-print">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-2"></div>
                                <div class="col-lg-2"></div>
                                <div class="col-lg-2"></div>
                                <div class="col-lg-2"></div>
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-success">Gerar</button>
                                    <a href="router.php?c=fatura&a=cancel&idf=<?= $fatura->id ?>" class="btn btn-warning pull-right">Cancelar</a>
                                </div>
                            </div>
                        </form>
                        <br>
                        <p>Fatura emitida por: <?= $_SESSION['username']; ?></p>
                            <!-- /.col -->
                    </div>

        </section>
    </div>
</div>
