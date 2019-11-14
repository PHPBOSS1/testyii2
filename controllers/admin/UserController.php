<?php

namespace app\controllers\admin;

use app\controllers\AppController;

class UserController extends AppController
{

    public function actionIndex(){
//        return 'php';
        return $this->render('index');
    }

}