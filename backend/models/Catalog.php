<?php

namespace backend\models;


use yii\db\ActiveRecord;
use common\models\Catalog as CommonCatalogModel;
use Yii;


class Catalog extends CommonCatalogModel
{

    public $image;
    public $image1;
    public $image2;

    public function getProductById($id)
    {
        if ($id) {
            $oneProd = Catalog::findOne($id);
            return $oneProd;
        }
        else {
            $model = new Catalog();
            return $model;
        }

    }

    public function getAllProducts()
    {
        $products = Catalog::find()->all();
        return $products;
    }


    public function deleteById($id)
    {
        Catalog::deleteAll(['id' => $id]);
    }





    public function modelSave()
    {
        if($this->validate())
        {
            if($this->save())
            {
                if($this->image)
                {
                    $this->image->saveAs(Yii::getAlias('@uploadPath').'/products/'.$this->image->baseName.".".$this->image->extension);
                }

                if($this->image1)
                {
                    $this->image1->saveAs(Yii::getAlias('@uploadPath').'/products/'.$this->image1->baseName.".".$this->image1->extension);
                }

                if($this->image2)
                {
                    $this->image2->saveAs(Yii::getAlias('@uploadPath').'/products/'.$this->image2->baseName.".".$this->image2->extension);
                }

                Yii::$app->session->setFlash('success', 'eeeeeeeeeeeeeeeeeeeeeeee');
                return $this->refresh();
            }
            else{
                Yii::$app->session->setFlash('error', 'ff');
            }
        }
    }

    public function fileNameSet()
    {
        if($this->image) {
            $name = $this->image->baseName . "." . $this->image->extension;
            $filename = "/common/images/products/" . $name;

        }else{
            $filename = $this->picture;
        }
        return $filename;
    }
    public function fileNameSet1()
    {
        if($this->image1) {
            $name = $this->image1->baseName . "." . $this->image1->extension;
            $filename = "/common/images/products/" . $name;

        }else{
            $filename = $this->picture1;
        }
        return $filename;
    }
    public function fileNameSet2()
    {
        if($this->image2) {
            $name = $this->image2->baseName . "." . $this->image2->extension;
            $filename = "/common/images/products/" . $name;

        }else{
            $filename = $this->picture2;
        }
        return $filename;
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Наименование',
            'picture' => 'Изображение',
            'description' => 'Описание',
            'parentid' => 'Родительская категория',
            'brand_id' => 'Бренд',
            'baseprice' => 'Базовая цена',
            'saleprice' => 'Цена со скидкой',
            'rating' => 'Рейтинг',
            'hit_status' => 'Хит',
            'new_status' => 'Новинка',
            'sale_status' => 'Акция',

        ];
    }

    public
    function rules()
    {
        return [
            [['name',
                'description',
                'parentid',
                'baseprice',
                'rating',
                'hit_status',
                'picture',
                'new_status',
                'sale_status',], 'required'],
            [['image', 'saleprice', 'brand_id'], 'safe'],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            ['rating', 'integer', 'max' => 5, 'min' => 1],

        ];
    }

}

?>