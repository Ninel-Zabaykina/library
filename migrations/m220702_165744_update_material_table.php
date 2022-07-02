<?php

use yii\db\Migration;

/**
 * Class m220702_165744_update_material_table
 */
class m220702_165744_update_material_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'kind_id',
            '{{%material}}',
            'kind_id',
            'kind',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'kind_id',
            'kind'
        );

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220702_165744_update_material_table cannot be reverted.\n";

        return false;
    }
    */
}
