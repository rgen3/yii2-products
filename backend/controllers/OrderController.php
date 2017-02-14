<?php

namespace rgen3\product\backend\controllers;

use rgen3\product\backend\Module;
use rgen3\product\common\models\ProductOrder;
use rgen3\product\common\models\ProductOrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class OrderController extends BaseController
{
    public function actionIndex()
    {
        $searchModel = new ProductOrderSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render($this->getTemplate('index'), [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate()
    {
        $model = new ProductOrder();

        $params = \Yii::$app->request->queryParams;
        if ($model->load($params))
        {
            $model->save();
            return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render($this->getTemplate('create'), [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $model = ProductOrder::findOne(['id' => $id]);

        if (!$model)
        {
            throw new NotFoundHttpException(Module::t('order', 'Order #{orderId} is not found', ['orderId' => $id]));
        }

        return $this->render($this->getTemplate('update'), [
            'model' => $model
        ]);
    }

    public function actionChangeStatus()
    {

    }

    public function actionDelete()
    {

    }
}