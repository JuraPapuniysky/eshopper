<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m160722_105706_blog_tables extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%post}}',[
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING. ' NOT NULL',
            'text_preview' => Schema::TYPE_STRING . 'NOT NULL',
            'preview_image_id' => Schema::TYPE_INTEGER,
            'author_id' => Schema::TYPE_INTEGER,
            'text' => Schema::TYPE_TEXT,
            'create at' => Schema::TYPE_TIMESTAMP. ' NOT NULL',
            'update at' => Schema::TYPE_TIMESTAMP. ' NOT NULL',
        ], $tableOptions);

        $this->createIndex('FK_post_user', '{{%post}}', 'author_id');
        $this->addForeignKey('FK_post_user', '{{%post}}', 'author_id', '{{%user}}', 'id');
    }

    public function down()
    {
        echo "m160722_105706_blog_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
