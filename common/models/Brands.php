<?php
namespace common\models;


use yii\db\ActiveRecord;

class Brands extends ActiveRecord
{

    public $image;


    public static function getAllBrands()
    {
        $brands = Brands::find()->all();
        return $brands;
    }

    public static function tableName(){
        return 'brands';
    }


}
?>