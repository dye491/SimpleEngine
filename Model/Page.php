<?php
/**
 * Created by PhpStorm.
 * User: apryakhin
 * Date: 06.06.2016
 * Time: 15:50
 */

namespace SimpleEngine\Model;


class Page
{
    protected $user;

    function __construct()
    {
        $this->user = new User();
    }

    public function getUser(){
        return $this->user;
    }

    public function getArray() {
        return [
            0 => "This is the first paragraph",
            1 => "This is the second paragraph",
            2 => "This is the third paragraph",
        ];
    }
}