<?php
namespace frontend\models;


use yii\db\ActiveRecord;
use common\models\Catalog as CommonCatalogModel;


class Catalog extends CommonCatalogModel
{


    public static function allIdsAsArray($model)
    {
        $ids = array();
        if($model)
        {
            foreach ($model as $oneRecord)
            {
                $ids[] = $oneRecord->id;
            }
        }
        return $ids;
    }


    public static function tableName(){
        return 'catalog';
    }


}
?>