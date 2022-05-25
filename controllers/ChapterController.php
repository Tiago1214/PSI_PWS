<?php

require_once ('./controllers/BaseController.php');
require_once ('./controllers/BaseAuthController.php');


class ChapterController extends BaseAuthController
{

    public function index($id)
    {
        $this->loginFilter();
        $book = Book::find([$id]);

        $this->makeView('chapter','index',['book'=>$book]);
    }

    public function create($id)
    {
        $this->loginFilter();
        $book = Book::find([$id]);
        $this->makeView('chapter','create',['book'=>$book]);
    }

    public function store()
    {
        $chapter = new Chapter($_POST);
        if($chapter->is_valid()){
            $chapter->save();
            $this->redirectToRoute('chapter','index',['id'=>$chapter->book_id]);
        } else {
            $this->makeView('chapter', 'create', ['chapter'=>$chapter]);
        }
    }



    public function edit($id)
    {
        $chapter = Chapter::find([$id]);

        if (is_null($chapter)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista edit passando os dados por parâmetro
            $this->makeView('chapter','edit',['chapter'=>$chapter]);


        }
    }

    public function update($id)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $chapter = Chapter::find([$id]);
        $chapter->update_attributes($_POST);
        if($chapter->is_valid()){
            $chapter->save();
            $this->redirectToRoute('chapter','index',['id'=>$chapter->book_id]);
            //redirecionar para o index
        } else {

            $this->makeView('chapter','edit', ['chapter'=>$chapter]);

            //mostrar vista edit passando o modelo como parâmetro
        }
    }

    public function delete($id)
    {
        $chapter = Chapter::find([$id]);
        $chapter->delete();
        $this->redirectToRoute('chapter','index',['id'=>$chapter->book_id]);

    }

}