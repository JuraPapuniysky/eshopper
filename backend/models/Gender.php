<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "gender".
 *
 * @property integer $id
 * @property string $name
 * @property string $time_stamp
 */
class Gender extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gender';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['time_stamp'], 'safe'],
            [['name'], 'string', 'max' => 255],
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
            'time_stamp' => 'Time Stamp',
        ];
    }
}
