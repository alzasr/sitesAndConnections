<?php

class ConnectionController extends Controller
{

    private $_connectionType;

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionCreate($connection_type_id)
    {
        $this->parsePost();
        $this->render('create', array('type' => $this->getConnectionType()));
    }

    private function parsePost()
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

}
