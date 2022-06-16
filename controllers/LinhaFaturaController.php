<?php

class LinhaFaturaController extends BaseAuthController
{
    //Os funcionários e os administradores tem as mesmas funções neste controlador enquanto os clientes não podem aceder
    public function  __Construct__()
    {
        $this->loginFilterbyRole(['funcionario','administrador']);
    }

    //Criação de uma linha de fatura
    public function create($idFatura)
    {
        //$this->loginFilterByRole(['admin','funcionario']);
        $fatura = Fatura::find([$idFatura]);
        $empresa = Empresa::find([2]);

        $this->makeView('linhafatura','create',['fatura'=>$fatura],['empresa'=>$empresa]);
    }

    //Guardar os dados de uma linha de fatura
    public function store($idFatura,$idProduct)
    {
            //gravar Linhafatura
            //redirect->Linhafatura/create(idFatura)
        $linhafatura=new Linhafatura();
        $produto= Produto::find([$idProduct]);
        $fatura =Fatura::find([$idFatura]);
        if(isset($_POST['quantidade'])){
            $linhafatura->quantidade =$_POST['quantidade'];
        }
        else{
            $linhafatura->quantidade =1;
        }
        $linhafatura->valorunitario =$produto->preco;
        $linhafatura->valoriva =$produto->preco*($produto->iva->percentagem/100);
        $linhafatura->taxaiva=$produto->iva->percentagem;
        $linhafatura->fatura_id =$idFatura;
        $linhafatura->produto_id =$idProduct;

        if($linhafatura->is_valid()){
            $linhafatura->save();
            $this->redirectToRoute('linhafatura','create&idf='.$idFatura);
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