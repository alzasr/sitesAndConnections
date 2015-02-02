<?php

class MonitorController extends Controller
{

    public function actionIndex()
    {
        $projects = Project::model()->findAll();
        $this->render('index', compact('projects'));
    }

}
