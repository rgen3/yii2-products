<?php
use \yii\helpers\Html;
use \yii\bootstrap\ActiveForm;
use \rgen3\product\backend\Module as m;

$this->title = Yii::t('app', 'Update order item');

?>

<?= Html::tag('h1', $this->title); ?>

<?= $this->render('_form', ['model' => $model]); ?>