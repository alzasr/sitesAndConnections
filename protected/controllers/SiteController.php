<?php

class SiteController extends Controller
{

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionError()
    {
        $error = Yii::app()->errorHandler->error;
        if ($error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                $this->render('error', $error);
            }
        }
    }

}
