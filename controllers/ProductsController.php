<?php


namespace app\controllers;


use app\models\Products;
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
        $request = Yii::$app->request;
        $category = $request->get('action');

        $model = new Products();
        $array = $model->getProducts($category);
    
        return $this->render('index', ['array' => $array, 'category' => $category]);
    }
}