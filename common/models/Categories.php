<?php
namespace common\models;


use yii\db\ActiveRecord;


class Categories extends ActiveRecord
{

    public function allCats()
    {
        $allCats = Categories::find()->all();
        return $allCats;
    }


    public static function tableName(){
        return 'categories';
    }


}
?>