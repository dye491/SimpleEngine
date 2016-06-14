<h1>Список пользователей</h1><div><table>
    <tr>
        <th>id_user</th>
        <th>user_login</th>
        <th>user_name</th>
        <th>is_active</th>
    </tr>
<?php
/**
 * instance of User class
 */

$m = $this->getModel();

$modelArray = $m::getAll();

foreach ($modelArray as $row) {
    $html .=  "<tr>";
    foreach($row as $column) {
        $html .=  "<td>$column</td>";
    }
    $html .= "</tr>";
};

$html .= "</table>";

echo $html;
?>

</div></table>
<div><form action="../User/Create/">
    <input type="submit" value="Добавить пользователя">
</form></div>