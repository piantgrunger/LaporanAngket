<?php

use yii\db\Migration;

class m190521_022141_ImportMK extends Migration
{
    public function up()
    {
        $this->createTable(
            'import_mk',
            [
             'kodemk' =>$this->string(50)->notNull()
         ]
         );
        $this->addPrimaryKey('pk_import_mk', 'import_mk', 'kodemk');
    }

    public function down()
    {
        echo "m190521_022141_ImportMK cannot be reverted.\n";

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
