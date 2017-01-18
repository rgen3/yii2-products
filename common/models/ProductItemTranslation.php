<?php

namespace rgen3\product\common\models;

use Yii;

/**
 * This is the model class for table "product_item_translation".
 *
 * @property integer $product_id
 * @property string $language_code
 * @property string $title
 * @property string $description
 * @property string $image
 * @property double $price
 *
 * @property ProductItem $product
 */
class ProductItemTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_item_translation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'language_code'], 'required'],
            [['product_id'], 'integer'],
            [['title', 'description'], 'string'],
            [['price'], 'number'],
            [['language_code'], 'string', 'max' => 10],
            [['image'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductItem::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'language_code' => Yii::t('app', 'Language Code'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'image' => Yii::t('app', 'Image'),
            'price' => Yii::t('app', 'Price'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(ProductItem::className(), ['id' => 'product_id']);
    }
}
