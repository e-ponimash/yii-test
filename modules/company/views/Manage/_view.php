<?php
use yii\widgets\DetailView;

echo DetailView::widget([
    'options' => [
        'class' => 'table table-striped'
    ],
    'model' => $model,
    'attributes' => [
        'id',
        'name',
        'director',
        'INN',
        'address',
    ],
]);
