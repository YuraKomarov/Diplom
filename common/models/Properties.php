<?php
namespace common\models;


use yii\db\ActiveRecord;


class Properties extends ActiveRecord
{

    public static function tableName(){
        return 'properties';
    }


}
?>