<?php

/* @var $this ProjectController */
/* @var $projectForm ProjectForm */

?>
<h1>Создание проекта</h1>
<?php $form = $this->beginWidget('CActiveForm') /* @var $form CActiveForm */?>
<table class="table table-bordered">
    <tr>
        <th>Название</th>
        <td><?= $form->textField($projectForm, 'name') ?></td>
    </tr>
    <tr>
        <th>Интернет адрес</th>
        <td><?= $form->textField($projectForm, 'url') ?></td>
    </tr>    
</table>
<input type="submit" class="btn btn-success" />
<?php $this->endWidget() ?>