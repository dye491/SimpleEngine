<?php
use SimpleEngine\Controller\RequestController;

if(!empty(RequestController::_post('create','s'))) {
    $m = $this->getModel();
    if($m::Create())
    echo "Пользователь " . RequestController::_post('user_login','s') . " успешно создан!";
}
?>
<h1>Создание нового пользователя</h1>
<form action="../Create/" method="post">
    <table>
        <tr class="noborder">
            <td class="noborder">Логин:</td>
            <td class="noborder"><input type="text" name="user_login"></td>
        </tr>
        <tr class="noborder">
            <td class="noborder">Имя пользователя:</td>
            <td class="noborder"><input type="text" name="user_name"></td>
        </tr>
        <tr class="noborder">
            <td class="noborder">Пароль:</td>
            <td class="noborder"><input type="password" name="password"></td>
        </tr>
        <tr class="noborder">
            <td class="noborder">Подтвердите пароль:</td>
            <td class="noborder"><input type="password" name="repeat"></td>
        </tr>
    </table>
    <input type="submit" name="create" value="Создать">
</form>