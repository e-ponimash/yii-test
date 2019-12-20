<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\BaseYii;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'tableOptions' => [
        'class' => 'table table-striped'
    ],
    'columns' => [
        'name',
        'director',
        'INN',
        'address',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {delete}',
            'buttons' => [
                'delete' => function ($url, $model) {
                    if( Yii::$app->user->can('updateCompany') ) {
                        return Html::a(
                            Yii::t('yii', 'Delete'), '#',
                            [
                                'title' => Yii::t('yii', 'Delete'),
                                'data-item' => Yii::t('yii', 'Delete'),
                                'onclick' => "CompanyDelete(" . $model->id . "); return false;",
                            ]);
                    }else{
                        return "";
                    }
                },
            ],
        ],
    ],
]);
?>