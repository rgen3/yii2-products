<?php

namespace rgen3\product\common\models;

use yii\data\ActiveDataProvider;

class ProductOrderSearch extends ProductOrder
{
    public function search($params)
    {

        $query = ProductOrder::find();

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
            'product_id' => $this->id
        ]);

        $query->orderBy(['id' => SORT_DESC]);

        return $dataProvider;
    }
}