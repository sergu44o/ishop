<?php
/**
 * Created by PhpStorm.
 * User: Serg
 * Date: 02.08.2017
 * Time: 17:54
 */

namespace app\models;


use yii\db\ActiveRecord;

class Rings extends ActiveRecord
{
    public static function tableName(){
        return '{{Rings}}';
    }
    
    public static function upd(){
        $rings = Rings::find()->all();
        foreach ($rings as $ring)
        {
            $rand = rand(0, 100);
            $ring->popularity = $rand;
            $ring->save();
        }
        
    }
}