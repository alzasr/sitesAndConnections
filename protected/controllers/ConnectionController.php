<?php

class ConnectionController extends Controller
{

    private $_connectionType;
    private $_connection;

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionCreate($connection_type_id)
    {
        $this->createFromPost();
        $this->render('create', array('type' => $this->getConnectionType()));
    }

    private function createFromPost()
    {
        if (Yii::app()->request->isPostRequest) {
            $type = $this->getConnectionType();
            $form = $type->getConnectionModel()->getFormModel(); /* @var $form ActiveRecordForm */
            $this->updateAttributesFromPost($form, false);
            $connection = $form->create(); /* @var $connection SiteConnection */
            $this->redirect($this->createUrl('index'));
            $this->redirect($this->createUrl('view', array('connection_type_id' => $type->id, 'conection_id' => $connection->id)));
        }
    }

    public function actionEdit($connection_type_id, $connection_id)
    {
        $this->editFromPost();
        $this->render('edit', array('type' => $this->getConnectionType(), 'connection' => $this->getConnection()));
    }

    private function editFromPost()
    {
        if (Yii::app()->request->isPostRequest) {
            $type = $this->getConnectionType();
            $form = $type->getConnectionModel()->getFormModel(); /* @var $form ActiveRecordForm */
            $connection = $this->getConnection();
            $form->setModel($connection);
            $this->updateAttributesFromPost($form, false);
            $form->update(); /* @var $connection SiteConnection */
            $this->redirect($this->createUrl('edit', array('connection_type_id' => $type->id, 'conection_id' => $connection->id)));
        }
    }

    /**
     * @return ConnectionType
     */
    public function getConnectionType()
    {
        if (empty($this->_connectionType)) {
            $this->_connectionType = ConnectionType::model()->findByPk($this->getParam('connection_type_id'));
        }
        return $this->_connectionType;
    }

    public function getConnection()
    {
        if(empty($this->_connection)){
            $this->_connection = $this->getConnectionType()->getConnectionModel()->findByPk($this->getParam('connection_id'));
        }
        return $this->_connection;
    }

}
