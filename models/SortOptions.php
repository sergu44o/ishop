<?php


namespace app\models;

use Yii;

final class SortOptions
{
    private $category;
    private $per_page;
    private $sort;
    private $condition;
    private $min_price;
    private $max_price;
    
    private static $_instance;
    
    private function __construct()
    {
        $request = Yii::$app->request;
        $this->category = $request->get('action');
        $this->per_page = $request->get('per-page') ?? 9;
        $this->sort = strtolower($request->get('sort') ?? 'popularity');
        $this->condition = strtolower($request->get('condition')) ?? '';
        $this->min_price = $request->get('minprice') ?? '0';
        $this->max_price = $request->get('maxprice') ?? '500';
    }
    
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
    
    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }
    
    public function __get($name)
    {
        return isset($this->$name) ? $this->$name : null;
    }
    
    public static function init()
    {
        if (static::$_instance === null) {
            static::$_instance = new static();
        }
        
        return static::$_instance;
    }
    
    public function getCategory()
    {
        return $this->category;
    }
    
    public function getPagesize()
    {
        return $this->per_page;
    }
    
    public function getSort()
    {
        return $this->sort;
    }
    
    public function getCondition()
    {
        return $this->condition;
    }
    
    public function getMaxprice()
    {
        return $this->max_price;
    }
    
    public function getMinprice()
    {
        return $this->min_price;
    }
}