<?php

use yii\db\Migration;

/**
 * Class m191218_160402_company
 */
class m191218_160402_company extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%company}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'director' => $this->string()->notNull(),
            'INN' => $this->string()->notNull()->unique(),
            'address' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%company}}');
    }

}
