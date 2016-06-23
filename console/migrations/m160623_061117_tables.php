<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m160623_061117_tables extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%category}}',[
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING. ' NOT NULL',
            'description' => Schema::TYPE_TEXT,
            'image' => Schema::TYPE_STRING,
            'time_stamp' => Schema::TYPE_TIMESTAMP. ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%brand}}',[
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING. ' NOT NULL',
            'category_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'gender' => Schema::TYPE_STRING. ' NOT NULL',
            'description' => Schema::TYPE_TEXT,
            'image' => Schema::TYPE_STRING,
            'time_stamp' => Schema::TYPE_TIMESTAMP. ' NOT NULL',
        ], $tableOptions);

        $this->createIndex('FK_brands_category', '{{%brands}}', 'category_id');
        $this->addForeignKey(
            'FK_brands_category', '{{%brands}}', 'category_id', '{{%category}}', 'id', 'SET NULL', 'CASCADE'
        );

        $this->createTable('{{%product}}',[
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING. ' NOT NULL',
            'category_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'brand_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'price' => Schema::TYPE_MONEY, ' NOT NULL',
            'description' => Schema::TYPE_TEXT,
            'time_stamp' => Schema::TYPE_TIMESTAMP. ' NOT NULL',
        ],$tableOptions);

        $this->createIndex('FK_product_category', '{{%product}}', 'category_id');
        $this->addForeignKey(
            'FK_product_category', '{{%product}}', 'category_id', '{{%category}}', 'id', 'SET NULL', 'CASCADE'
        );

        $this->createIndex('FK_product_brand', '{{%product}}', 'brand_id');
        $this->addForeignKey(
            'FK_product_brand', '{{%product}}', 'brand_id', '{{%brand}}', 'id', 'SET NULL', 'CASCADE'
        );

        $this->createTable('{{%image}}',[
            'id' => Schema::TYPE_PK,
            'description' => Schema::TYPE_STRING. ' NOT NULL',
            'product_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'src' => Schema::TYPE_STRING. ' NOT NULL',
            'time_stamp' => Schema::TYPE_TIMESTAMP. ' NOT NULL',

        ],$tableOptions);

        $this->createIndex('FK_image_product', '{{%image}}', 'product_id');
        $this->addForeignKey(
            'FK_image_product', '{{%image}}', 'product_id', '{{%product}}', 'id', 'SET NULL', 'CASCADE'
        );

        $this->createTable('{{%product_availabilyty}}',[
            'id' => Schema::TYPE_PK,
            'product_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'size' => Schema::TYPE_STRING. ' NOT NULL',
            'time_stamp' => Schema::TYPE_TIMESTAMP. ' NOT NULL',

        ],$tableOptions);

        $this->createIndex('FK_product_availabilyty_product', '{{%product_availabilyty}}', 'product_id');
        $this->addForeignKey(
            'FK_product_availabilyty_product', '{{%product_availabilyty}}', 'product_id', '{{%product}}', 'id', 'SET NULL', 'CASCADE'
        );
    }

    public function down()
    {
        echo "m160623_061117_tables cannot be reverted.\n";

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

    public function primer()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%category}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%post}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'anons' => Schema::TYPE_TEXT . ' NOT NULL',
            'content' => Schema::TYPE_TEXT . ' NOT NULL',
            'category_id' => Schema::TYPE_INTEGER,
            'author_id' => Schema::TYPE_INTEGER,
            'publish_status' => "enum('" . Post::STATUS_DRAFT . "','" . Post::STATUS_PUBLISH . "') NOT NULL DEFAULT '" . Post::STATUS_DRAFT . "'",
            'publish_date' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
        ], $tableOptions);

        $this->createIndex('FK_post_author', '{{%post}}', 'author_id');
        $this->addForeignKey(
            'FK_post_author', '{{%post}}', 'author_id', '{{%user}}', 'id', 'SET NULL', 'CASCADE'
        );

        $this->createIndex('FK_post_category', '{{%post}}', 'category_id');
        $this->addForeignKey(
            'FK_post_category', '{{%post}}', 'category_id', '{{%category}}', 'id', 'SET NULL', 'CASCADE'
        );
    }
}
