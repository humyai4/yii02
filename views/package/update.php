<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Package */

$this->title = 'Update Package: ' . $model->pk_id;
$this->params['breadcrumbs'][] = ['label' => 'Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pk_id, 'url' => ['view', 'id' => $model->pk_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="package-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
