<?php

class LinhaFatura extends ActiveRecord\Model
{
    static $belongs_to = array(
        array('fatura')
    );
}