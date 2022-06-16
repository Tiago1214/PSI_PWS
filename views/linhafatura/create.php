
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
                            <th>SubTotal</th>
                            <th>User Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($fatura->linhafaturas as $linha){ ?>
                        <tr>
                                <td> <?=  $linha->produto->referencia  ; ?> </td>
                                <td> <?=  $linha->produto->descricao  ; ?></td>
                                <td><?=  $linha->quantidade  ; ?></td>
                                <td> <?= $linha->valorunitario."€" ; ?></td>
                                <td> <?= $linha->produto->iva->percentagem."%" ; ?></td>
                                <td><?=$linha->valoriva * $linha->quantidade. "€"?></td>
                                <td> <?=$linha->produto->preco*$linha->quantidade. "€"?></td>
                                <td><a href="router.php?c=linhafatura&a=edit&idlf=<?= $linha->id ?>&idf=<?= $fatura->id ?>&idp=<?= $linha->produto->id ?>"  class="btn btn-warning" role="button">Edit</a>

                                <a href="router.php?c=linhafatura&a=delete&idlf=<?= $linha->id ?>&idf=<?= $fatura->id ?>" class="btn btn-danger">Delete</a>

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
                                <td><input type="number" class="form-control" placeholder="QTD" name="quantidade"  value="1" style="width: 100px"></td>
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
                                    <a href="router.php?c=linhafatura&a=create&id=<?= $fatura->id?>" class="btn btn-danger" style="background-color: red"><img src="./public/img/Actions-file-close-icon.png"></a>

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
                <div class="col-xs-3">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td><?= $fatura->valortotal."€" ?></td>
                            </tr>
                            <tr>
                                <th>IVA:</th>
                                <td><?= $fatura->ivatotal."€"?></td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>
                                    <?= $fatura->valortotal . "€"?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">
                    <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
                    <a href="router.php?c=fatura&a=finalizar&idf=<?= $fatura->id ?>&opcao=finalizada" class="btn btn-primary pull-right"><i class="fa fa-download"></i>Gerar</a>
                    <a href="router.php?c=fatura&a=finalizar&idf=<?= $fatura->id ?>&opcao=cancelada" class="btn btn-primary pull-right"><i class="fa fa-download"></i>Cancelar</a>
                </div>
            </div>
        </section>
    </div>
</div>
