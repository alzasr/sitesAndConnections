<?php
/* @var $this ProjectController */
/* @var $connection SiteConnection */
$formModel = $connection->getFormModel()
?>
<tr>
    <td><?= $connection ?></td>
    <?php foreach ($formModel->getAttributes() as $attribute => $value) { ?>
        <td><?= $value ?></td>
    <?php } ?>
</tr>