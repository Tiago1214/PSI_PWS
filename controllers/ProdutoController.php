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


    public function index()
    {

        $produtos = Produto::All();

        $this->makeView('produto','index',['produtos'=>$produtos]);
    }

    public function show($id)
    {
        $produto = Produto::find([$id]);
        if (is_null($produto)) {

        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->makeView('produto','show',['produto'=>$produto]);
        }


    }

    public function create()
    {

        $ivas = Iva::All();
        $this->makeView('produto','create',['ivas'=>$ivas]);
    }

    public function store()
    {


        $produto = new Produto($_POST);


        if($produto->is_valid()){
            $produto->save();
            $this->redirectToRoute('produto','index');
        } else {
            $ivas= Iva::All();
            $this->makeView('produto','create',['produto'=>$produto],['ivas'=>$ivas]);

        }

    }

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

    public function delete($id)
    {
        $produto = Produto::find([$id]);


        $produto->delete();
        $this->redirectToRoute('produto','index');

    }

    public function selectproduto($callbacktoroute)
    {
        $produtos = Produto::All();
        $this->makeView('produto','selectproduto',['produtos'=>$produtos]);
    }

    public function posicao($id){
        //Encontrar o utilizador selecionado
        $produto=Produto::find([$id]);
        //Verificar qual é o estado para poder atualizar os valroes
        if($produto->estado==1){
            $produto->update_attribute(estado,0);
            if($produto->is_valid()){
                $produto->save();
                $this->redirectToRoute('produto','index');
            }
            else{
                $this->makeView('produto','index');
            }
        }
        else if($produto->estado==0){
            $produto->update_attribute(estado,1);
            if($produto->is_valid()){
                $produto->save();
                $this->redirectToRoute('produto','index');
            }
            else{
                $this->makeView('produto','index');
            }
        }
    }
}