<?php

/* @var $this yii\web\View */
/* @var $model app\models\User */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', '新規ユーザ作成');
?>
<div class="user-create">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
