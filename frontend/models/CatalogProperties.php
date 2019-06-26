<?php
namespace frontend\models;


use common\models\CatalogProperties as CommonPropsModel;

class CatalogProperties extends CommonPropsModel
{

    public function getByProductId($id)
    {
        $oneProdProps = CatalogProperties::find()->where(['in', 'product_id', $id])->all();
        return $oneProdProps;
    }

}
?>