<?php
namespace common\models;


use yii\db\ActiveRecord;


class CatalogPictures extends ActiveRecord
{

    public static function getImagesById($id)
    {
        $images = CatalogPictures::find()->where(['product_id' => $id])->all();
        return $images;
    }

    public static function getNewImagesModel()
    {
        $images = new CatalogPictures();
        return $images;
    }


    public static function tableName(){
        return 'catalog_pictures';
    }


}
?>