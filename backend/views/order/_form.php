<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<?php $form = ActiveForm::begin(); ?>

<?= Html::tag('h3', 'Order items'); ?>

    <div class="row">
        <div class="col-sm-12">
            <?= $this->render('parts/_items', ['items' => $model->items]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <?= $this->render('parts/_client_info', ['client' => $model->user ]); ?>
        </div>
        <div class="col-sm-4">
            <?= $this->render('parts/_delivery_info', ['delivery' => $model->delivery]); ?>
        </div>
        <div class="col-sm-4">
            <?= $this->render('parts/_payment_info', ['payments' => $model->payments]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= $this->render('parts/_order_notification', ['notifications' => $model->notifications]); ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>