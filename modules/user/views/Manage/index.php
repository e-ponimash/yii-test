<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php
        $columnModel = [
            'id',
            'email',
            'username'
        ];
        echo Yii::$app->user->can('updateUser');

        if (Yii::$app->user->can('updateUser')){
            $columnAction = [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}'
            ];
            array_push($columnModel, $columnAction);
        }

        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => $columnModel,
        ]);
    ?>


</div>
