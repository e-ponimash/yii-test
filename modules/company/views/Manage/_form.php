<?php
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">
    <?php $form = ActiveForm::begin(['id' => 'companyForm']); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'director')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'INN')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
    <?php ActiveForm::end(); ?>
</div>
