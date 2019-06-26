<?php
namespace backend\models;

use yii\db\ActiveRecord;
use common\models\Brands as CommonBrandModel;
use Yii;

class Brands extends CommonBrandModel
{

    public $image;

    public static function getBrandById($id)
    {
        if($id)
        {
            $brand = Brands::findOne($id);

        }
        else{
            $brand = new Brands();
        }
        return $brand;

    }

    public static function deleteOneBrand($id)
    {
        if($id)
        {
            Brands::deleteAll(['id' => $id]);
        }
    }




    public function modelSave()
    {
        if($this->validate())
        {
            if($this->save())
            {
                if($this->image)
                {
                    $this->image->saveAs(Yii::getAlias('@uploadPath').'/brands/'.$this->image->baseName.".".$this->image->extension);
                }
                //Yii::$app->session->setFlash('success', 'eeeeeeeeeeeeeeeeeeeeeeee');
                return $this->refresh();
            }
            else{
                //Yii::$app->session->setFlash('error', 'ff');
            }
        }
    }

    public function fileNameSet()
    {
        if($this->image) {
            $name = $this->image->baseName . "." . $this->image->extension;
            $filename = "/common/images/brands/" . $name;

        }else{
            $filename = $this->picture;
        }
        return $filename;
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'picture' => 'Изображение',
        ];
    }

    function rules()
    {
        return [
            [['name'], 'required'],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions' => 'png, jpg'],

        ];
    }
}
?>