<?php
use yii\helpers\Html;
use app\widgets\modal\modal;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile(
    'js/modalCompany.js',
    ['depends'=>'app\assets\AppAsset']
);
?>
<div class="company-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    if (Yii::$app->user->can('updateCompany')){
        echo modal::widget(['model' => null]);
    }
    ?>
    <div id="companyView">
        <?= $this->render('_list', ['dataProvider' => $dataProvider]) ?>
    </div>
</div>
