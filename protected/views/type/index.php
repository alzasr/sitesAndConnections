<?php
/* @var $this SiteController */
/* @var $types \ConnectionType[] */
$this->pageTitle = 'Проекты Binet.pro';
?>

<a href="<?= $this->createUrl('create') ?>" class="btn btn-primary pull-right">Создать</a>
<h1>Типы подключений</h1>

<table class="table">
    <tr>
        <th>#</th>
        <th>Название</th>
        <th>Модель</th>
    </tr>
    <?php foreach ($types as $i => $type) { ?>
        <tr>
            <td><?= $i+1 ?></td>
            <td><a href="<?= $this->createUrl('view',array('connection_type_id'=>$type->id)) ?>" ><?= $type->name ?></a></td>
            <td><?= $type->model ?></td>
        </tr>
    <?php } ?>
</table>