<?php

namespace app\controllers;

/**
 * Class DefaultController
 * @package app\controllers
 */
class DefaultController extends CommonController
{


    /**
     * 15. トップ画面
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [

        ]);
    }
}
