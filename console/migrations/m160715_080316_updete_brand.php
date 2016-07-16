<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m160715_080316_updete_brand extends Migration
{
    public function up()
    {
        $this->addColumn('{{%brand}}', 'section_id', Schema::TYPE_INTEGER . ' NOT NULL');
        $this->createIndex('FK_brand_section', '{{%brand}}', 'section_id');
        $this->addForeignKey('FK_brand_section', '{{%brand}}', 'section_id', '{{%section}}', 'id');
    }

    public function down()
    {
        echo "m160715_080316_updete_brand cannot be reverted.\n";

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
