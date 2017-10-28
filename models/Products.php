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
use app\models\Rings;
use yii;

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
    
    public function getProducts($category, $per_page, $sort, string $condition, $min_price, $max_price)
    {
        $sort = strtolower($sort) == 'date' ? 'timestamp' : $sort;
        $condition = empty($condition) ? null : explode('+', $condition);
        $query = new Query();
        $products = $query
            ->from($category)
            ->where(
                [
                    'and',
                    ['>', 'price', $min_price],
                    ['<', 'price', $max_price],
                    ['condition' => $condition],
                ])
            ->orderBy($sort);
        $products_count = clone $products;
        
        $pages = new Pagination([ 'totalCount' => $products_count->count() ]);
        $pages->setPageSize($per_page);
        
        $products = $products->offset($pages->offset)
                             ->limit($pages->limit)
                             ->all();
        
        return [ 'products' => $products, 'pages' => $pages ];
    }
    
    public function getPages()
    {
    
    }
}