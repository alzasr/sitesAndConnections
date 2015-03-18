<?php
/* @var $this ProjectController */
/* @var $project Project */
/* @var $type ConnectionType */
?>
<h1><?= $type ?> для проекта <?= $project ?></h1>
<div>
    <h2>Подключенные</h2>
    <table>
        <?php foreach ($type->getConnectionsByProject($project) as $connection) { ?>
            <tr><th><?= $connection ?> <a href="<?= $this->createUrl('removeConnection', array('project_id' => $project->id, 'connection_type_id' => $type->id, 'connection_id' => $connection->id)) ?>"><span class="glyphicon glyphicon-minus"></span></a></th></tr>
        <?php } ?>
    </table>
</div>
<div>
    <h2>Неподключенные</h2>
    <table>
        <?php foreach ($type->getConnections() as $connection) { ?>
            <tr>
                <th><?= $connection ?> <a href="<?= $this->createUrl('appendConnection', array('project_id' => $project->id, 'connection_type_id' => $type->id, 'connection_id' => $connection->id)) ?>"><span class="glyphicon glyphicon-plus"></span></a></th>
            </tr>
        <?php } ?>
    </table>

</div>
