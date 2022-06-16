<?php
require_once ('./controllers/BaseController.php');
require_once ('./controllers/BaseAuthController.php');

class IvaController extends BaseAuthController
{
    public function  __Construct__()
    {
        $this->loginFilterbyRole(['funcionario','administrador']);
    }


    public function index()
    {

        $ivas = Iva::All();

        $this->makeView('iva','index',['ivas'=>$ivas]);
    }

    public function show($id)
    {
        $iva = Iva::find([$id]);
        if (is_null($iva)) {

        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->makeView('iva','show',['iva'=>$iva]);
        }


    }

    public function create()
    {


        $this->makeView('iva','create');
    }

    public function store()
    {


        $iva= new Iva($_POST);


        if($iva->is_valid()){
            $iva->save();
            $this->redirectToRoute('iva','index');
        } else {

            $this->makeView('iva','create',['iva'=>$iva]);

        }

    }

    public function edit($id)
    {
        $iva = Iva::find([$id]);

        if (is_null($iva)) {
            $this->redirectToRoute('iva','index');
        } else {
            //mostrar a vista edit passando os dados por parâmetro
            $this->makeView('iva','edit',['iva'=>$iva]);


        }
    }

    public function update($id)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $iva = Iva::find([$id]);
        $iva->update_attributes($_POST);
        if($iva->is_valid()){
            $iva->save();
            $this->redirectToRoute('iva','index');
            //redirecionar para o index
        } else {

            $this->makeView('iva','edit', ['iva'=>$iva]);

            //mostrar vista edit passando o modelo como parâmetro
        }
    }

    public function posicao($id){
        $iva=Iva::find([$id]);
        if($iva->emvigor==1){
            $iva->update_attribute(emvigor,0);
            if($iva->is_valid()){
                $iva->save();
                $this->redirectToRoute('iva','index');
            }
            else{
                $this->makeView('iva','index');
            }
        }
        else if($iva->emvigor==0){
            $iva->update_attribute(emvigor,1);
            if($iva->is_valid()){
                $iva->save();
                $this->redirectToRoute('iva','index');
            }
            else{
                $this->makeView('iva','index');
            }
        }
    }

}