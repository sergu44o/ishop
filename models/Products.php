<?php
/**
 * Created by PhpStorm.
 * User: Serg
 * Date: 02.08.2017
 * Time: 15:42
 */

namespace app\models;


use yii\base\Model;
use yii\db\Query;
use yii\data\Pagination;

class Products extends Model
{
    private $query;
    /*public function dbUpdate()
        {
            foreach (Rings::find()->each() as $ring){
                $timeRange = rand(1, 3600*24*365);
                $newTimestamp = (new Query())
                    ->select(["(NOW() - INTERVAL $timeRange SECOND) AS time"])
                    ->scalar();
                $update = Rings::findOne($ring['id']);
                $update->timestamp = $newTimestamp;
                $update->save();
            }
        
            return $update;
        }*/
    
    public function getProducts($category)
    {
        $query = new Query();
        $products = $query->from($category);
        $products_count = clone $products;
        
        $pages = new Pagination([ 'totalCount' => $products_count->count() ]);
        $pages->setPageSize(8);
        
        $products = $products->offset($pages->offset)
                             ->limit($pages->limit)
                             ->all();
        
        return [ 'products' => $products, 'pages' => $pages ];
    }
    
    public function getPages()
    {
    
    }
}