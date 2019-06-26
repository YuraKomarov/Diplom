<?php
namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\Categories;
use frontend\models\Catalog;
use frontend\models\CatalogProperties;
use frontend\models\Banners;
use frontend\models\Brands;
use Yii;


class IndexController extends Controller
{
    public function actionIndex()
    {


        $cats = Categories::popularCats();
        $allProds = Catalog::getAllProductsOrderByRate();
        $banners = Banners::getAllBanners();
        $allPropdId = Catalog::allIdsAsArray($allProds);
        $productsProps = CatalogProperties::getByProductId($allPropdId);

        $brands = Brands::brandsForIndexPage();
//
//        echo '<pre>' . print_r($productsProps, 1) . '</pre>';
//        exit;


        return $this->render('index', compact('cats', 'allProds', 'modalProd', 'productsProps', 'banners', 'brands'));
    }

}