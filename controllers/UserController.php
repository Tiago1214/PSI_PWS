<?php

class UserController extends BaseAuthController
{
    //Tipo de utilizadores que podem aceder as funcoes criadas neste controlador
    public function  __Construct__()
    {
        $this->loginFilterbyRole(['funcionario','admininstrador']);
    }

    //Os administradores podem ver todos os registos dos utilizadores enquanto os funcionários só podem ver os clientes
    //Os clientes não tem acesso a este controlador
    //A função index mostra todos os utilizadores
    public function index()
    {
        //Obter o role de utilizador com sessão iniciada
        $auth=new Auth();
        $role=$auth->getRole();

        //Obter todos os utilizadores
        $users = User::All();

        $this->makeView('user','index',['users'=>$users],['role'=>$role]);
    }

    //A função create serve para criar um novo utilizador
    public function create(){
        $auth=new Auth();
        $role=$auth->getRole();
        $this->makeView('user','create',['role'=>$role]);
    }

    //A função store serve para validar o utilizador criado
    public function store(){
        $user = new User($_POST);
        //Validar se os dados são validos para inserir o registo na base de dados
        if($user->is_valid()){
            $user->save();
            $this->redirectToRoute('user','index');
        } else {
            $this->makeView('user','create',['user'=>$user]);
        }
    }

    //Mostra os dados do utilizador selecionado
    public function show($id)
    {
        //Obter o utilizador selecionado
        $user = User::find([$id]);
        if (is_null($user)) {
            $this->redirectToRoute('user','index');
        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->makeView('user','show',['user'=>$user]);
        }
    }

    //Função de edit serve para podermos obter os dados atuais do utilizador selecionado
    public function edit($id)
    {
        //Obter o tipo de utilizador com sessão iniciada para saber se o mesmo pode alterar ou não o role de um utilizador
        $auth=new Auth();
        $role=$auth->GetRole();

        //Obter o utilizador selecionado
        $user = User::find([$id]);
        if (is_null($user)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista edit passando os dados por parâmetro
            $this->makeView('user','edit',['user'=>$user],['role'=>$role]);
        }
    }

    //A função update atualiza os dados na base de dados
    public function update($id)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $user = User::find([$id]);
        $user->update_attributes($_POST);
        if($user->is_valid()){
            $user->save();
            $this->redirectToRoute('user','index');
            //redirecionar para o index
        } else {
            $this->makeView('user','edit', ['user'=>$user]);
            //mostrar vista edit passando o modelo como parâmetro
        }
    }

    /* A função posição serve para saber qual o estado do utilizador,
    se o utilizador estiver ativo irá apresentar o valor 1 se não estiver ativo apresentará
    o valor 0
    */
    public function posicao($id){
        //Encontrar o utilizador selecionado
        $user=User::find([$id]);
        //Verificar qual é o estado para poder atualizar os valroes
        if($user->estado==1){
            $user->update_attribute(estado,0);
            if($user->is_valid()){
                $user->save();
                $this->redirectToRoute('user','index');
            }
            else{
                $this->makeView('user','index');
            }
        }
        else if($user->estado==0){
            $user->update_attribute(estado,1);
            if($user->is_valid()){
                $user->save();
                $this->redirectToRoute('user','index');
            }
            else{
                $this->makeView('user','index');
            }
        }
    }

    //A função changedados é usada para um administrador ou um funcionário mudarem a sua password ou email
    public function changedados($id){
        $user=User::find([$id]);
        $this->makeView('user','changedados',['user'=>$user]);
    }

    //Esta função serve para selecionar um cliente de uma determinada fatura
    public function selectclient()
    {
        $users = User::All();
        $this->makeView('user','selectclient',['users'=>$users]);
    }
}