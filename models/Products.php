<?php
/**
 * @var $params \app\models\SortOptions
 */

namespace app\models;


use yii\base\Model;
use yii\db\Query;
use yii\data\Pagination;
use app\models\Rings;
use yii;

class Products extends Model
{
    public $list;
    public $pages;
    
    public function getProducts(SortOptions $params)
    {
        $sort = strtolower($params->getSort()) == 'date' ? 'timestamp' : $params->getSort();
        $condition = empty($params->getCondition()) ? null : explode('+', $params->getCondition());
        $query = new Query();
        $products = $query
            ->from($params->getCategory())
            ->where(
                [
                    'and',
                    ['>', 'price', $params->getMinprice()],
                    ['<', 'price', $params->getMaxprice()],
                    ['condition' => $condition],
                ])
            ->orderBy($sort);
        $products_count = clone $products;
    
        $this->pages = new Pagination([ 'totalCount' => $products_count->count() ]);
        $this->pages->setPageSize($params->getPagesize());
        
        $this->list = $products->offset($this->pages->offset)
                             ->limit($this->pages->limit)
                             ->all();
        
    }
}