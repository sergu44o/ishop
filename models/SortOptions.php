<?php


namespace app\models;

use Yii;

final class SortOptions
{
    private static $category;
    private static $per_page;
    private static $sort;
    private static $condition;
    private static $min_price;
    private static $max_price;
    private static $_instance;
    
    private function __construct() {
    }
    
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
    
    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }
    
    public static function getParams(){
        if (static::$_instance === null){
            static::$_instance = new static();
            $request = Yii::$app->request;
            static::$category = $request->get('action');
            static::$per_page = $request->get('per-page') ?? 9;
            static::$sort = strtolower($request->get('sort') ?? 'popularity');
            static::$condition = strtolower($request->get('condition')) ?? '';
            static::$min_price = $request->get('minprice') ?? '0';
            static::$max_price = $request->get('maxprice') ?? '500';
        }
        return static::$_instance;
    }
    
    public function getCategory(){
        return static::$category;
    }
    
    public function getPagesize(){
        return static::$per_page;
    }
    
    public function getSort(){
        return static::$sort;
    }
    
    public function getCondition(){
        return static::$condition;
    }
    
    public function getMaxprice(){
        return static::$max_price;
    }
    
    public function getMinprice(){
        return static::$min_price;
    }
}