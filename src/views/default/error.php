<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>
    <div class="alert alert-info">
        <p>
            <?= Html::encode($exception->getFile()) ?> Line: <?= $exception->getLine() ?>
        </p>
        <p>
            <?= nl2br(Html::encode($exception->getTraceAsString())) ?>
        </p>
    </div>
</div>
