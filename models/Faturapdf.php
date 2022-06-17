<?php
require_once './vendor/autoload.php';


class Faturapdf
{

    public function generatePDF($fatura, $empresa)
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('
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

                    <h4>Fatura nº'. $fatura->id  .'</h4>
                    <h5>Data: '. $fatura->data .'</h5>
                    <address>

                        <br>
                        '. $empresa->designacaosocial .'<br>
                        NIF: '. $empresa->nif .'<br>
                        Morada:'. $empresa->morada.'<br>
                        Código Postal:'.$empresa->codpostal.' '. $empresa->localidade.'<br>
                        Telefone: '. $empresa->telefone.'<br>
                        Capital Social: '. $empresa ->capitalsocial.'<br>

                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <address>
                        <br>
                        Nome:'. $fatura->cliente->username.'<br>
                        NIF: '. $fatura->cliente->nif.'<br>
                        Morada:'. $fatura->cliente->morada.'<br>
                        Código Postal:'. $fatura->cliente->codpostal.' '. $fatura->cliente->localidade.'<br>
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
                       ');

                              foreach($fatura->linhafaturas as $linha){
                        $mpdf->WriteHTML('
                                  <tr>
                                <td> '.  $linha->produto->referencia  .' </td>
                                <td> '.  $linha->produto->descricao  .'</td>
                                <td> '. $linha->quantidade  .'</td>
                                <td> '. $linha->valorunitario .'€</td>
                                <td> '. $linha->valorunitario*$linha->taxaiva/100 .'€</td>
                                <td> '. $linha->taxaiva  .'%</td>
                                <td>');
                           echo $linha->valorunitario*$linha->quantidade+($linha->quantidade*($linha->valorunitario*$linha->taxaiva/100)) ;
                            $mpdf->WriteHTML('
                                €</td>
                                </tr>
                                ');
                             }
        $mpdf->WriteHTML('
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
                                <td>');
                              echo $fatura->valortotal-$fatura->ivatotal ;
                              $mpdf->WriteHTML('€</td>
                            </tr>
                            <tr>
                                <th>Valor IVA:</th>
                                <td> '. $fatura->ivatotal .' €</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>'. $fatura->valortotal.'€</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
<p>Fatura emitida por: '. $fatura->user->username .'</p>
            
        </section>
    </div>
</div>

        
        
                            ');




        $mpdf->Output('fatura_n'.$fatura->id.'.pdf');
    }


}