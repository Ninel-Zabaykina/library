<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kind}}`.
 */
class m220630_171908_create_kind_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kind}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%kind}}');
    }
}
