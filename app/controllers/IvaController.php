<?php
require_once ('./controllers/BaseController.php');
require_once ('./controllers/BaseAuthController.php');

class IvaController extends BaseAuthController
{
    //atribui
    public function  __Construct__()
    {
        $this->loginFilterbyRole(['funcionario','administrador']);
    }

    //Mostra todas as taxas de iva numa vista
    public function index()
    {

        $ivas = Iva::All();

        $this->makeView('iva','index',['ivas'=>$ivas]);
    }

    //Mostra dados de iva ao pormenor do registo selecionado
    //$id=id do registo de iva
    public function show($id)
    {
        $iva = Iva::find([$id]);
        if (is_null($iva)) {

        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->makeView('iva','show',['iva'=>$iva]);
        }


    }

    //Mostra vista para criar uma nova taxa de iva
    public function create()
    {
        $this->makeView('iva','create');
    }

    //Guarda os dados do iva
    public function store()
    {
        $iva= new Iva($_POST);
        $auth=new Auth();
        $listaiva=IVA::all();
        $a=0;
        //Corre todos os dados da tabela de ivas
        foreach ($listaiva as $listaiva){
            //Vai verificar se a percentagem introduzida já existe na base de dados porque é um campo único, caso isso aconteca
            //passamos a variável $a para 1
            if($listaiva->percentagem==$_POST['percentagem']){
                $a=1;
            }
        }
        //caso já exista uma percentagem igual na base de dados, é mandada uma mensagem de erro no create e manda o utilizador
        //introduzir outra percentagem de iva porque o campo percentagem é unico
        if($a==1){
            $valid=$auth->getUserId();
            $this->makeView('iva','create',['valid'=>$valid]);
        }
        else{
            if($iva->is_valid()){
                $iva->save();
                $this->redirectToRoute('iva','index');
            } else {

                $this->makeView('iva','create',['iva'=>$iva]);

            }
        }
    }

    //Mostra vista para editar os dados de um registo do iva
    //$id = iva selecionado
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

    //Atualiza os dados
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

    //Coloca o campo emvigor de produto como ativo ou desativo, caso o iva seja ativo o valor é 1 e caso seja negativo o valor é 0
    public function posicao($id){
        //vai buscar o $id que é para atualizar o campo emvigor
        $iva=Iva::find([$id]);
        //verifica qual o valor da varíavel para depois dar update na base de dados no registo de iva selecionado
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