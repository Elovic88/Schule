<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 26.10.2017
 * Time: 14:25
 */

class SchoolClass
{
    public $id;
    public $name;

    function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
}