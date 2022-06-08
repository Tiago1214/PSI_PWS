<?php

class IvaController
{
    public function  __Construct__()
    {
        $this->loginFilterbyRole(['funcionario','admin']);
    }
}