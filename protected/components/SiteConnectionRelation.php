<?php

abstract class SiteConnectionRelation extends ActiveRecord
{

    abstract public function getConnectionIdFieldName();

    public function getProjectIdFieldName()
    {
        return 'project_id';
    }

    /**
     * Метод поиска подключений для проекта по умолчанию
     * требует связь с проектом по полю project_id и наличие связи connection
     * @return \SiteConnection[]
     */
    public function findConnectionsByProject(\Project $project)
    {
        $connections = array();
        $relations = $this->with('connection')->findAllByAttributes(array($this->getProjectIdFieldName() => $project->id));
        foreach ($relations as $relation) { /* @var $relation WebAdminProject */
            $connections[] = $relation->connection;
        }
        return $connections;
    }

    public function connect(Project $project, SiteConnection $connection)
    {
        $relation = $this->findByProjectAndConnection($project, $connection);
        if (!empty($relation)) {
            return true;
        }
        $relation = new static;
        $relation->setConnectionId($connection->getId());
        $relation->setProjectId($project->id);
        return $relation->save();
    }

    public function disconnect(Project $project, SiteConnection $connection)
    {
        $relation = $this->findByProjectAndConnection($project, $connection);
        if (empty($relation)) {
            return true;
        }
        return $relation->delete();
    }

    public function findByProjectAndConnection(Project $project, SiteConnection $connection)
    {
        return $this->findByAttributes(array(
                    $this->getProjectIdFieldName() => $project->id,
                    $this->getConnectionIdFieldName() => $connection->getId()
        ));
    }

    public function setProjectId($project_id)
    {
        $idField = $this->getProjectIdFieldName();
        $this->{$idField} = $project_id;
    }

    public function setConnectionId($connection_id)
    {
        $idField = $this->getConnectionIdFieldName();
        $this->{$idField} = $connection_id;
    }

}
