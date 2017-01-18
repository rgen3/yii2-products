<?php

use yii\helpers\Html;
use yii\grid\GridView;
use rgen3\product\backend\Module as M;

$this->title = M::t('product', 'List items');
$this->params['breadcrumbs'][] = $this->title;

?>
    <p>
        <?= Html::a(M::t('product', 'Add item'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?= GridView::widget(
    [
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => \yii\grid\SerialColumn::class],
            'title',
            'description:html',
            'image',
            [
                'class' => \yii\grid\ActionColumn::class,
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id' => $model->product_id], [
                            'title' => Yii::t('app', 'lead-view'),
                        ]);
                    },

                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->product_id], [
                            'title' => Yii::t('app', 'lead-update'),
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->product_id], [
                            'title' => Yii::t('app', 'lead-delete'),
                        ]);
                    }
                ]
            ]
        ]
    ]
);?>