<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Package */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="package-form">

<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']
  ]); ?>


    
    
          
          <div class="col-md-10">
            <div class="row">
                <div class="col-md-2">
                  <div class="well text-center">
                <?= Html::img($model->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?>
                </div>
            </div>
          </div>
    <?= $form->field($model, 'photo')->fileInput() ?>

    <?= $form->field($model, 'pk_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pk_detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pk_value')->textInput() ?>

    <?= $form->field($model, 'pk_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sys_id')->textInput() ?>

    
    


    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'save') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
