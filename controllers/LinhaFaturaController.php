<?php

class LinhaFaturaController
{
    public function  __Construct__()
    {
        $this->loginFilterbyRole(['funcionario','administrador']);
    }
    public function index()
    {


    }

    public function create($idFatura)
    {
        $this->loginFilterByRole(['admin','funcionario']);
        $fatura = Fatura::find($idFatura);
        $this->makeView('linhafatura','create',['fatura'=>$fatura]);

    }

    public function store($idFatura,$idProduct)
    {
            //gravar LinhaFatura
            //redirect->LinhaFatura/create(idFatura)
        $linhafatura=new LinhaFatura();
        $produto= Produto::find($idProduct);
        $fatura =Fatura::find($idFatura);

        $linhafatura->quantidade =($_POST['quantidade']);
        $linhafatura->valorunitario =($_POST['quantidade'])*$produto->preco;
        $linhafatura->valoriva =(($_POST['quantidade'])*$produto->preco)*( ($produto->iva->percentagem)/100);
        $linhafatura->fatura_id =$idFatura;
        $linhafatura->produto_id =$idProduct;

        if($linhafatura->is_valid()){
            $linhafatura->save();
            $this->redirectToRoute('linhafatura','create',['fatura'=>$fatura]);
        } else {

            $this->redirectToRoute('linhafatura','create',['fatura'=>$fatura]);

        }
    }

    public function edit($idLinhaFatura)
    {

    }

    public function selectProduct($idFatura)
    {

    }
}