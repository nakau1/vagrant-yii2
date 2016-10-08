<?php

namespace app\controllers;
use app\models\User;

/**
 * Class DefaultController
 * @package app\controllers
 */
class DefaultController extends CommonController
{
    /**
     * トップ画面
     * @return string
     */
    public function actionIndex()
    {
        $m = new User();
        return $this->render('index', [

        ]);
    }
}
