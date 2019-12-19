<?php
use yii\widgets\DetailView;

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'name',
        'director',
        'INN',
        'address',
    ],
])
?>
