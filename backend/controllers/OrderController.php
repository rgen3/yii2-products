<?php

namespace rgen3\product\backend\controllers;

use rgen3\product\common\models\ProductOrderSearch;
use yii\web\Controller;

class OrderController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new ProductOrderSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionChangeStatus()
    {

    }

    public function actionDelete()
    {

    }
}