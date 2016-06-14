<?php
/**
 * Created by PhpStorm.
 * User: apryakhin
 * Date: 06.06.2016
 * Time: 11:08
 */

namespace SimpleEngine\Model;

use SimpleEngine\Controller\DatabaseController;
use SimpleEngine\Controller\RequestController;

class User
{
    protected $id;
    protected $name;


    public function __construct($id = null)
    {
        $this->id = 1;
        $this->name = "Имя";
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public static function getAll()
    {
        return DatabaseController::connection()->queryFetchAllAssoc(
            "SELECT id_user, user_login, user_name, is_active FROM user"
        );
    }

    public static function validateCreateForm($user_login, $user_name, $password, $repeat)
    {
        $success = true;

        if (empty($user_login)) {
            echo "Укажите Логин!";
            $success = false;
        }
        if (empty($user_name)) {
            echo "Укажите Имя пользователя!";
            $success = false;
        }
        if (empty($password)) {
            echo "Укажите Пароль!";
            $success = false;
        }
        if (empty($repeat)) {
            echo "Подтвердите пароль!";
            $success = false;
        }
        if ($password != $repeat) {
            echo "Пароли не совпадают!";
            $success = false;
        }

        return $success;
    }

    public static function Create()
    {
        $result = false;
        $user_login = RequestController::_post('user_login', 's');
        $user_name = RequestController::_post('user_name', 's');
        $password = RequestController::_post('password', 's');
        $repeat = RequestController::_post('repeat', 's');
        if (self::validateCreateForm($user_login, $user_name, $password, $repeat)) {
            $sql = "INSERT INTO `user`(user_login, user_name, user_pass_hash, is_active) ";
            $sql .= "VALUES (:user_login, :user_name, :user_pass_hash, :is_active)";
            $result = DatabaseController::connection()->execute(
                $sql, [
                ':user_login' => $user_login,
                ':user_name' => $user_name,
                ':user_pass_hash' => md5($password),
                ':is_active' => true,
            ]);
        }
        return $result;
    }
}
