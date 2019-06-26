<?php
namespace frontend\models;


use yii\db\ActiveRecord;
use common\models\Brands as CommonBrandsModel;

class Brands extends CommonBrandsModel
{

    public static function brandsForIndexPage()
    {
        $allBrands = Brands::getAllBrands();

        $brandsCount = count($allBrands);
        $brands = array();
        $counter = 0;

        for($i = 1; $i <= $brandsCount; $i++)
        {
            $brands[$counter][] = $allBrands[$i-1];

            if(!($i%3))
            {
                $counter ++;
            }
        }

        return $brands;
    }

}
?>