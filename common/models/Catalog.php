<?php
namespace common\models;


use yii\db\ActiveRecord;


class Catalog extends ActiveRecord
{

    public function getProductsByParentId($id)
    {
        if($id)
        {
            $products = Catalog::find()->where(['parentid' => $id])->all();
        }
        else{
            $products = Catalog::find()->all();
        }

        return $products;
    }

    public function getAllProducts()
    {
        $products = Catalog::find()->all();
        return $products;
    }

    public function getAllProductsOrderByRate()
    {
        $products = Catalog::find()->orderBy(['rating' => SORT_DESC])->all();
        return $products;
    }


    public function getByID($id)
    {
        $oneProd = Catalog::findOne($id);
        return $oneProd;
    }

    public static function tableName(){
        return 'catalog';
    }


}
?>