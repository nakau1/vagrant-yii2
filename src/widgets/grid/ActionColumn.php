<?php

namespace app\widgets\grid;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
//use yii\grid\ActionColumn;

/**
 * Class ActionColumn
 * @package app\widgets\grid
 */
class ActionColumn extends \yii\grid\ActionColumn
{
    protected function initDefaultButtons()
    {
        if (!isset($this->buttons['view'])) {
            $this->buttons['view'] = function ($url, $model, $key) {
                return $this->makeButton($url, 'success', 'search', '閲覧');
            };
        }

        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model, $key) {
                return $this->makeButton($url, 'primary', 'pencil', '編集');
            };
        }

        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model, $key) {
                return $this->makeButton($url, 'danger', 'trash-o', '削除', [
                    'data-confirm' => '削除してもよろしいですか?',
                    'data-method' => 'post',
                ]);
            };
        }
    }

    private function makeButton($url, $btnClass, $glyphicon, $text, $additionalOptions = [])
    {
        $options = array_merge([
            'title' => $text,
            'class' => 'btn btn-circle btn-'. $btnClass,
            'data-pjax' => '0',
        ], $additionalOptions);
        $options = array_merge($options, $this->buttonOptions);
        return Html::a('<i class="fa fa-'. $glyphicon .'"></i>', $url, $options);
    }
}