<?php

namespace common\models;

use Faker\Provider\DateTime;
use Yii;


/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $text_preview
 * @property integer $author_id
 * @property string $text
 * @property string $image
 * @property string $create_at
 *
 * @property User $author
 */
class Post extends \yii\db\ActiveRecord
{
    const PATH_TO_POST_IMAGES = '../../frontend/web';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text_preview'], 'required'],
            [['author_id'], 'integer'],
            [['text'], 'string'],
            [['create_at'], 'safe'],
            [['title', 'text_preview'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text_preview' => 'Text Preview',
            'author_id' => 'Author ID',
            'text' => 'Text',
            'image' => 'Image',
            'create_at' => 'Create At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    public function upload()
    {
        if ($this->validate()) {
            $image = '/images/post-images/' . $this->image->baseName . '.' . $this->image->extension;
            $path = self::PATH_TO_POST_IMAGES.$image;
            $this->image->saveAs($path);
            $this->image = str_replace(self::PATH_TO_POST_IMAGES, '', $path);
            return true;
        } else {
            return false;
        }
    }

    public function getDate()
    {
        Yii::$app->formatter->locale = 'ru-RU';
        $date = explode(' ', $this->create_at);
        return Yii::$app->formatter->asDate($date[0], 'long');
    }

    public function getTime()
    {
        $date = explode(' ', $this->create_at);
        Yii::$app->formatter->locale = 'ru-RU';
        return Yii::$app->formatter->asTime($date[1]);
    }
}
