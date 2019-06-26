<?php

namespace backend\models;


use common\models\Categories as CommonCategories;
use Yii;


class Categories extends CommonCategories
{

    public $image;

    public function fileNameSet($model)
    {
        if($this->image) {
            $name = $this->image->baseName . "." . $this->image->extension;
            $filename = "/common/images/category/" . $name;

        }else{
            $filename = $this->picture;
        }
        return $filename;
    }




    public function modelSave()
    {
        if($this->validate())
        {
            if($this->save())
            {
                if($this->image)
                {
                    $this->image->saveAs(Yii::getAlias('@uploadPath').'/category/'.$this->image->baseName.".".$this->image->extension);
                }
                Yii::$app->session->setFlash('success', 'eeeeeeeeeeeeeeeeeeeeeeee');
                return $this->refresh();
            }
            else{
                Yii::$app->session->setFlash('error', 'ff');
            }
        }
    }



    public function deleteById($id)
    {
        Categories::deleteAll($id);
    }

    public function oneCatFromId($id)
    {
        if ($id) {
            $oneCat = Categories::findOne($id);
            return $oneCat;
        } else {
            $model = new Categories();
            return $model;
        }

    }

    public function attributeLabels()
    {
        return [
            'name' => 'Наименование категории',
            'parentid' => 'Родительская категория',
            'image' => 'Изменить/загрузить изображение',
        ];
    }

    public function rules()
    {
        return [
            [['id'], 'safe'],
            [['image'], 'safe'],
            [['name'], 'required'],
            [['picture'], 'safe'],
            [['parentid'], 'safe'],
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }
}

?>