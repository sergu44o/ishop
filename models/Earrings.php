<?php


namespace app\models;


use yii\db\ActiveRecord;

class Earrings extends ActiveRecord
{
    public static function upd(){
        $rings = Earrings::find()->all();
        foreach ($rings as $ring)
        {
            $rand = rand(0, 100);
            $ring->popularity = $rand;
            $ring->save();
        }
        
    }
}