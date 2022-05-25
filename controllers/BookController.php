<?php

require_once ('./controllers/BaseController.php');
require_once ('./controllers/BaseAuthController.php');

class BookController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilter();
        $books = Book::All();

        $this->makeView('book','index',['books'=>$books]);
    }

    public function show($id)
    {
            $book = Book::find([$id]);
            if (is_null($book)) {

            } else {
                //mostrar a vista show passando os dados por parâmetro
                $this->makeView('book','show',['book'=>$book]);
            }


    }

    public function create()
    {
        $this->loginFilter();
        $genres = Genre::All();
        $this->makeView('book','create',['genres'=>$genres]);
    }

    public function store()
    {
        $this->loginFilter();

        $book = new Book($_POST);


        if($book->is_valid()){
            $book->save();
            $this->redirectToRoute('book','index');
        } else {
            $genres= Genre::All();
            $this->makeView('book','create',['book'=>$book],['genres'=>$genres]);

        }

    }

    public function edit($id)
    {
        $book = Book::find([$id]);
        $genres = Genre::All();
        if (is_null($book)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista edit passando os dados por parâmetro
            $this->makeView('book','edit',['book'=>$book],['genres'=>$genres]);


        }
    }

    public function update($id)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $book = Book::find([$id]);
        $book->update_attributes($_POST);
        if($book->is_valid()){
            $book->save();
            $this->redirectToRoute('book','index');
            //redirecionar para o index
        } else {
            $genres= Genre::All();
            $this->makeView('book','edit', ['book'=>$book],['genres'=>$genres]);

            //mostrar vista edit passando o modelo como parâmetro
        }
    }

    public function delete($id)
    {
        $book = Book::find([$id]);

        foreach ($book->chapters as $chapter)
        {
            $chapter->delete();
        }
        $book->delete();
        $this->redirectToRoute('book','index');

    }



}