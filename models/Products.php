<?php
/**
 * @var $params \app\models\SortOptions
 */

namespace app\models;


use yii\base\Model;
use yii\db\Query;
use yii\data\Pagination;

class Products extends Model
{
    public $list;
    public $pages;
    
    public function getProducts(SortOptions $params)
    {
        $sort = strtolower($params->sort) == 'date' ? 'timestamp' : $params->sort;
        $condition = empty($params->condition) ? null : explode('+', $params->condition);
        $query = new Query();
        $products = $query
            ->from($params->category)
            ->where(
                [
                    'and',
                    ['>', 'price', $params->min_price],
                    ['<', 'price', $params->max_price],
                    ['condition' => $condition],
                ])
            ->orderBy($sort);
        $products_count = clone $products;
    
        $this->pages = new Pagination([ 'totalCount' => $products_count->count() ]);
        $this->pages->setPageSize($params->per_page);
        
        $this->list = $products->offset($this->pages->offset)
                             ->limit($this->pages->limit)
                             ->all();
        
    }
}