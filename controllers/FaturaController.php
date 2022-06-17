<?php
use Carbon\Carbon;
require_once ('./controllers/BaseController.php');
require_once ('./controllers/BaseAuthController.php');
require_once './models/Faturapdf.php';

class FaturaController  extends BaseAuthController
{
    public function  __Construct__()
    {
        $this->loginFilterbyRole(['funcionario','administrador']);
    }
    public function index()
    {
        $faturas = Fatura::All();
        $this->makeView('fatura','index',['faturas'=>$faturas]);

    }

    public function create()
    {
        $empresas=Empresa::All();
        $this->makeView('fatura','create',['empresas'=>$empresas]);

    }

    public function show($id){
        $fatura = Fatura::find([$id]);
        $empresa=Empresa::find([2]);
        if (is_null($fatura)) {

        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->makeView('fatura','show',['fatura'=>$fatura],['empresa'=>$empresa]);
        }

    }

    public function store($idclient)
    {
        $auth = new Auth();
        $fatura = new Fatura();
        $fatura->valortotal =00.00;
        $fatura->ivatotal = 00.00;
        $fatura->estado ='em lancamento';
        $fatura->cliente_id =$idclient;
        $fatura->user_id = $auth->getUserId();
        //$idProduct =null;

        if($fatura->is_valid()){
            $fatura->save();
            $this->redirectToRoute('linhafatura','create',['idf'=>$fatura->id]);
        } else {

            $this->redirectToRoute('fatura','create');

        }
    }

    public function showclientinvoice()
    {
        $faturas = Fatura::All();
        $this->makeView('fatura','indexcliente',['faturas'=>$faturas]);
    }

    public function update($idfatura){
        $fatura = Fatura::find([$idfatura]);
        foreach($fatura->linhafaturas as $linha){
            $linha->produto->stock=$linha->produto->stock-$linha->quantidade;
            if($linha->produto->is_valid()){
                $linha->produto->save();
            }
        }
        $fatura->valortotal=$_POST['total'];
        $fatura->ivatotal=$_POST['ivatotal'];
        $fatura->estado='emitida';
        if($fatura->is_valid()){
            $fatura->save();
            $this->redirectToRoute('fatura','index');
        }
    }
    public function cancel($idfatura){
        $fatura = Fatura::find([$idfatura]);
        $fatura->estado='cancelada';
        if($fatura->is_valid()){
            $fatura->save();
            $this->redirectToRoute('fatura','index');
        }
    }

    public function edit($idfatura){
        $fatura = Fatura::find([$idfatura]);
        $empresa=Empresa::find([2]);
        if(is_null($idfatura)){
            $this->redirectToRoute('fatura','index');
        }
        else{
            $this->makeView('linhafatura','edit',['fatura'=>$fatura],['empresa'=>$empresa]);
        }
    }

    public function generatepdf($idfatura)
    {
        $fatura = Fatura::find([$idfatura]);
        $empresa = Empresa::find([2]);
        $pdf = new Faturapdf();
        $pdf->generatePDF($fatura, $empresa);
    }

}