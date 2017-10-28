<?php


namespace app\controllers;


use app\models\Rings;
use app\models\Earrings;
use app\models\Necklaces;
use yii\web\Controller;
use Yii;

class ProductController extends Controller
{
    public function actionRings(){
        $id = Yii::$app->request->get('id');
        $product = Rings::find()
        ->where(['id' => $id])
        ->one();
        
        return $this->render('index', ['product' => $product, 'product_category' => 'rings']);
    }
    
    public function actionEarrings(){
        $id = Yii::$app->request->get('id');
        $product = Earrings::find()
        ->where(['id' => $id])
        ->one();
        
        return $this->render('index', ['product' => $product, 'product_category' => 'earrings']);
    }
    
    public function actionNecklaces(){
        $id = Yii::$app->request->get('id');
        $product = Necklaces::find()
        ->where(['id' => $id])
        ->one();
        
        return $this->render('index', ['product' => $product, 'product_category' => 'necklaces']);
    }
}