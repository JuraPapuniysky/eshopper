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
            'description' => Schema::TYPE_TEXT,
            'image' => Schema::TYPE_STRING,
            'time_stamp' => Schema::TYPE_TIMESTAMP. ' NOT NULL',
        ], $tableOptions);



        $this->createTable('{{%product}}',[
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING. ' NOT NULL',
            'category_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'brand_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'gender_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'price' => Schema::TYPE_MONEY. ' NOT NULL',
            'description' => Schema::TYPE_TEXT,
            'section_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'time_stamp' => Schema::TYPE_TIMESTAMP. ' NOT NULL',
        ],$tableOptions);

        $this->createIndex('FK_product_category', '{{%product}}', 'category_id');
        $this->addForeignKey(
            'FK_product_category', '{{%product}}', 'category_id', '{{%category}}', 'id'
        );

        $this->createIndex('FK_product_brand', '{{%product}}', 'brand_id');
        $this->addForeignKey(
            'FK_product_brand', '{{%product}}', 'brand_id', '{{%brand}}', 'id'
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
            'FK_image_product', '{{%image}}', 'product_id', '{{%product}}', 'id'
        );

        $this->createTable('{{%product_availabilyty}}',[
            'id' => Schema::TYPE_PK,
            'product_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'size' => Schema::TYPE_STRING. ' NOT NULL',
            'time_stamp' => Schema::TYPE_TIMESTAMP. ' NOT NULL',

        ],$tableOptions);

        $this->createIndex('FK_product_availabilyty_product', '{{%product_availabilyty}}', 'product_id');
        $this->addForeignKey(
            'FK_product_availabilyty_product', '{{%product_availabilyty}}', 'product_id', '{{%product}}', 'id'
        );

        $this->createTable('{{%order}}',[
            'id' => Schema::TYPE_PK,
            'first_name' => Schema::TYPE_STRING. ' NOT NULL',
            'last_name' => Schema::TYPE_STRING. ' NOT NULL',
            'email' => Schema::TYPE_STRING. ' NOT NULL',
            'phone' => Schema::TYPE_STRING. ' NOT NULL',
            'addres' => Schema::TYPE_STRING. ' NOT NULL',
            'status' => Schema::TYPE_SMALLINT. " NOT NULL DEFAULT '1'",
            'time_stamp' => Schema::TYPE_TIMESTAMP. ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%order_product}}',[
            'product_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'size_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'order_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'count' => Schema::TYPE_INTEGER. ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%size}}', [
            'id' => Schema::TYPE_PK,
            'product_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'size' => Schema::TYPE_STRING. ' NOT NULL',
            'description' => Schema::TYPE_STRING. ' NOT NULL',
        ], $tableOptions);

        $this->createIndex('FK_size_product', '{{%size}}', 'product_id');
        $this->addForeignKey(
            'FK_size_product', '{{%size}}', 'product_id', '{{%product}}', 'id'
        );

        $this->createIndex('FK_orderproduct_product', '{{%order_product}}', 'product_id');
        $this->addForeignKey(
            'FK_orderproduct_product', '{{%order_product}}', 'product_id', '{{%product}}', 'id'
        );

        $this->createIndex('FK_orderproduct_order', '{{%order_product}}', 'order_id');
        $this->addForeignKey(
            'FK_orderproduct_order', '{{%order_product}}', 'order_id', '{{%order}}', 'id'
        );

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%section}}',[
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING. ' NOT NULL',
            'category_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'gender_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'time_stamp' => Schema::TYPE_TIMESTAMP. ' NOT NULL',
        ], $tableOptions);



        $this->createIndex('FK_section_category', '{{%section}}', 'category_id');
        $this->addForeignKey(
            'FK_section_category', '{{%section}}', 'category_id', '{{%category}}', 'id'
        );

        $this->createIndex('FK_product_section', '{{%product}}', 'section_id');
        $this->addForeignKey(
            'FK_product_section', '{{%product}}', 'section_id', '{{%section}}', 'id'
        );

        

        $this->createIndex('FK_size_product_order', '{{%order_product}}', 'size_id');
        $this->addForeignKey(
            'FK_size_product_order', '{{%order_product}}', 'size_id', '{{%size}}', 'id'
        );
    }

    public function down()
    {
        $this->dropTable('{{%category}}');
        $this->dropTable('{{%brand}}');
        $this->dropTable('{{%product}}');
        $this->dropTable('{{%image}}');
        $this->dropTable('{{%product_availabilyty}}');
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
