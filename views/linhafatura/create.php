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

                    <h4>Fatura nº0001</h4>
                    <address>
                        <?php foreach($empresas as $empresa){
                            ?>
                            <br>
                            Morada:<?php  echo $empresa->morada; ?><br>
                            Código Postal:<?php  echo $empresa->codpostal;?> <?php echo $empresa->localidade?><br>
                            Telefone: <?php echo $empresa->telefone; ?><br>
                            Email: <?php echo $empresa ->email?><br>
                            <?php
                        } ?>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">

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
                            <th>IVA</th>
                            <th>TAXA</th>
                            <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php foreach($linhafatura in $linha){

                            }?>
                        </tr>
                        <tr>
                            <td>
                                <a href="router.php?c=fatura&a=selectproduto"  class="btn btn-info" role="button">Selecionar Produto</a>
                            </td>
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
                                <th style="width:50%">Subtotal:</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>IVA:</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>$265.24</td>
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

