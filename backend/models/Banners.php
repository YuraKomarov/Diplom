<?php
namespace backend\models;


use common\models\Banners as CommonBannersModel;
use Yii;

class Banners extends CommonBannersModel
{

    public $image;


    public static function getBannerById($id)
    {
        if($id)
        {
            $banner = Banners::findOne($id);

        }
        else{
            $banner = new Banners();
        }
        return $banner;

    }

    public static function deleteOneBanner($id)
    {
        if($id)
        {
            Banners::deleteAll(['id' => $id]);
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
                    $this->image->saveAs(Yii::getAlias('@uploadPath').'/banners/'.$this->image->baseName.".".$this->image->extension);
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
            $filename = "/common/images/banners/" . $name;

        }else{
            $filename = $this->picture;
        }
        return $filename;
    }



    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'picture' => 'Изображение',
            'description' => 'Описание',
            'subtitle' => 'Подзаголовок',
            'catalog_link' => 'Ссылка на категорию из каталога',
            'button_lable' => 'Подспись кнопки',
        ];
    }

    function rules()
    {
        return [
            [['title',
                'description',
                'subtitle',
                'button_lable',
                'picture',], 'required'],
            [['catalog_link'], 'safe'],
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }
}
?>