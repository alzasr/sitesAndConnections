<?php

/* @var $this TypeController */
/* @var $typeForm ConnectionTypeForm */

?>
<h1>Создание типа подключения</h1>
<?php $form = $this->beginWidget('CActiveForm') /* @var $form CActiveForm */?>
<table class="table table-bordered">
    <tr>
        <th>Название</th>
        <td><?= $form->textField($typeForm, 'name') ?></td>
    </tr>
    <tr>
        <th>Название модели</th>
        <td><?= $form->textField($typeForm, 'model') ?></td>
    </tr>
</table>
<input type="submit" class="btn btn-success" />
<?php $this->endWidget() ?>

