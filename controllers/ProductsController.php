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
        $per_page = $request->get('per-page') ?? 9;
        $sort = strtolower($request->get('sort') ?? 'popularity');
        $condition = strtolower($request->get('condition')) ?? '';
        $min_price = $request->get('minprice') ?? '0';
        $max_price = $request->get('maxprice') ?? '500';

        $model = new Products();
        $array = $model->getProducts($category, $per_page, $sort, $condition, $min_price, $max_price);
    
    
        return $this->render('index', ['array' => $array, 'category' => $category, 'per_page' => $per_page, 'sort' => $sort, 'condition' => $condition]);
    }
}