<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\searches\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $identification string */

use app\models\NoteBook;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\widgets\grid\ActionColumn;

$this->title = 'ノートブック';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="page-header"><?= $this->title ?></h1>
<div class="panel panel-default">
    <div class="panel-heading">一覧</div>
    <div class="panel-body">
        <?php Pjax::begin(); ?>
        <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    // 名前
                    [
                        'attribute' => 'name',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'col-xs-8'],
                        'value' => function(NoteBook $noteBook) {
                            return Html::a($noteBook->name, ['index', 'identification' => $noteBook->identification]);
                        },
                    ],
                    // 更新日時
                    [
                        'attribute' => 'updated_at',
                        'format' => ['date', 'y年M月d日 H時i分'],
                        'contentOptions' => ['class' => ''],
                    ],
                    // アクション
                    [
                        'class' => 'app\widgets\grid\ActionColumn',
                        'contentOptions' => ['class' => 'text-right'],
                        'urlCreator' => function($action, NoteBook $model, $key, $index) {
                            return Url::to([$action, 'identification' => $model->identification]);
                        },
                    ],
                ],
            ])
            ?>
        </div>
        <div class="well">
            <?=
            Html::a('新しくノートブックを作成', ['create', 'identification' => $identification], [
                'class' => 'btn btn-success btn-lg btn-block',
                'data-pjax' => '0',
            ]);
            ?>
        </div>
        <?php Pjax::end(); ?>
    </div>
</div>

