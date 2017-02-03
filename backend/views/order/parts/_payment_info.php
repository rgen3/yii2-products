<?php

use yii\helpers\Html;
use rgen3\product\backend\Module as m;
?>
<div id="order-product-payment-info-container">
<?= Html::tag('h3', m::t('order', 'Payment info')); ?>
<table class="table table-striped table-bordered">
    <tr>
        <th>Credit card</th>
        <th>1800</th>
        <th>Paid</th>
    </tr>
</table>
</div>