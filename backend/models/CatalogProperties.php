<?php
namespace backend\models;


use yii\db\ActiveRecord;
use common\models\CatalogProperties as CommonCatPropsModel;


class CatalogProperties extends CommonCatPropsModel
{

    public function updateOneRecord($recordId, $value)
    {
        CatalogProperties::updateAll(['value' => $value], ['=', 'id', $recordId]);
    }

    public static function insertOneRecord($propId, $productId, $value)
    {
        $newValueModel = new CatalogProperties();

        $newValueModel ->prop_id = $propId;
        $newValueModel ->product_id = $productId;
        $newValueModel ->value = $value;

        $newValueModel ->save();
    }

    public static function tableName(){
        return 'catalog_props';
    }
    function rules()
    {
        return [
            [['prop_id', 'product_id', 'value'], 'safe'],
        ];
    }

}
?>