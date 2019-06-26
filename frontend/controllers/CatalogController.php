<?php
namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\Categories;
use frontend\models\Catalog;
use frontend\models\CatalogProperties;
use Yii;


class CatalogController extends Controller
{
    public function actionCatalog()
    {


        $allCats = Categories::allCats();
        $allProds = Catalog::getAllProductsOrderByRate();

//
//        echo '<pre>' . print_r($productsProps, 1) . '</pre>';
//        exit;


        return $this->render('catalog', compact('allCats', 'allProds'));
    }


    public function actionProducts()
    {
        $categoryId = Yii::$app->request->get('category_id');


        $categoryProducts = Catalog::getProductsByParentId($categoryId);


        return $this->render('products', compact('categoryProducts'));
    }

    public function actionProduct()
    {
        $productId = Yii::$app->request->get('id');


        $product = Catalog::getById($productId);


        return $this->render('product', compact('product'));
    }

}