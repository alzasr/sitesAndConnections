<?php
/* @var $this ConnectionController */
?>
<h1>Подключения</h1>
<?php foreach (ConnectionType::model()->findAll() as $connectionType) { /* @var $connectionType ConnectionType */ ?>
    <div style='display: inline-block; margin-right: 10px' >
        <h2><?= $connectionType ?> <a href="<?= $this->createUrl('create', array('connection_type_id' => $connectionType->id)) ?>"><span class="glyphicon glyphicon-plus"></span></a></h2>
        <table>
            <?php foreach ($connectionType->getConnections() as $connection) { /* @var $connection SiteConnection */ ?>
                <tr>
                    <th><?= $connection ?></th>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php } ?>
