<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PackageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Packages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="package-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Package', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'options'=>['style'=>'width:150px;'],
                'format'=>'raw',
                'attribute'=>'photo',
                'value'=>function($model){
                  return Html::tag('div','',[
                    'style'=>'width:150px;height:95px;
                              border-top: 10px solid rgba(255, 255, 255, .46);
                              background-image:url('.$model->photoViewer.');
                              background-size: cover;
                              background-position:center center;
                              background-repeat:no-repeat;
                              ']);
                }
            ],

            'pk_id',
            'pk_name',
            'pk_detail',
            'pk_value',
            'pk_number',
            

            ['class' => 'yii\grid\ActionColumn'],

            
        ],
    ]); ?>

    


</div>
