<?php

class LinhaFaturaController extends BaseAuthController
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
        //$this->loginFilterByRole(['admin','funcionario']);
        $fatura = Fatura::find([$idFatura]);
        $empresa = Empresa::find([2]);

        $this->makeView('linhafatura','create',['fatura'=>$fatura],['empresa'=>$empresa]);

    }

    public function store($idFatura,$idProduct)
    {
            //gravar Linhafatura
            //redirect->Linhafatura/create(idFatura)
        $linhafatura=new Linhafatura();
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