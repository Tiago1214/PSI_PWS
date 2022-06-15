<?php

class Produto extends ActiveRecord\Model
{
    static $belongs_to = array(
        array('iva')
    );
    static $has_many = array(
        array('linhafaturas')
    );

}