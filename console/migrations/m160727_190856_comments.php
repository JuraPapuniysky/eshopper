<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m160727_190856_comments extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%comment}}',[

            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING. ' NOT NULL',
            'email' => Schema::TYPE_STRING. ' NOT NULL',
            'text' => Schema::TYPE_TEXT . ' NOT NULL',
            'user_id' => Schema::TYPE_INTEGER,
            'post_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'text' => Schema::TYPE_TEXT,
            'time_stamp' => Schema::TYPE_TIMESTAMP. ' NOT NULL',

        ], $tableOptions);

        $this->createIndex('FK_comment_post', '{{%comment}}', 'post_id');
        $this->addForeignKey('FK_comment_post', '{{%comment}}', 'post_id', '{{%post}}', 'id');
    }

    public function down()
    {
        echo "m160727_190856_comments cannot be reverted.\n";

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
