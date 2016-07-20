<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m160720_063725_table_cart extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%cart}}',[
            'id' => Schema::TYPE_PK,
            'user_token' => Schema::TYPE_STRING. ' NOT NULL',
            'product_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'size_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'quantity' => Schema::TYPE_INTEGER. ' NOT NULL',
        ], $tableOptions);

        $this->createIndex('FK_cart_product', '{{%cart}}', 'product_id');
        $this->addForeignKey(
            'FK_cart_product', '{{%cart}}', 'product_id', '{{%product}}', 'id'
        );
        $this->createIndex('FK_cart_size', '{{%cart}}', 'size_id');
        $this->addForeignKey(
            'FK_cart_size', '{{%cart}}', 'size_id', '{{%size}}', 'id'
        );
    }

    public function down()
    {
        echo "m160720_063725_table_cart cannot be reverted.\n";

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
