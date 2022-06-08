<?php

class UserController extends BaseAuthController
{
    public function  __Construct__()
    {
        $this->loginFilterbyRole(['funcionario','admin']);
    }

    public function index()
    {

        $users = User::All();

        $this->makeView('user','index',['users'=>$users]);
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
        $user = User::find([$id]);
        $role=Auth::GetRole();
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
}