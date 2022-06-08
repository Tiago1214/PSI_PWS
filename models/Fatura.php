<?php

class Fatura extends ActiveRecord\Model
{

    static $has_many = array(
        array('linhafaturas')
    );

    static $belongs_to = array(
        array('user'),
        array('cliente','class_name'=>'User','foreign_key'=>'cliente_id')
    );

}