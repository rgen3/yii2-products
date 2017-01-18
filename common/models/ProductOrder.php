<?php

namespace rgen3\product\common\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "product_order".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $user_id
 * @property string $product_title
 * @property double $product_price
 * @property string $email
 * @property string $phone
 *
 * @property ProductItem $product
 * @property User $user
 */
class ProductOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'user_id'], 'integer'],
            [['product_title'], 'string'],
            [['product_price'], 'number'],
            [['email', 'phone'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductItem::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'product_title' => Yii::t('app', 'Product Title'),
            'product_price' => Yii::t('app', 'Product Price'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
