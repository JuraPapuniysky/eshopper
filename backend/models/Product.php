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
 * @property integer $section_id
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
            [['name', 'category_id', 'brand_id', 'price', 'section_id', 'gender_id'], 'required'],
            [['category_id', 'brand_id', 'section_id', 'gender_id'], 'integer'],
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
            'gender_id' => 'Gender',
            'description' => 'Description',
            'section_id' => 'Section',
            'time_stamp' => 'Time Stamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return Image::findAll(['product_id' => $this->id]);
    }

    public function getImagesGroup($size = 3)
    {
        return array_chunk($this->getImages(), $size);
    }

    /**
     * @param $id
     * @return null|static
     */
    public static function findProductById($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * @param $imageId
     * @return \yii\db\ActiveQuery
     */
    public function getMainImage($imageId = null)
    {
        if($imageId == null)
        {
            return Image::findOne(['product_id' => $this->id, 'description' => 0]);
        }else{
            return Image::findOne(['product_id' => $this->id, 'id' => $imageId]);
        }

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return Brand::findOne(['id' => $this->brand_id]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return Category::findOne(['id' => $this->category_id]);
    }

    /**
     * @return array|\yii\db\ActiveRecord[]|static[]
     */
    public function getCategories()
    {
        if($this->category_id == null) {
            return Category::find()->all();
        }else{
            return Category::findAll(['id' => $this->category_id]);
        }
    }

    /**
     * @return static[]
     */
    public function getSections($condition = true)
    {
        if($condition) {
            return Section::findAll(['category_id' => $this->category_id]);
        }else{
            return Section::find()->all();
        }
    }

    /**
     * @return static[]
     */
    public function getBrands()
    {
        return Brand::find()->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAvailabilyties()
    {
        return $this->hasMany(ProductAvailabilyty::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSizes()
    {
        return $this->hasMany(Size::className(), ['product_id' => 'id']);
    }

    public static function getProductsImages()
    {
        return (new Query())
            ->select(['product.id', 'product.name', 'product.price', 'image.src'])
            ->from('product')
            ->innerJoin('image', 'product.id = image.product_id')
            ->where(['image.description' => 0]);
    }
}
