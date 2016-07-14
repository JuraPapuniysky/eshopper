<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "size".
 *
 * @property integer $id
 * @property string $gender_id
 * @property string $size
 * @property string $description
 */
class Size extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'size';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gender_id', 'size', 'description'], 'required'],
            [['gender_id', 'size', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gender_id' => 'Gender ID',
            'size' => 'Size',
            'description' => 'Description',
        ];
    }

    public function getGender($genderId = null)
    {
        return Gender::find()->all();
    }
}
