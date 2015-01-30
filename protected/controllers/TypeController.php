<?php

class TypeController extends Controller
{

    public function actionIndex()
    {
        $types = ConnectionType::model()->findAll();
        $this->render('index', compact('types'));
    }

    public function actionCreate()
    {
        $typeForm = new ConnectionTypeForm();
        if (Yii::app()->request->isPostRequest) {
            $this->updateAttributesFromPost($typeForm, false);
            $type = $typeForm->create();
            $this->redirect($this->createUrl('view', array('connection_type_id' => $type->id)));
        }
        $this->render('create', compact('typeForm'));
    }

    public function actionView(){
        $typeForm = new ConnectionTypeForm();
        $typeForm->setModel($this->getType());
        $this->render('view',  compact('typeForm'));
    }

    public function getType(){
        return ConnectionType::model()->findByPk(Yii::app()->request->getParam('connection_type_id'));
    }

}
