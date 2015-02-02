<?php

/* @var $connections \SiteConnection[] */
/* @var $type \ConnectionType */
/* @var $this ProjectController */

switch (count($connections)) {
    case 0:
        break;
    case 1:
        if (file_exists(__DIR__ . '/../connections/' . lcfirst($type->model) . '.php')) {
            $this->renderPartial( 'application.views.connections.' . lcfirst($type->model) , array('connection' => $connections[0]));
        } else {
            echo $connections[0];
        }
        break;
    default :
        echo count($connections);
}