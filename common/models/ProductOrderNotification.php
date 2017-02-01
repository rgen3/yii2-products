<?php

namespace rgen3\product\common\models;

use Yii;

/**
 * This is the model class for table "product_order_notification".
 *
 * @property integer $order_id
 * @property integer $notified_by
 * @property string $notification_type
 * @property string $notification_date
 * @property integer $notificationi_status
 *
 * @property ProductOrder $order
 */
class ProductOrderNotification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_order_notification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'notified_by', 'notificationi_status'], 'integer'],
            [['notification_type'], 'string'],
            [['notification_date'], 'safe'],
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
            'notified_by' => Yii::t('app', 'Notified By'),
            'notification_type' => Yii::t('app', 'Notification Type'),
            'notification_date' => Yii::t('app', 'Notification Date'),
            'notificationi_status' => Yii::t('app', 'Notificationi Status'),
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
