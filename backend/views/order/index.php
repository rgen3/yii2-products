<?php

use yii\helpers\Html;
use yii\grid\GridView;
use rgen3\product\backend\Module as M;

$this->title = M::t('product', 'List items');
$this->params['breadcrumbs'][] = $this->title;

?>

<?= GridView::widget(
    [
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => \yii\grid\SerialColumn::class],
            'email',
            'phone',
            'product_price',
            [
                'format' => 'raw',
                'value' => function($model)
                {
                    $class = 'btn-success';
                    $statusText = M::t('product', 'Change status');
                    return Html::a(
                        $statusText,
                        \yii\helpers\Url::to(['change-status', 'id' => $model->id]),
                        [
                            'class' => sprintf("btn %s", $class)
                        ]
                    );
                }
            ]
        ]
    ]
);?>