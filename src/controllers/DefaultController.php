<?php

namespace app\controllers;

use app\models\ActivateCardForm;
use app\models\ContactForm;
use app\models\Information;
use Yii;

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
