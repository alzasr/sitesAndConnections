<?php

class ProjectForm extends ActiveRecordForm
{

    public $name;
    public $url;

    public function getModelClassName()
    {
        return 'Project';
    }

}
