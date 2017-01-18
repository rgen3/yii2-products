<?php

namespace rgen3\product\common\models;

use yii\data\ActiveDataProvider;

class ProductItemSearch extends ProductItem
{
    public function search($params)
    {
        $lang = isset($params['lang']) ? $params['lang'] : \Yii::$app->language;

        $query = ProductItemTranslation::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $this->load($params);

        if (!$this->validate())
        {
            $query->where('1=0');
            return $dataProvider;
        }

        $query->filterWhere([
            'product_id' => $this->id,
            'language_code' => $lang
        ]);

        return $dataProvider;
    }
}