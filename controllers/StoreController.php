<?php


namespace app\controllers;


use app\models\Products;
use yii\web\Controller;

class StoreController extends Controller
{
    public function actionIndex()
    {
        $model = new Products();
        
        echo '<pre>';
        print_r($model->dbUpdate());
    }
}