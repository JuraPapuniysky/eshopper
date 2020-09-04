<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $text
 * @property integer $user_id
 * @property integer $post_id
 * @property string $time_stamp
 *
 * @property Post $post
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'text', 'post_id'], 'required'],
            [['text'], 'string'],
            [['email'], 'email'],
            [['user_id', 'post_id'], 'integer'],
            [['time_stamp'], 'safe'],
            [['name', 'email'], 'string', 'max' => 255],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'id']],
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
            'email' => 'Email',
            'text' => 'Text',
            'user_id' => 'User ID',
            'post_id' => 'Post ID',
            'time_stamp' => 'Time Stamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }

    public function getDate()
    {
        Yii::$app->formatter->locale = 'ru-RU';
        $date = explode(' ', $this->time_stamp);
        return Yii::$app->formatter->asDate($date[0], 'long');
    }

    public function getTime()
    {
        $date = explode(' ', $this->time_stamp);
        Yii::$app->formatter->locale = 'ru-RU';
        return Yii::$app->formatter->asTime($date[1]);
    }
}
