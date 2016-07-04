<?php

namespace backend\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property integer $category_id
 * @property integer $brand_id
 * @property string $price
 * @property string $description
 * @property string $time_stamp
 *
 * @property Image[] $images
 * @property Brand $brand
 * @property Category $category
 * @property ProductAvailabilyty[] $productAvailabilyties
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'category_id', 'brand_id', 'price'], 'required'],
            [['category_id', 'brand_id'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['time_stamp'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'category_id' => 'Category ID',
            'brand_id' => 'Brand ID',
            'price' => 'Price',
            'description' => 'Description',
            'time_stamp' => 'Time Stamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAvailabilyties()
    {
        return $this->hasMany(ProductAvailabilyty::className(), ['product_id' => 'id']);
    }

    public static function getProductsImages()
    {
        return (new Query())
            ->select(['product.id', 'product.name', 'product.price', 'image.src'])
            ->from('product')
            ->innerJoin('image', 'product.id = image.product_id')
            ->where(['image.description' => 0])
            ->all();
    }
}
