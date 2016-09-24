<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use app\models\forms\SignInForm;


class SignInController extends CommonController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    $this->goHome();
                },
            ],
        ];
    }

    /**
     * @return string|Response
     */
    public function actionIndex()
    {
        $signInForm = new SignInForm();

        if ($signInForm->load(Yii::$app->request->post()) && $signInForm->signIn()) {
            return $this->goHome();
        }


        $this->layout = 'sign-in';
        return $this->render('index', [
            'signInForm' => $signInForm,
        ]);
    }

    public function actionSignOut()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
