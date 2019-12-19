<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\Company */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?php
$this->registerJsFile(
    'js/modalCompany.js',
    ['depends'=>'app\assets\AppAsset']
);
?>
<div class="company-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <p>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div id="companyView">
        <?= $this->render('_view', ['model' => $model]) ?>
    </div>

    <?php
        if (Yii::$app->user->can('updateCompany')){
           echo $this->render('_modal', ['model' => $model]);
        }
    ?>

</div>
