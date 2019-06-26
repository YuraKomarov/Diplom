<?php
namespace common\models;


use yii\db\ActiveRecord;

class Banners extends ActiveRecord
{

    public $image;


    public static function getAllBanners()
    {
        $banners = Banners::find()->all();
        return $banners;
    }

    public static function tableName(){
        return 'main_banners';
    }


}
?>