<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PackageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="package-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pk_id') ?>

    <?= $form->field($model, 'pk_name') ?>

    <?= $form->field($model, 'pk_detail') ?>

    <?= $form->field($model, 'pk_value') ?>

    <?= $form->field($model, 'pk_number') ?>

    <?php // echo $form->field($model, 'sys_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
