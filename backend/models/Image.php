<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;
use yii\imagine\Image as Imagine;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property string $description
 * @property integer $product_id
 * @property string $src
 * @property string $time_stamp
 *
 * @property Product $product
 */
class Image extends \yii\db\ActiveRecord
{
    public $imageFile;
    const PATH_TO_FRONTEND = '../../frontend/web';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['description', 'product_id', 'src'], 'required'],
            [['product_id'], 'integer'],
            [['time_stamp'], 'safe'],
            [['description', 'src'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'product_id' => 'Product ID',
            'src' => 'Src',
            'imageFiles' => 'Images',
            'time_stamp' => 'Time Stamp',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public function getProductName()
    {
        //TODO
    }

    public function upload()
    {

        if ($this->validate()) {
            $this->src = '/images/products/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $path = self::PATH_TO_FRONTEND.$this->src;
            $this->imageFile->saveAs($path);
            $this->saveThumbnail($path, 84, 84);
            return true;
        } else {
            return false;
        }
    }


    public function deleteImage()
    {
        unlink(static::PATH_TO_FRONTEND.$this->src);
        unlink(static::PATH_TO_FRONTEND.str_replace('/images/', '/mini-images/', $this->src));
        $this->delete();
    }

    public function saveThumbnail($path, $width, $height)
    {
      Imagine::thumbnail($path, $width, $height)->save(str_replace('/images/', '/mini-images/', $path), ['quality' => 50]);
    }
}
