<?php
namespace common\models;


use yii\db\ActiveRecord;
use common\models\Properties;

class CatalogProperties extends ActiveRecord
{



    public function getProperty()
    {
        return $this->hasOne(Properties::className(), ['prop_id' => 'prop_id']);
    }

    public function getByProductId($id)
    {
        $oneProdProps = CatalogProperties::find()->where(['product_id' => $id])->all();
        return $oneProdProps;
    }

    public static function tableName(){
        return 'catalog_props';
    }


}
?>