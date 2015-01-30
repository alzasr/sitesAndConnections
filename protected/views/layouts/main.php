<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="ru" />
        <link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css" media="screen, projection" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
        <div class="container" id="page">
            <div id="header">
            </div>
            <div id="mainmenu">
                <ul class="nav nav-tabs">
                    <li role="presentation"><a href="<?= Yii::app()->createUrl('site/index') ?>">Главная</a></li>
                    <li role="presentation"><a href="<?= Yii::app()->createUrl('project/index') ?>">Проекты</a></li>
                    <li role="presentation"><a href="<?= Yii::app()->createUrl('connection/index') ?>">Подключения</a></li>
                </ul>

            </div>
            <div class="content">
                <?php echo $content; ?>
            </div>
            <div class="clear"></div>
            <div id="footer">
            </div>
        </div>
    </body>
</html>
