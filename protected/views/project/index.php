<?php
/* @var $this SiteController */
/* @var $projects \Project[] */
$this->pageTitle = 'Проекты Binet.pro';
$connectionTypes = ConnectionType::model()->findAll(); /* @var $connectionTypes \ConnectionType */
$cs = Yii::app()->getClientScript(); /* @var $cs CClientScript */
$cs->registerScriptFile('/vendor/jquery/jquery-1.4.3.min.js');
$cs->registerCssFile('/vendor/fancybox/jquery.fancybox-1.3.4.css');
$cs->registerScriptFile('/vendor/fancybox/jquery.fancybox-1.3.4.pack.js');
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
                <td><a href="<?= Yii::app()->createUrl('project/edit', array('project_id' => $project->id)) ?>" class="to-window"><?= $project ?></a></td>
                <?php foreach ($connectionTypes as $connectionType) { ?>
                    <td><?php $this->renderPartial('index_connection', array('connections' => $connectionType->getConnectionsByProject($project), 'type' => $connectionType)) ?></td>
                <?php } ?>
                <td>
                    <a href="<?= Yii::app()->createUrl('project/edit', array('project_id' => $project->id)) ?>"><span class="glyphicon glyphicon-edit"></span></a>
                    <a href="<?= $project->url ?>" target="_blank"><span class="glyphicon glyphicon-new-window"></span></a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    $(document).ready(function () {
        $(".to-window").fancybox({
            maxWidth: 800,
            maxHeight: 600,
            fitToView: false,
            width: '800px',
            height: '70%',
            autoSize: false,
            closeClick: false,
            openEffect: 'none',
            closeEffect: 'none'
        });
    });
</script>
<style>
    #fancybox-content{
        background-color: white;
    }
</style>