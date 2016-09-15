<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property integer $id
 * @property string $slide_name
 * @property string $header
 * @property string $subtitle
 * @property string $text
 * @property string $created_at
 *
 * @property SliderImage[] $sliderImages
 */
class Slider extends \yii\db\ActiveRecord
{

    const TYPE_SLIDER_IMAGE = 0;
    const TYPE_SLIDER_PRICING = 1;



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slide_name', 'header', 'subtitle', 'text'], 'required'],
            [['created_at'], 'safe'],
            [['slide_name', 'header', 'subtitle', 'text'], 'string', 'max' => 255],
            [['slide_name'], 'unique'],
            [['header'], 'unique'],
            [['subtitle'], 'unique'],
            [['text'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slide_name' => 'Slide Name',
            'header' => 'Header',
            'subtitle' => 'Subtitle',
            'text' => 'Text',
            'created_at' => 'Created At',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSliderImages()
    {
        return $this->hasMany(SliderImage::className(), ['slider_id' => 'id']);
    }

    /**
     * @return source of slider image
     */
    public function getSliderImage()
    {
        return SliderImage::findOne(['slider_id' => $this->id, 'type' => self::TYPE_SLIDER_IMAGE]);
    }

    /**
     * @return source of pricing image
     */
    public function getSliderPricing()
    {
        return SliderImage::findOne(['slider_id' => $this->id, 'type' => self::TYPE_SLIDER_PRICING]);
    }

    public function getTitle()
    {
        list($title[0], $title[1]) = explode('-', $this->header);
        return $title;
    }
}
