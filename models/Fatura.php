<?php

class Fatura extends ActiveRecord\Model
{

    static $has_many = array(
        array('linhafaturas')
    );
}