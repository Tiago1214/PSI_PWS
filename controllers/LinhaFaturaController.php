<?php

class LinhaFaturaController
{
    public function  __Construct__()
    {
        $this->loginFilterbyRole(['funcionario','admin']);
    }
    public function index()
    {

    }

    public function create($idFatura,$idProduct)
    {

    }

    public function store($idFatura)
    {
            //gravar LinhaFatura
            //redirect->LinhaFatura/create(idFatura)
    }

    public function edit($idLinhaFatura)
    {

    }

    public function selectProduct($idFatura)
    {

    }
}