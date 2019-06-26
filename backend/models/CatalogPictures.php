<?php
namespace backend\models;


use yii\db\ActiveRecord;
use common\models\CatalogPictures as CommonCatalogImagesModel;


class CatalogPictures extends CommonCatalogImagesModel
{
    public $image;

    public static function getImagesById($id)
    {
        $images = CatalogPictures::find()->where(['product_id' => $id])->all();
        return $images;
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



}
?>