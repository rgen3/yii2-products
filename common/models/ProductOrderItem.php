<?php

namespace rgen3\product\common\models;

use Yii;

/**
 * This is the model class for table "{{%product_order_item}}".
 *
 * @property integer $product_id
 * @property integer $order_id
 * @property double $price
 * @property double $discounted_price
 * @property integer $quantity
 * @property string $date_created
 *
 * @property ProductItem $product
 * @property ProductOrder $order
 */
class ProductOrderItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_order_item}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'order_id'], 'required'],
            [['product_id', 'order_id', 'quantity'], 'integer'],
            [['price', 'discounted_price'], 'number'],
            [['date_created'], 'safe'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductItem::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductOrder::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'price' => Yii::t('app', 'Price'),
            'discounted_price' => Yii::t('app', 'Discounted Price'),
            'quantity' => Yii::t('app', 'Quantity'),
            'date_created' => Yii::t('app', 'Date Created'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(ProductItem::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(ProductOrder::className(), ['id' => 'order_id']);
    }
}
