<?php

/**
 * @property boolean $isPost
 */
class Controller extends CController
{

    public function init()
    {
        if(Yii::app()->request->isAjaxRequest){
            $this->layout = false;
        }
        return parent::init();
    }

    public function filters()
    {
        return array(
//            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array(
                'deny',
                'users' => array('*'),
            ),
        );
    }

    public static function getTextForMenu($action)
    {
        return '';
    }

    public function redirectReturnUrl()
    {
        $this->redirect($this->getReturnUrl());
    }

    public function getReturnUrl($onlyPost = false)
    {
        $returnUrl = Yii::app()->request->getParam('return_url');
        if ($onlyPost) {
            return $returnUrl;
        }
        if (empty($returnUrl)) {
            $returnUrl = Yii::app()->request->urlReferrer;
        }
        if (empty($returnUrl)) {
            $returnUrl = $this->createUrl('index');
        }
        return $returnUrl;
    }

    public function actionSetPageSize($size)
    {
        $size = (int) $size;
        if ($size > 0) {
            Yii::app()->user->setState('controller_pageSize', $size, $this->_defaultPageSize);
        }
        $this->redirectReturnUrl();
    }

    private $_defaultPageSize = 20;
    private $_pageSize;

    public function getPageSize()
    {
        if (empty($this->_pageSize)) {
            $this->loadPageSize();
        }
        return $this->_pageSize;
    }

    public function setPageSize($size)
    {
        $this->_pageSize = $size;
    }

    private function loadPageSize()
    {

        $this->_pageSize = Yii::app()->user->getState('controller_pageSize');
        if (is_null($this->_pageSize)) {
            $this->_pageSize = $this->_defaultPageSize;
        }
    }

    protected function getPaginator(CActiveRecord $model, CDbCriteria $criteria, $pageVar = 'page')
    {
        $count = $model->count($criteria);
        $pages = new CPagination($count);
        $pages->pageVar = $pageVar;
        $pages->pageSize = $this->getPageSize();
        $pages->applyLimit($criteria);
        return $pages;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return Yii::app()->user->model;
    }

    /**
     * @return User
     */
    public function getTopUser()
    {
        $user = Yii::app()->user->model; /* @var $user User */
        if ($user->user_group_id == UserGroup::getUserRoleCode()) {
            return $user;
        }
        return $user->parent;
    }

    public function getParam($name, $defaultValue = null)
    {
        return Yii::app()->request->getParam($name, $defaultValue);
    }

    public function updateAttributesFromPost(CModel $model,$safeOnly = true){
        $model->setAttributes($this->getParam(get_class($model),array()), $safeOnly);
    }

    public function editActiveRecordFromForm(CActiveRecord $model, CFormModel $form){
        $this->updateAttributesFromPost($form);
        if($form->validate()){
            $model->attributes = $form->attributes;
            $model->save();
            $form->addErrors($model->errors);
        }
        return empty($form->errors);
    }

}
