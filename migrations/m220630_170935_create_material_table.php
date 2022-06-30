<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%material}}`.
 */
class m220630_170935_create_material_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%material}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'author' => $this->string()->notNull(),
            'kind_id' => $this->integer()->notNull(),
            'category_id'=> $this->integer()->notNull(),
            'description'=>$this->text(),
            'tag_id'=> $this->integer()->notNull(),
            'link_id'=> $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%material}}');
    }
}
