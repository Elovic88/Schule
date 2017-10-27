<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 26.10.2017
 * Time: 15:02
 */

class Subject
{
    public $id;
    public $name;
    public $class_id;

    function __construct($id, $name, $class_id) {
        $this->id = $id;
        $this->name = $name;
        $this->class_id = $class_id;
    }
}