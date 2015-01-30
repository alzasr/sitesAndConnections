<?php
/* @var $this SiteController */
/* @var $projects \Project[] */
$this->pageTitle = 'Проекты Binet.pro';
?>

<a href="<?= $this->createUrl('create') ?>" class="btn btn-primary pull-right">Создать</a>
<h1>Проекты</h1>

<table class="table">
    <tr>
        <th>#</th>
        <th>Название</th>
        <th>Интернет адрес</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($projects as $i => $project) { ?>
        <tr>
            <td><?= $i+1 ?></td>
            <td><a href="<?= Yii::app()->createUrl('project/edit',array('project_id'=>$project->id)) ?>"><?= $project ?></a></td>
            <td><a href="<?= $project->url ?>" target="_blank"><?= $project->url ?> <span class="glyphicon glyphicon-new-window"></span></a></td>
            <td><a href="<?= Yii::app()->createUrl('project/edit',array('project_id'=>$project->id)) ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
        </tr>
    <?php } ?>
</table>