<?php

namespace rgen3\product\backend\controllers;

use rgen3\product\common\models\ProductItem;
use rgen3\product\common\models\ProductItemSearch;
use rgen3\product\common\models\ProductItemTranslation;
use yii\web\Controller;

class ItemController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new ProductItemSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate()
    {
        $model = new ProductItem();

        $postData = \Yii::$app->request->post();

        if ($model->load($postData)) {
            foreach (\Yii::$app->params['availableLanguages'] as $language) {
                $modelTranslation = new ProductItemTranslation();
                $modelTranslation->setAttributes($postData['ProductItemTranslation'][$language]);
                $model->translationModels[$language] = $modelTranslation;
            }

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $model = ProductItem::findOne(['id' => $id]);

        $postData = \Yii::$app->request->post();

        if ($model->load($postData)) {
            foreach (\Yii::$app->params['availableLanguages'] as $language) {
                $modelTranslation = new ProductItemTranslation();
                $modelTranslation->setAttributes($postData['ProductItemTranslation'][$language]);
                $model->translationModels[$language] = $modelTranslation;
            }

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionView($id)
    {
        $model = ProductItem::findOne(['id' => $id]);

        return $this->render('view', [
            'model' => $model
        ]);
    }

    public function actionDelete()
    {

    }
}