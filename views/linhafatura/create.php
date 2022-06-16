
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
                            <th>Valor IVA</th>
                            <th>Taxa IVA</th>
                            <th>Atualizar Quant.</th>
                        </tr>
                        </thead>
                        <tbody>
                        <form action="router.php?c=produto&a=selectproduto&idf=<?= $fatura->id ?>" method="post">
                            <?php  foreach($fatura->linhafaturas as $linha){ ?>
                            <tr>
                                <form action="router.php?c=linhafatura&a=store&idf=<?=$fatura->id?>" method="post">
                                    <td> <?=  $linha->produto->referencia  ; ?> </td>
                                    <td> <?=  $linha->produto->descricao  ; ?></td>
                                    <td><select name="quantidade" id="quantidade">
                                            <?php for($i=1;$i<=$linha->produto->stock;$i++){?>
                                                <option><?php echo $i ?></option>
                                            <?php
                                            }?>
                                        </select></td>
                                    <td> <?= $linha->valorunitario ; ?></td>
                                    <td> <?= $linha->valoriva ; ?></td>
                                    <td> <?= $linha->taxaiva  ; ?></td>
                                    <td><button type="submit" class="btn btn-success"></button></td>
                                </form>
                            </tr>
                            <?php }
                            ?>

                        </tr>
                        <form action="router.php?c=produto&a=selectproduto&id=<?=$fatura->id;?>" method="post">

                            <button type="submit" class="btn btn-primary">Inserir Produto</button>
                            </td>
                        </form>
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
                                <td></td>
                            </tr>
                            <tr>
                                <th>IVA:</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>

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
                    <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Cancelar
                    </button>
                    <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                        <i class="fa fa-download"></i> Gerar
                    </button>
                </div>
            </div>
        </section>
    </div>
</div>