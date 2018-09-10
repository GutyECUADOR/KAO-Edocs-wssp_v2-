<?php
    @ob_start();
    session_start();
    require_once './config/global.php';
    require_once './core/controllers/mainController.php';
    require_once './core/models/EDocsClass.php';
    require_once './core/models/mainModel.php';
    require_once './core/controllers/loginController.php';
    require_once './core/models/loginModel.php';
    require_once './core/controllers/ajaxController.php';
    require_once './core/models/ajaxModel.php';

        $app = new controllers\mainController();
        $app->loadtemplate();
   