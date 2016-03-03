<?php

use yii\db\Schema;
use yii\db\Migration;

class m160122_083231_add_variables_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%variables}}', [
            'name' => Schema::TYPE_STRING,
            'value' => Schema::TYPE_TEXT,
        ], $tableOptions);

        // indexes
        $this->createIndex('i_name', '{{%variables}}', 'name');
    }

    public function down()
    {
        $this->dropTable('{{%variables}}');
    }
}
