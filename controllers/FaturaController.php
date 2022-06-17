<?php
use Carbon\Carbon;
require_once ('./controllers/BaseController.php');
require_once ('./controllers/BaseAuthController.php');
require_once './models/Faturapdf.php';

class FaturaController  extends BaseAuthController
{
    //Atribui
    public function  __Construct__()
    {
        $this->loginFilterbyRole(['funcionario','administrador']);
    }
    //mostra vista para mostrar todas as faturas
    public function index()
    {
        $faturas = Fatura::All();
        $this->makeView('fatura','index',['faturas'=>$faturas]);

    }
    //mostra vista para crair fatura
    public function create()
    {
        $empresas=Empresa::All();
        $this->makeView('fatura','create',['empresas'=>$empresas]);

    }
    // mostra vista para mostrar fatura ao pormenor
    public function show($id){
        $fatura = Fatura::find([$id]);
        $empresa=Empresa::find([2]);
        if (is_null($fatura)) {

        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->makeView('fatura','show',['fatura'=>$fatura],['empresa'=>$empresa]);
        }

    }
    //guarda dados da fatura
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
    //mostra vista com as faturas de um determinado cliente
    public function showclientinvoice()
    {
        $faturas = Fatura::All();
        $this->makeView('fatura','indexcliente',['faturas'=>$faturas]);
    }

    // atualiza os dados da fatura
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
    // cancela a fatura
    public function cancel($idfatura){
        $fatura = Fatura::find([$idfatura]);
        $fatura->estado='cancelada';
        if($fatura->is_valid()){
            $fatura->save();
            $this->redirectToRoute('fatura','index');
        }
    }
 //mostra vista para editar a fatura
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
//gera pdf da fatura
    public function generatepdf($idfatura)
    {
        $fatura = Fatura::find([$idfatura]);
        $empresa = Empresa::find([2]);
        $pdf = new Faturapdf();
        $pdf->generatePDF($fatura, $empresa);

    }

}