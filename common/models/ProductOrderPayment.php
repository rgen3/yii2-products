<?php

namespace rgen3\product\common\models;

use Yii;

/**
 * This is the model class for table "{{%product_order_payment}}".
 *
 * @property integer $order_id
 * @property integer $payment_type
 * @property double $payment_sum
 * @property boolean $is_paid
 *
 * @property ProductOrder $order
 */
class ProductOrderPayment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_order_payment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'payment_type'], 'integer'],
            [['payment_sum'], 'number'],
            [['is_paid'], 'boolean'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductOrder::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => Yii::t('app', 'Order ID'),
            'payment_type' => Yii::t('app', 'Payment Type'),
            'payment_sum' => Yii::t('app', 'Payment Sum'),
            'is_paid' => Yii::t('app', 'Is Paid'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(ProductOrder::className(), ['id' => 'order_id']);
    }
}
