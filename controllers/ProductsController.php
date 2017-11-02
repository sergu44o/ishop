<?php


namespace app\controllers;


use app\models\Products;
use app\models\SortOptions;
use yii\web\Controller;
use yii;

class ProductsController extends Controller
{
    /**
     * Displays Products.
     *
     * @return string
     */
    public function actionIndex()
    {
        $params = SortOptions::init();
        
        $products = new Products();
        $products->getProducts($params);
    
        return $this->render('index', compact('params', 'products'));
    }
}