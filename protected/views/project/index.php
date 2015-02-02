<?php
/* @var $this SiteController */
/* @var $projects \Project[] */
$this->pageTitle = 'Проекты Binet.pro';
$connectionTypes = ConnectionType::model()->findAll(); /* @var $connectionTypes \ConnectionType */
?>

<a href="<?= $this->createUrl('create') ?>" class="btn btn-primary pull-right">Создать</a>
<h1>Проекты</h1>
<style>
    .http-code{
        border: 1px solid gray;
        border-radius: 3px;
        padding: 0px 4px;
    }
</style>

<table class="table statuses">
    <thead>
        <tr>
            <th>#</th>
            <th>Название</th>
            <?php foreach ($connectionTypes as $connectionType) { ?>
                <th><?= $connectionType ?></th>
            <?php } ?>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($projects as $i => $project) {
            ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><a href="<?= Yii::app()->createUrl('project/edit', array('project_id' => $project->id)) ?>"><?= $project ?></a></td>
                <?php foreach ($connectionTypes as $connectionType) { ?>
                    <td><?php $this->renderPartial('index_connection', array('connections' => $connectionType->getConnectionsByProject($project), 'type' => $connectionType)) ?></td>
                <?php } ?>
                <td>
                    <a href="<?= Yii::app()->createUrl('project/edit', array('project_id' => $project->id)) ?>"><span class="glyphicon glyphicon-edit"></span></a>
                    <a href="<?= $project->url ?>" target="_blank"><span class="glyphicon glyphicon-new-window"></span></a>
                    <?= ($code = $project->siteHelper->httpCode) != 200 ? '<span class="http-code code-'.$code.'">'.$code .'</span>' : '' ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>