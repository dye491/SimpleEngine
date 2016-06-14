<?php
/**
 * Created by PhpStorm.
 * User: yuri
 * Date: 09.06.2016
 * Time: 19:53
 */

namespace SimpleEngine\Controller;


use SimpleEngine\Model\User;

class UserController extends BasicController
{
    public function __construct()
    {
        $this->model = new User();
    }

    public function actionIndex() {
        echo $this->render("index");
    }

    public function actionCreate() {
        echo $this->render("create");
    }

    public function getModelName()
    {
        // TODO: Implement getModelName() method.
        return "User";
    }
}