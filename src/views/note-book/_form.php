<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NoteBook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="note-book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?=
        Html::submitButton($model->isNewRecord ? '作成' : '更新', [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
        ])
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

