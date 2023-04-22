<?php

namespace app\controllers;

use Yii;
use yii\bootstrap\ActiveForm;
use yii\web\Controller;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use app\models\calculate\CalculatedForm;
use app\models\repositories\DataRepository;
use app\models\user\Request;


/**
 * HomeController отвечает за работу калькулятором доставки
 */
class RepairController extends Controller
{
        /**
     * @inheritdoc
     */
    // public function behaviors()
    // {
    //     return[
    //         'verbs' => [
    //             'class' => \yii\filters\VerbFilter::class,
    //             'actions' => [
    //                 'feedback' => ['POST'],
    //                 'index' => ['GET','POST'],
    //             ],
    //         ],
    //         [
    //             'class' => \yii\filters\AjaxFilter::class,
    //             'only' => ['feedback'],
    //         ],
    //     ];
    // }

    public function actionIndex() 
    {
        return $this->render('index', [
            'message' => 'Привет мир!'
        ]);
    }
}