<?php
use yii\helpers\Html;
use app\widgets\modal\modal;

/* @var $this yii\web\View */
/* @var $model app\Models\Company */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Компания', 'url' => ['index']];
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

    <div id="companyView">
        <?= $this->render('_view', ['model' => $model]) ?>
    </div>

    <?php
        if (Yii::$app->user->can('updateCompany')){
            echo modal::widget(['model' => $model]);
        }
    ?>

</div>
