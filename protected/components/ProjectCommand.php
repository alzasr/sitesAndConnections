<?php

abstract class ProjectCommand extends CComponent{

    protected $sourceName;

    private $_project;

    final public function setProject(Project $project){
        $this->_project = $project;
    }

    /**
     * @return Project
     */
    final public function getProject(){
        return $this->_project;
    }

    abstract public function execute();

    abstract public function unexecute();

    public function checkSource(){
        return $this->getProject()->hasLocalObject($this->sourceName);
    }

}

