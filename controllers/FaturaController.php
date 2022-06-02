<?php

class FaturaController
{
    public function index()
    {
        $this->loginFilterByRole(['admin','funcionario']);
        $faturas = faturas::All();

        $this->makeView('fatura','index',['faturas'=>$faturas]);

    }

    public function create()
    {
        $this->loginFilterByRole(['admin','funcionario']);
        $this->makeView('fatura','create');

    }

    public function store($idclient)
    {
        //criar fatura
        // redirect-> linhafatura/create+idfatura

    }

    public function selectClient($searchFilter)
    {

    }

    public function delete($idfatura)
    {
        //coluna estado da fatura = anulada
    }

}