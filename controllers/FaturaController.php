<?php
use Carbon\Carbon;
require_once ('./controllers/BaseController.php');
require_once ('./controllers/BaseAuthController.php');

class FaturaController  extends BaseAuthController
{
    public function index()
    {
        $this->loginFilterByRole(['admin','funcionario']);
        $faturas = Fatura::All();

        $this->makeView('fatura','index',['faturas'=>$faturas]);

    }

    public function create()
    {
        $this->loginFilterByRole(['admin','funcionario']);
        $this->makeView('fatura','create');

    }

    public function show($id){
        $fatura = Fatura::find([$id]);
        if (is_null($fatura)) {

        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->makeView('fatura','show',['fatura'=>$fatura]);
        }

    }

    public function store($idclient)
    {
        //criar fatura
        // redirect-> linhafatura/create+idfatura
        $this->loginFilterByRole(['admin','funcionario']);
        $auth = new Auth();
        $fatura = new Fatura();
        $fatura->data = Carbon::now();
        $fatura->valortotal =00.00;
        $fatura->estado ='em lancamento';
        $fatura->cliente_id =$idclient;
        $fatura->funcionario_id = $auth->getUserId();

        if($fatura->is_valid()){
            $fatura->save();
            $this->redirectToRoute('linhafatura','create',['fatura'=>$fatura]);
        } else {

            $this->makeView('fatura','create',['fatura'=>$fatura]);

        }

    }

    public function selectClient($searchFilter)
    {

    }

    public function delete($idfatura)
    {
        //coluna estado da fatura = anulada
    }

}