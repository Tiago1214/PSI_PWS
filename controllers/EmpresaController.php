<?php

require_once ('./controllers/BaseController.php');
require_once ('./controllers/BaseAuthController.php');

class EmpresaController extends BaseAuthController
{
    //Atribui
    public function  __Construct__()
    {
        $this->loginFilterbyRole(['funcionario','administrador']);
    }
    // chama vista para mostrar empresas
    public function index()
    {
        $empresas = empresa::All();

        $this->makeView('empresa','index',['empresas'=>$empresas]);
    }
    //mostra dados empresa ao pormenor
    public function show($id)
    {
            $empresa = empresa::find([$id]);
            if (is_null($empresa)) {

            } else {
                //mostrar a vista show passando os dados por parâmetro
                $this->makeView('empresa','show',['empresa'=>$empresa]);
            }


    }
    // mostra vista para editar
    public function edit($id)
    {
        $empresa = empresa::find([$id]);

        if (is_null($empresa)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista edit passando os dados por parâmetro
            $this->makeView('empresa','edit',['empresa'=>$empresa]);


        }
    }
    //atualiza os dados
    public function update($id)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $empresa = empresa::find([$id]);
        $empresa->update_attributes($_POST);
        if($empresa->is_valid()){
            $empresa->save();
            $this->redirectToRoute('empresa','index');
            //redirecionar para o index
        } else {

            $this->makeView('empresa','edit', ['empresa'=>$empresa]);

            //mostrar vista edit passando o modelo como parâmetro
        }
    }
}