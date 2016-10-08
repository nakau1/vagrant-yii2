<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-default">
    <div class="panel-heading">基本情報</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <?php $form = ActiveForm::begin(); ?>

                <?=
                $form->field($model, 'screen_name')->textInput([
                    'placeholder' => $model->getAttributeHint('screen_name'),
                ])->hint('スクリーン名でログインすることもできます', [
                    'class' => 'help-block',
                ]);
                ?>
                <?=
                $form->field($model, 'name')->textInput([
                    'placeholder' => '40字以内',
                ])
                ?>
                <?= $form->field($model, 'email')->textInput([
                    'placeholder' => 'メールアドレス',
                ])->hint('ログインに使用します', [
                    'class' => 'help-block',
                ]);
                ?>
                <?= $form->field($model, 'password')->textInput([
                    'placeholder' => '6〜20字・英数字のみ',
                ])
                ?>
                <?=
                Html::submitButton(
                    $model->isNewRecord ? Yii::t('app', '作成') : Yii::t('app', '更新'),[
                    'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
                ])
                ?>
                <?= Html::a(Yii::t('app', 'キャンセル'), ['index'], ['class' => 'btn btn-default']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>