<?php

abstract class SiteConnectionRelation extends ActiveRecord
{

    abstract function getConnectionIdFieldName();


    /**
     * Метод поиска подключений для проекта по умолчанию
     * требует связь с проектом по полю project_id и наличие связи connection
     * @return \SiteConnection[]
     */
    public function findConnectionsByProject(\Project $project)
    {
        $connections = array();
        $relations = $this->with('connection')->findAllByAttributes(array('project_id' => $project->id));
        foreach ($relations as $relation) { /* @var $relation WebAdminProject */
            $connections[] = $relation->connection;
        }
        return $connections;
    }

}
