<?php

class Iva extends ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('percentagem'),
        array('descricao'),
    );
    static $has_many = array(
        array('produtos')
    );

}