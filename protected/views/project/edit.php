<?php
/* @var $this ProjectController */
/* @var $projectForm ProjectForm */
/* @var $project Project */

$cs = Yii::app()->getClientScript(); /* @var $cs CClientScript */
$cs->registerScriptFile('/vendor/jquery/jquery-1.4.3.min.js', CClientScript::POS_HEAD);
$cs->registerScriptFile('/vendor/fancybox/jquery.fancybox-1.3.4.pack.js', CClientScript::POS_HEAD);
$cs->registerCssFile('/vendor/fancybox/jquery.fancybox-1.3.4.css');
?>
<h1><?= $project ?></h1>
<h2>Общая информация</h2>
<table class="table table-bordered">
    <tr>
        <th>Название</th>
        <td><?= $projectForm->name ?></td>
    </tr>
    <tr>
        <th>Внешний адрес</th>
        <td><a href="<?= $projectForm->url ?>" target="_blank"><?= $projectForm->url ?> <span class="glyphicon glyphicon-new-window"></span></a></td>
    </tr>
</table>

<h2>Подключения</h2>
<?php foreach (ConnectionType::model()->findAll() as $connectionType) { /* @var $connectionType ConnectionType */ ?>
    <h3><?= $connectionType ?>
        <a href="<?= $this->createUrl('editConnectionList', array('project_id' => $project->id, 'connection_type_id' => $connectionType->id)) ?>"><span class="glyphicon glyphicon-plus" style="font-size: 18px"></span></a>
    </h3>
    <?php $connections = $connectionType->getConnectionsByProject($project); ?>
    <?php if (is_array($connections) && count($connections) > 0) { ?>
        <table class="table">
            <?php $this->renderPartial('edit_connectionHeader', array('connection' => $connections[0])) ?>
            <?php foreach ($connections as $connection) { ?>
                <?php $this->renderPartial('edit_connectionRow', compact('connection')) ?>
            <?php } ?>
        </table>
    <?php } ?>
<?php } ?>
