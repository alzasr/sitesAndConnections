<?php

use Redmine\Client;
include_once 'autoload.php';
class RedmineClient extends Client
{

    /**
     * @return \Redmine\Api\Project
     */
    public function getProjectApi(){
        return parent::api('project');
    }
}
