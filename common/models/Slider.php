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
}
