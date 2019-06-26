<?php
namespace frontend\models;


use yii\db\ActiveRecord;
use common\models\Categories as Commoncategories;


class Categories extends Commoncategories
{
        public function popularCats(){
            $popularNews = Categories::find()->where(['parentid' => null])->limit(4)->offset(1)->all();
            return $popularNews;
        }

}
?>