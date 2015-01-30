<?php
/* @var $this ConnectionController */
/* @var $type ConnectionType */
$connectionModel = $type->getConnectionModel();
$formModel = $connectionModel->getFormModel();
?>
<h1>Создание подключения типа <?= $type ?></h1>

<?php $form = $this->beginWidget('CActiveForm'); /* @var $form CActiveForm */ ?>
<table class="table">
    <?php    foreach ($formModel->getAttributes() as $attribute => $value) {                ?>

        <tr><th><?= $formModel->getAttributeLabel($attribute) ?></th><td><?= $form->textField($formModel, $attribute) ?></td></tr>
    <?php } ?>
    <tr><th><input type="submit" class="btn" value="Создать"/></th><td></td></tr>
</table>
<?php
$this->endWidget();
