<?php
namespace app\controllers;
use app\models\Package;
use yii\filters\ContentNegotiator;
use yii\rest\ActiveController;
use yii\web\Response;
class PackageJsonController extends ActiveController
{
    public $enableCsrfValidation = false;
    public function behaviors()
    {
        return [
            [
                'class' => ContentNegotiator::className(),
                'only' => ['index', 'view'],
                'formats' => [
                    'application/json' => Response::
FORMAT_JSON,
                ],
            ],
        ];
    }
    public $modelClass = 'app\models\Package';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
    public function actionPost()
{}}