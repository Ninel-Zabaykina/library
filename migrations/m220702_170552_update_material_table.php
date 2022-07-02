<?php

use yii\db\Migration;

/**
 * Class m220702_170552_update_material_table
 */
class m220702_170552_update_material_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'category_id',
            '{{%material}}',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'tag_id',
            '{{%material}}',
            'tag_id',
            'tag',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'link_id',
            '{{%material}}',
            'link_id',
            'link',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220702_170552_update_material_table cannot be reverted.\n";

        $this->dropForeignKey(
            'category_id',
            'category'
        );

        $this->dropForeignKey(
            'tag_id',
            'tag'
        );

        $this->dropForeignKey(
            'link_id',
            'link'
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
        echo "m220702_170552_update_material_table cannot be reverted.\n";

        return false;
    }
    */
}
