<?php
require_once ('./controllers/BaseController.php');
require_once ('./controllers/BaseAuthController.php');

class ProdutoController extends BaseAuthController
{
    //Os funcionários e os administradores tem as mesmas funções neste controlador enquanto os clientes não podem aceder
    public function  __Construct__()
    {
        $this->loginFilterbyRole(['funcionario','administrador']);
    }

    //Mostra a vista em que se ve todos os produtos
    public function index()
    {

        $produtos = Produto::All();

        $this->makeView('produto','index',['produtos'=>$produtos]);
    }

    // Mostra vista do produto selecionado
    public function show($id)
    {
        $produto = Produto::find([$id]);
        if (is_null($produto)) {

        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->makeView('produto','show',['produto'=>$produto]);
        }


    }

    //Mostra vista para criar produto
    public function create()
    {

        $ivas = Iva::All();
        $this->makeView('produto','create',['ivas'=>$ivas]);
    }

    //guarda dados do produto
    public function store()
    {
        $produto = new Produto($_POST);
        $listaprodutos= Produto::all();
        $auth=new Auth();
        $a=0;
        //Vai verificar se a referencia introduzida já existe na base de dados porque é um campo único, caso isso aconteca
        //passamos a variável $a para 1
        foreach($listaprodutos as $listaproduto){
            if($listaproduto->referencia==$_POST['referencia']){
                $a=1;
            }
        }
        //caso já exista uma referencia com o mesmo valor, é mandada uma mensagem de erro no create e manda o utilizador
        //introduzir outra referencia
        if($a==1){
            $valid=$auth->getUserId();
            $ivas= Iva::All();
            $this->makeView('produto','create',['valid'=>$valid],['ivas'=>$ivas]);
        }
        else{
            if($produto->is_valid()){
                $produto->save();
                $this->redirectToRoute('produto','index');
            } else {
                $ivas= Iva::All();
                $this->makeView('produto','create',['produto'=>$produto],['ivas'=>$ivas]);

            }
        }
    }
    //Mostra vista para editar produto
    public function edit($id)
    {
        $produto = Produto::find([$id]);
        $ivas = Iva::All();
        if (is_null($produto)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista edit passando os dados por parâmetro
        $this->makeView('produto','edit',['produto'=>$produto],['ivas'=>$ivas]);


        }
    }
    //Atualiza dados de um produto
    public function update($id)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $produto = Produto::find([$id]);
        $produto->update_attributes($_POST);
        if($produto->is_valid()){
            $produto->save();
            $this->redirectToRoute('produto','index');
            //redirecionar para o index
        } else {
            $ivas= Iva::All();
            $this->makeView('produto','edit', ['produto'=>$produto],['ivas'=>$ivas]);

            //mostrar vista edit passando o modelo como parâmetro
        }
    }
    //Coloca o campo estado de um produto como ativo ou desativo, caso o produto seja ativo o valor é 1 e caso seja negativo o valor é 0
    public function posicao($id)
    {
        $produto = Produto::find([$id]);
        //verifica qual o valor da varíavel para depois dar update na base de dados no registo de iva selecionado
        if ($produto->estado == 1) {
            $produto->update_attribute(estado, 0);
            if ($produto->is_valid()) {
                $produto->save();
                $this->redirectToRoute('produto', 'index');
            } else {
                $this->makeView('produto', 'index');
            }
        } else if ($produto->estado == 0) {
            $produto->update_attribute(estado, 1);
            if ($produto->is_valid()) {
                $produto->save();
                $this->redirectToRoute('produto', 'index');
            } else {
                $this->makeView('produto', 'index');
            }
        }
    }

    //mostrar vista para selecionar um produto
    public function selectproduto($callbacktoroute)
    {
        $produtos = Produto::All();
        $this->makeView('produto','selectproduto',['produtos'=>$produtos]);
    }
}