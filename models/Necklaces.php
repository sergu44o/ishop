<?php


namespace app\models;


use yii\db\ActiveRecord;

class Necklaces extends ActiveRecord
{
    public static function tableName(){
        return '{{Necklaces}}';
    }
    
    public static function upd(){
        $rings = Necklaces::find()->all();
        foreach ($rings as $ring)
        {
            $rand = rand(0, 100);
            $ring->popularity = $rand;
            $ring->save();
        }
        
    }
}