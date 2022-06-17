<?php

class LinhaFaturaController extends BaseAuthController
{
    //Os funcionários e os administradores tem as mesmas funções neste controlador enquanto os clientes não podem aceder
    public function  __Construct__()
    {
        $this->loginFilterbyRole(['funcionario','administrador']);
    }

    //Criação de uma linha de fatura
    public function create($idFatura,$idProduct)
    {
        $fatura = Fatura::find([$idFatura]);
        $empresa = Empresa::find([2]);
        //$this->loginFilterByRole(['admin','funcionario']);
        if(!is_null($idProduct)) {
            $produto = Produto::find([$idProduct]);
            $this->makeView('linhafatura','create',['fatura'=>$fatura],['empresa'=>$empresa],['produto'=>$produto]);
        }else{
            $idProduct=null;
            $this->makeView('linhafatura','create',['fatura'=>$fatura],['empresa'=>$empresa],['produto'=>$idProduct]);
        }
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
            $this->redirectToRoute('linhafatura','create',['idf'=>$idFatura]);
        } else {

            $this->redirectToRoute('linhafatura','create',['idf'=>$idFatura]);

        }
    }

    //apagar linha de fatura
    public function delete($idLinhaFatura,$fatura)
    {
        $linhafatura = Linhafatura::find([$idLinhaFatura]);
        $linhafatura->delete();
        $this->redirectToRoute('linhafatura','create',['idf'=>$fatura]);

    }
    //mostrar vista para editar quantidade
    public function editquantidade($idfatura,$idlinhafatura){
        $linhafatura = Linhafatura::find([$idlinhafatura]);
        $empresa=Empresa::find([2]);
        $fatura=Fatura::find([$idfatura]);
        if(is_null($linhafatura)){
            $this->makeView('linhafatura','edit',['fatura'=>$fatura],['empresa'=>$empresa]);
        }
        else{
            $this->makeView('linhafatura','editquantidade',['linhafatura'=>$linhafatura]);
        }
    }
    //guardar quantidade
    public function guardarquantidade($idlinhafatura){
        $linhafatura = Linhafatura::find([$idlinhafatura]);
        $linhafatura->quantidade=$_POST['quantidade'];
        if($linhafatura->is_valid()){
            $linhafatura->save();
        }
        $this->redirectToRoute('fatura','edit',['idf'=>$linhafatura->fatura_id]);
    }
}