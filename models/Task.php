<?php

class Task extends ActiveRecord\Model
{
    static $belongs_to = array(
        array('user')
    );

}