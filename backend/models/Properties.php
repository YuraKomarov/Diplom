<?php

namespace backend\models;


use yii\db\ActiveRecord;
use common\models\Properties as BasePropModel;
use backend\models\CatalogProperties;
use Yii;

class Properties extends BasePropModel
{


    public function oneCatProps($catId)
    {
        $oneCatProps = Properties::find()->where(['cat_id' => $catId])->all();
        return $oneCatProps;

    }

    public function getOneCatEmptyProps($catId, $prodId)
    {
        $existProps = CatalogProperties::find()->select('prop_id')->where(['product_id' => $prodId])->all();
        $oneCatProps = Properties::find()->where(['cat_id' => $catId])->andWhere(['not in', 'prop_id', $existProps])->all();
        return $oneCatProps;
    }

    public function deleteById($id)
    {
        Properties::deleteAll(['prop_id' => $id]);
    }


    public function updateOneRecord($propName, $propId)
    {
        Properties::updateAll(['prop_name' => $propName], ['=', 'prop_id', $propId]);
    }


    public function deleteByCatId($catId)
    {
        Properties::deleteAll(['prop_id' => $catId]);
    }


    public function modelSave()
    {
        if ($this->validate()) {
            if ($this->save()) {
                Yii::$app->session->setFlash('success', 'eeeeeeeeeeeeeeeeeeeeeeee');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'ff');
            }
        }
    }

    public function newCatProp($catId)
    {
        $model = new Properties();
        $model->cat_id = $catId;
        return $model;

    }

    public function attributeLabels()
    {
        return [
            'prop_name' => 'Наименование свойства',
            'cat_id' => 'Категория свойства',
        ];
    }

    public function rules()
    {
        return [
            [['prop_id'], 'safe'],
            [['prop_name'], 'required'],
            [['cat_id'], 'safe'],
        ];
    }


}

?>