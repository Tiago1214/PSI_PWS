<?php

class Genre extends \ActiveRecord\Model
{

    static $has_many = array(
        array('book')
    );


}