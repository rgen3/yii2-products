<?php

namespace rgen3\product\common\models;

use yii\data\ActiveDataProvider;

class ProductOrderSearch extends ProductOrder
{
    /**
     * @param $params
     * @return ActiveDataProvider
     */
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
            'id' => $this->id
        ]);

        $query->orderBy(['id' => SORT_DESC]);

        return $dataProvider;
    }
}