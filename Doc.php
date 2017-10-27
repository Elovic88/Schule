<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 25.10.2017
 * Time: 15:46
 */

class Doc
{
    public $id;
    public $name;
    public $subject;
    public $url;

    function __construct($id, $name, $subject, $url) {
        $this->id = $id;
        $this->name = $name;
        $this->subject = $subject;
        $this->url = $url;
    }
}