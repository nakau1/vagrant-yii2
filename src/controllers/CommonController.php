<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\User;

/**
 * Class CommonController
 * @package app\controllers
 */
class CommonController extends Controller
{
    /** @var User */
    protected $user;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class'  => AccessControl::className(),
                'rules'  => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return ['error' => ['class' => 'yii\web\ErrorAction']];
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->user = Yii::$app->user->identity;
    }

    /**
     * @inheritdoc
     */
    public function render($view, $params = [])
    {
        // for layout
        Yii::$app->view->params['user'] = $this->user;

        // for content
        return parent::render($view, array_merge($params, [
            'user' => $this->user,
        ]));
    }
}