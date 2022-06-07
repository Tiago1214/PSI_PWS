<?php

class Iva extends ActiveRecord\Model
{
    static $has_many = array(
        array('produto')
    );

}