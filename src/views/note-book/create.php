<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NoteBook */

$this->title = 'Create Note Book';
$this->params['breadcrumbs'][] = ['label' => 'Note Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="note-book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
