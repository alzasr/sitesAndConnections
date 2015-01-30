<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ProjectController extends Controller
{

    private $_project;

    public function actionIndex()
    {
        $projects = Project::model()->findAll();
        $this->render('index', compact('projects'));
    }

    public function actionCreate()
    {
        $projectForm = new ProjectForm();
        if (Yii::app()->request->isPostRequest) {
            $this->updateAttributesFromPost($projectForm, false);
            $project = $projectForm->create();
            $this->redirect($this->createUrl('edit', array('project_id' => $project->id)));
        }
        $this->render('create', compact('projectForm'));
    }

    public function actionEdit($project_id)
    {
        $project = $this->getProject();
        $projectForm = new ProjectForm();
        $projectForm->setModel($project);
        if (Yii::app()->request->isPostRequest) {
            $this->updateAttributesFromPost($projectForm, false);
            $projectForm->update();
            $this->redirect($this->createUrl('edit', array('project_id' => $project->id)));
        }
        $this->render('edit', compact('projectForm', 'project'));
    }

    public function actionEditConnectionList($project_id, $connection_type_id)
    {
        $type = $this->getConnectionType();
        $project = $this->getProject();
        $this->render('editConnectionList', compact('project', 'type'));
    }

    public function actionAppendConnection($project_id, $connection_type_id, $connection_id)
    {

    }

    /**
     * @return ConnectionType
     */
    private function getConnectionType()
    {
        return ConnectionType::model()->findByPk($this->getParam('connection_type_id'));
    }

    /**
     * @return Project
     */
    private function getProject()
    {
        if (empty($this->_project)) {
            $this->_project = Project::model()->findByPk($this->getParam('project_id'));
        }
        if (empty($this->_project)) {
            throw new CHttpException('Project not found', 500);
        }
        return $this->_project;
    }

}
