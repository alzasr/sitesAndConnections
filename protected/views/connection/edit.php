<?php
/* @var $this ConnectionController */
/* @var $type ConnectionType */
/* @var $connection SiteConnection */
$connectionModel = $type->getConnectionModel();
$formModel = $connectionModel->getFormModel();
$formModel->setModel($connection);
?>
<h1>Редактирование подключения "<?= $connection->getName() ?>" типа "<?= $type ?>"</h1>
<style>
    input[type=text],select{
        width: 90%;
    }
    select{
        border-width:1px;
        padding: 2px;
        height: 26px;
    }
</style>
<?php $form = $this->beginWidget('CActiveForm'); /* @var $form CActiveForm */ ?>
<table class="table">
    <?php foreach ($formModel->getAttributes() as $attribute => $value) { ?>
        <tr>
            <th><?= $formModel->getAttributeLabel($attribute) ?></th>
            <td><?php
                if ($connectionModel->enumItem($attribute)) {
                    echo $form->dropDownList($formModel, $attribute, $connectionModel->enumItem($attribute));
                } else {
                    echo $form->textField($formModel, $attribute);
                }
                ?>
            </td>
        </tr>
    <?php } ?>
    <tr><th><input type="submit" class="btn" value="Создать"/></th><td></td></tr>
</table>
<?php
$this->endWidget();
