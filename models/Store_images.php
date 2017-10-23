<?php

namespace app\models;

use yii\helpers\FileHelper;
use yii\base\Model;
use yii\db;

class Store_images extends Model
{
    public function getFiles()
    {
        $dirPath = 'E:\OpenServer\domains\internetshop.com.dev\web\images\rings';
        $files = FileHelper::findFiles($dirPath);
        foreach ($files as $key => $fFullPath){
            $price = rand(50,500);
            $fName = basename($fFullPath);
            $fRelPath = '/web/images/rings/'.$fName;
            $files[$key] = [$key, $fName, $fRelPath, $price];
//            $insert = \Yii::$app->db->createCommand()->update('rings',['file' => $fRelPath], ['id' => $key])->execute();
        }
        
        
        return $files;
    }
}
