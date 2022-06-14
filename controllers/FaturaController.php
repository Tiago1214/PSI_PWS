<?php
use Carbon\Carbon;
require_once ('./controllers/BaseController.php');
require_once ('./controllers/BaseAuthController.php');

class FaturaController  extends BaseAuthController
{
    public function  __Construct__()
    {
        $this->loginFilterbyRole(['funcionario','admin']);
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

    public function selectClient()
    {
        $users = User::All();
        $this->makeView('fatura','selectclient',['users'=>$users]);
    }

    public function delete($idfatura)
    {
        //coluna estado da fatura = anulada
    }

}