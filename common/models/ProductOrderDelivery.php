<?php

namespace rgen3\product\common\models;

use Yii;

/**
 * This is the model class for table "{{%product_order_delivery}}".
 *
 * @property integer $order_id
 * @property double $delivery_cost
 * @property double $total_price
 * @property string $delivery_date
 * @property integer $country_id
 * @property string $region
 * @property string $city
 * @property string $street
 * @property string $house
 * @property string $building
 * @property string $flat
 * @property string $zip
 * @property string $address
 * @property string $raw_name
 * @property string $firstname
 * @property string $lastname
 * @property string $middlename
 * @property string $phone
 * @property string $email
 * @property string $comment
 *
 * @property ProductOrder $order
 */
class ProductOrderDelivery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_order_delivery}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id'], 'required'],
            [['order_id', 'country_id'], 'integer'],
            [['delivery_cost', 'total_price'], 'number'],
            [['delivery_date'], 'safe'],
            [['comment'], 'string'],
            [['region', 'city', 'street', 'house', 'building', 'flat', 'address', 'raw_name', 'email'], 'string', 'max' => 255],
            [['zip', 'phone'], 'string', 'max' => 20],
            [['firstname', 'lastname', 'middlename'], 'string', 'max' => 50],
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
            'delivery_cost' => Yii::t('app', 'Delivery Cost'),
            'total_price' => Yii::t('app', 'Total Price'),
            'delivery_date' => Yii::t('app', 'Delivery Date'),
            'country_id' => Yii::t('app', 'Country ID'),
            'region' => Yii::t('app', 'Region'),
            'city' => Yii::t('app', 'City'),
            'street' => Yii::t('app', 'Street'),
            'house' => Yii::t('app', 'House'),
            'building' => Yii::t('app', 'Building'),
            'flat' => Yii::t('app', 'Flat'),
            'zip' => Yii::t('app', 'Zip'),
            'address' => Yii::t('app', 'Address'),
            'raw_name' => Yii::t('app', 'Raw Name'),
            'firstname' => Yii::t('app', 'Firstname'),
            'lastname' => Yii::t('app', 'Lastname'),
            'middlename' => Yii::t('app', 'Middlename'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'comment' => Yii::t('app', 'Comment'),
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
