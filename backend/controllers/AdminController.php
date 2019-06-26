<?php

namespace backend\controllers;

use backend\models\Brands;
use yii\web\Controller;
use backend\models\Categories;
use Yii;
use yii\web\UploadedFile;
use backend\models\Properties;
use backend\models\Catalog;
use backend\models\CatalogProperties;
use backend\models\CatalogPictures;
use backend\models\Banners;

class AdminController extends Controller
{
    public function actionCatalog()
    {
        $allCats = Categories::allCats();

        return $this->render('catalog', compact("allCats"));
    }


    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCategory()
    {
        $id = Yii::$app->request->get('id');
        $propIdForDelete = Yii::$app->request->post('prop_id_del');
        $propIdForChange = Yii::$app->request->post('prop_id');
        $propNameForChange = Yii::$app->request->post('new_prop_name');



        $model = Categories::oneCatFromId($id);
        $allCats = Categories::allCats();
        $catProps = Properties::oneCatProps($id);
        $newPropModel = Properties::newCatProp($id);


//        echo '<pre>' . print_r($catProps, 1) . '</pre>';
//        exit;

        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->picture = $model->fileNameSet($model);

            $model->modelSave($model->picture);
        }

        if ($newPropModel->load(Yii::$app->request->post())) {
            $newPropModel->modelSave();
            $this->refresh();
        }

        if($propIdForChange)
        {
            if($propNameForChange)
            {
                Properties::updateOneRecord($propNameForChange, $propIdForChange);
            }
        }

        if ($propIdForDelete) {
            Properties::deleteById($propIdForDelete);
            $this->refresh();
        }

        return $this->render('category', compact('model', 'allCats', 'catProps', 'newPropModel'));
    }

    public function actionProducts()
    {
        $categoryId = Yii::$app->request->get('category_id');
        $prodIdForDelete = Yii::$app->request->post('product_id_del');

        $products = Catalog::getProductsByParentId($categoryId);


        if ($prodIdForDelete) {
            Catalog::deleteById($prodIdForDelete);
            $this->refresh();
        }

        return $this->render('products', compact('products', 'categoryId'));
    }

    public function actionProductchange()
    {
        $productId = Yii::$app->request->get('id');
        $propRecordId = Yii::$app->request->post('propRecordId');
        $propValue = Yii::$app->request->post('propValue');

        $propId = Yii::$app->request->post('propId');
        $newPropValue = Yii::$app->request->post('newPropValue');
        $prodId = Yii::$app->request->post('productId');


        $model = Catalog::getProductById($productId);

        $allCats = Categories::allCats();
        $allBrands = Brands::getAllBrands();
        $existProps = CatalogProperties::getByProductId($productId);
        $emptyProps = Properties::getOneCatEmptyProps($model->parentid, $productId);
//        echo '<pre>' . print_r($productId, 1) . '</pre>';
//        exit;
        $props = Properties::oneCatProps($model->parentid);


        if($propId)
        {
            CatalogProperties::insertOneRecord($propId, $prodId, $newPropValue);
        }

        if($propRecordId)
        {
            CatalogProperties::updateOneRecord($propRecordId, $propValue);
        }


        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->image1 = UploadedFile::getInstance($model, 'image1');
            $model->image2 = UploadedFile::getInstance($model, 'image2');
            $model->picture = $model->fileNameSet();
            $model->picture1 = $model->fileNameSet1();
            $model->picture2 = $model->fileNameSet2();
            $model->modelSave();
        }

        return $this->render('productchange', compact('model', 'allCats', 'props', 'existProps', 'emptyProps', 'allBrands'));
    }

    public function actionBanners()
    {

        $bannerIdForDelete = Yii::$app->request->post('banner_id_del');

        $allBanners = Banners::getAllBanners();

       if($bannerIdForDelete)
       {
           Banners::deleteOneBanner($bannerIdForDelete);
       }


        return $this->render('banners', compact('allBanners'));
    }


    public function actionBannerchange()
    {
        $bannerId = Yii::$app->request->get('id');

        $banner = Banners::getBannerById($bannerId);

        if ($banner->load(Yii::$app->request->post()))
        {
            $banner->image = UploadedFile::getInstance($banner, 'image');
            $banner->picture = $banner->fileNameSet($banner);
            $banner->modelSave($banner->picture);
        }

        return $this->render('bannerchange', compact('banner'));
    }

    public function actionBrands()
    {

        $brandIdForDelete = Yii::$app->request->post('brand_id_del');

        $allBrands = Brands::getAllBrands();

        if($brandIdForDelete)
        {
            Brands::deleteOneBrand($brandIdForDelete);
        }


        return $this->render('brands', compact('allBrands'));
    }

    public function actionBrandchange()
    {
        $brandId = Yii::$app->request->get('id');

        $brand = Brands::getBrandById($brandId);

        if ($brand->load(Yii::$app->request->post()))
        {
            $brand->image = UploadedFile::getInstance($brand, 'image');
            $brand->picture = $brand->fileNameSet($brand);
            $brand->modelSave($brand->picture);
        }

        return $this->render('brandchange', compact('brand'));
    }

}

