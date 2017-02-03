<?php

use yii\helpers\Html;
use rgen3\product\backend\Module as m;
?>
<div id="order-product-items-container">
<?php \yii\widgets\Pjax::begin();?>
    <table class="table table-striped table-bordered">
        <tr>
            <th>id</th>
            <th>Item name</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
    </table>
<?= Html::a(m::t('order', 'Add order item'), '', ['class' => 'btn btn-success pull-right']); ?>
<?php \yii\widgets\Pjax::end(); ?>
</div>
