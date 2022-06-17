<?php

class User extends ActiveRecord\Model
{
    static $has_many = array(
        array('faturas')
    );

    static $validates_presence_of = array(
        array('username'),
        array('password'),
        array('email'),
        array('telefone'),
        array('nif'),
        array('morada'),
        array('codpostal'),
        array('localidade')
    );
}