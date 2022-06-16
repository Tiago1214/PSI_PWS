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

                    <h4>Fatura nº</h4>
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
                    <a href="router.php?c=user&a=selectclient"  class="btn btn-info" role="button">Selecionar Cliente</a>
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
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
        </section>
    </div>
</div>
