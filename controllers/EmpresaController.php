<?php

require_once ('./controllers/BaseController.php');
require_once ('./controllers/BaseAuthController.php');

class EmpresaController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilterByRole(['admin','funcionario']);
        $empresa = empresa::All();

        $this->makeView('empresa','index',['empresa'=>$empresa]);
    }

    public function show($id)
    {
            $empresa = empresa::find([$id]);
            if (is_null($empresa)) {

            } else {
                //mostrar a vista show passando os dados por parâmetro
                $this->makeView('empresa','show',['empresa'=>$empresa]);
            }


    }

    /*public function create()
    {
        $this->loginFilter();
        $genres = Genre::All();
        $this->makeView('empresa','create',['genres'=>$genres]);
    }

    public function store()
    {
        $this->loginFilter();

        $empresa = new empresa($_POST);


        if($empresa->is_valid()){
            $empresa->save();
            $this->redirectToRoute('empresa','index');
        } else {
            $genres= Genre::All();
            $this->makeView('empresa','create',['empresa'=>$empresa],['genres'=>$genres]);

        }

    }*/

    public function edit($id)
    {
        $empresa = empresa::find([$id]);
        $genres = Genre::All();
        if (is_null($empresa)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista edit passando os dados por parâmetro
            $this->makeView('empresa','edit',['empresa'=>$empresa]);


        }
    }

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
            $genres= Genre::All();
            $this->makeView('empresa','edit', ['empresa'=>$empresa],['genres'=>$genres]);

            //mostrar vista edit passando o modelo como parâmetro
        }
    }

   /* public function delete($id)
    {
        $empresa = empresa::find([$id]);

        foreach ($empresa->chapters as $chapter)
        {
            $chapter->delete();
        }
        $empresa->delete();
        $this->redirectToRoute('empresa','index');

    }*/



}