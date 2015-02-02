<?php
/* @var $this ProjectController */
/* @var $connection SiteConnection */
$formModel = $connection->getFormModel()
?>
<tr>
    <th>Название</th>
    <?php foreach ($formModel->getAttributes() as $attribute => $value) { ?>
    <th><?= $formModel->getAttributeLabel($attribute) ?></th>
    <?php } ?>
</tr>