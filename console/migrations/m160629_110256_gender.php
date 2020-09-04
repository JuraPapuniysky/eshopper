<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m160629_110256_gender extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%gender}}',[
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING. ' NOT NULL',
            'time_stamp' => Schema::TYPE_TIMESTAMP. ' NOT NULL',
        ], $tableOptions);

        $this->insert('{{%gender}}', [
            'name' => 'Мужской',
        ]);
        $this->insert('{{%gender}}', [
            'name' => 'Женский',
        ]);
        $this->insert('{{%gender}}', [
            'name' => 'Унисекс',
        ]);

        $this->createIndex('FK_section_gender', '{{%section}}', 'gender_id');
        $this->addForeignKey(
            'FK_section_gender', '{{%section}}', 'gender_id', '{{%gender}}', 'id'
        );

        $this->createIndex('FK_product_gender', '{{%product}}', 'gender_id');
        $this->addForeignKey('FK_product_gender', '{{%product}}', 'gender_id', '{{%gender}}', 'id');
    }

    public function down()
    {
        echo "m160629_110256_gender cannot be reverted.\n";

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
