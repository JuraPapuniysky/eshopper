<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m160914_065600_slider extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%slider}}', [
            'id' => $this->primaryKey(),
            'slide_name' => $this->string()->notNull()->unique(),
            'header' => $this->string()->notNull()->unique(),
            'subtitle' => $this->string()->notNull()->unique(),
            'text' => $this->string()->notNull()->unique(),
            'created_at' => Schema::TYPE_TIMESTAMP. ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%slider_image}}', [
            'id' => $this->primaryKey(),
            'src' => $this->string()->notNull()->unique(),
            'type' => $this->smallInteger()->notNull(),
            'slider_id' => $this->integer()->notNull(),
            'created_at' => Schema::TYPE_TIMESTAMP. ' NOT NULL',
        ], $tableOptions);

        $this->createIndex('FK_slider_image', '{{%slider_image}}', 'slider_id');
        $this->addForeignKey('FK_slider_image', '{{%slider_image}}', 'slider_id', '{{%slider}}', 'id');

    }

    public function down()
    {
        echo "m160914_065600_slider cannot be reverted.\n";

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
