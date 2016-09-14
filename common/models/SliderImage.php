<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slider_image".
 *
 * @property integer $id
 * @property string $src
 * @property integer $type
 * @property integer $slider_id
 * @property string $created_at
 *
 * @property Slider $slider
 */
class SliderImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['src', 'type', 'slider_id'], 'required'],
            [['type', 'slider_id'], 'integer'],
            [['created_at'], 'safe'],
            [['src'], 'string', 'max' => 255],
            [['src'], 'unique'],
            [['slider_id'], 'exist', 'skipOnError' => true, 'targetClass' => Slider::className(), 'targetAttribute' => ['slider_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'src' => 'Src',
            'type' => 'Type',
            'slider_id' => 'Slider ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlider()
    {
        return $this->hasOne(Slider::className(), ['id' => 'slider_id']);
    }
}
