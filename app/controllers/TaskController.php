<?php
require_once ('./controllers/BaseController.php');
require_once ('./controllers/BaseAuthController.php');

class TaskController extends BaseAuthController
{


    //Atribui
    public function __Construct__()
    {
        $this->loginFilterbyRole(['funcionario', 'administrador']);
    }

    // chama vista para mostrar empresas
    public function index()
    {
        $tarefas= Task::All();

        $this->makeView('tarefa', 'index', ['tarefas' => $tarefas]);
    }

    //mostra dados da empresa selecionada
    public function show($id)
    {
        $tarefa = Task::find([$id]);
        if (is_null($tarefa)) {

        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->makeView('tarefa', 'show', ['tarefa' => $tarefa]);
        }


    }
    public function create()
    {
        $this->makeView('tarefa','create');
    }

    //Guarda os dados do iva
    public function store()
    {
        $auth = new Auth();
        $tarefa= new Task($_POST);
        $tarefa->user_id = $auth->getUserId();
        //caso já exista uma percentagem igual na base de dados, é mandada uma mensagem de erro no create e manda o utilizador
        //introduzir outra percentagem de iva porque o campo percentagem é unico

            if($tarefa->is_valid()){
                $tarefa->save();
                $this->redirectToRoute('tarefa','index');
            } else {

                $this->makeView('tarefa','create',['tarefa'=>$tarefa]);

            }

    }


    // mostra vista de edit em que o parametro $id corresponde ao id da empresa
    public function edit($id)
    {
        $tarefa = Task::find([$id]);

        if (is_null($tarefa)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista edit passando os dados por parâmetro
            $this->makeView('tarefa', 'edit', ['tarefa' => $tarefa]);


        }
    }

    //atualiza os dados da empresa usando o id que trouxe da vista de edit
    public function update($id)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $tarefa = Task::find([$id]);
        $tarefa->update_attributes($_POST);
        if ($tarefa->is_valid()) {
            $tarefa->save();
            $this->redirectToRoute('tarefa', 'index');
            //redirecionar para o index
        } else {

            $this->makeView('tarefa', 'edit', ['tarefa' => $tarefa]);

            //mostrar vista edit passando o modelo como parâmetro
        }
    }
    public function done($id)
    {
        $tarefa = Task::find([$id]);
        //verifica qual o valor da varíavel para depois dar update na base de dados no registo de iva selecionado

            $tarefa->update_attribute(done, 'realizada');
            if ($tarefa->is_valid()) {
                $tarefa->save();
                $this->redirectToRoute('tarefa', 'index');
            } else {
                $this->makeView('tarefa', 'index');
            }


    }


}