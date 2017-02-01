<?php

namespace rgen3\product\common\models;

use Yii;

/**
 * This is the model class for table "{{%product_order_info}}".
 *
 * @property integer $order_id
 * @property string $host
 * @property string $cookies
 * @property string $hash
 * @property integer $traf
 * @property string $user_device
 * @property integer $ip_address
 *
 * @property ProductOrder $order
 */
class ProductOrderInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_order_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id'], 'required'],
            [['order_id', 'traf', 'ip_address'], 'integer'],
            [['host', 'cookies', 'hash', 'user_device'], 'string', 'max' => 255],
            [['order_id'], 'unique'],
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
            'host' => Yii::t('app', 'Host'),
            'cookies' => Yii::t('app', 'Cookies'),
            'hash' => Yii::t('app', 'Hash'),
            'traf' => Yii::t('app', 'Traf'),
            'user_device' => Yii::t('app', 'User Device'),
            'ip_address' => Yii::t('app', 'Ip Address'),
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
