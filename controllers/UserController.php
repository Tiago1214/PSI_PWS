<?php

class UserController extends BaseAuthController
{
    public function  __Construct__()
    {
        $this->loginFilterbyRole(['funcionario','admin']);
    }

    public function index()
    {
        $auth=new Auth();
        $role=$auth->getRole();
        $users = User::All();

        $this->makeView('user','index',['users'=>$users],['role'=>$role]);
    }

    public function show($id)
    {
        $user = User::find([$id]);
        if (is_null($user)) {

        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->makeView('user','show',['user'=>$user]);
        }
    }

    public function edit($id)
    {
        $auth=new Auth();
        $user = User::find([$id]);
        $role=$auth->GetRole();
        if (is_null($user)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista edit passando os dados por parâmetro
            $this->makeView('user','edit',['user'=>$user],['role'=>$role]);
        }
    }

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

    public function create(){
        $auth=new Auth();
        $role=$auth->getRole();
        $this->makeView('user','create',['role'=>$role]);
    }

    public function store(){
        $user = new User($_POST);


        if($user->is_valid()){
            $user->save();
            $this->redirectToRoute('user','index');
        } else {
            $this->makeView('user','create',['user'=>$user]);
        }
    }

    public function posicao($id){
        $user=User::find([$id]);
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
}