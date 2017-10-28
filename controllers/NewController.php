<?php


namespace app\controllers;


use yii\db\Query;
use yii\web\Controller;

class NewController extends Controller
{
    public function actionIndex(){
        $rings = new Query();
        $earrings = new Query();
        $necklaces = new Query();
        $products = array_merge(
            $rings
                ->from('rings')
                ->where(['condition' => 'new'])
                ->all(),
            $earrings
                ->from('earrings')
                ->where(['condition' => 'new'])
                ->all(),
            $necklaces
                ->from('necklaces')
                ->where(['condition' => 'new'])
                ->all());
        shuffle($products);
        
        
        return $this->render('index', ['products' => $products]);
    }
}