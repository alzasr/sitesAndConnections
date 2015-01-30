<?php
/* @var $this TypeController */
/* @var $typeForm ConnectionTypeForm */
?>
<h1>Тип подключения <?= $typeForm->name ?></h1>
<table class="table table-bordered">
    <tr>
        <th>Название</th>
        <td><?= $typeForm->name ?></td>
    </tr>
    <tr>
        <th>Название модели</th>
        <td><?= $typeForm->model ?></td>
    </tr>
</table>

