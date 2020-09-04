<?php

use yii\db\Migration;


class m160802_071741_user_information extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_information}}',[

            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'phone' => $this->string(32),
            'address' => $this->string(),
            'image' => $this->string(155),

        ], $tableOptions);

        $this->createIndex('FK_user_information', '{{%user_information}}', 'user_id');
        $this->addForeignKey('FK_user_information', '{{%user_information}}', 'user_id', '{{%user}}', 'id');
    }

    public function down()
    {
        echo "m160802_071741_user_information cannot be reverted.\n";

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
