<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\searches\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;

?>
<h1 class="page-header">ユーザ管理</h1>
<div class="panel panel-default">
    <div class="panel-heading">ユーザ一覧</div>
    <div class="panel-body">
        <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <?php Pjax::begin(); ?>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\CheckboxColumn'],
                    'id',
                    'screen_name',
                    'name',
                    'email',
                    'status',
                    'role',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ])
            ?>
            <?php Pjax::end(); ?>
        </div>
        <div class="well">
            <?=
                Html::a(Yii::t('app', '新しくユーザを作成'), ['create'], [
                    'class' => 'btn btn-success btn-lg btn-block',
                ]);
            ?>
        </div>
    </div>
</div>

