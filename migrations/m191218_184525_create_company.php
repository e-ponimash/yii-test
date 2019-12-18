<?php

use yii\db\Migration;

/**
 * Class m191218_184525_create_company
 */
class m191218_184525_create_company extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('company', [
            'id' => 1,
            'name' => 'Компания 1',
            'director' => 'Директор 1',
            'INN' => '0123456789',
            'address' => 'Адресс 1'
        ]);

        $this->insert('company', [
            'id' => 2,
            'name' => 'Компания 2',
            'director' => 'Директор 2',
            'INN' => '0223456789',
            'address' => 'Адресс 2'
           
        ]);


        $this->insert('company', [
            'id' => 3,
            'name' => 'Компания 3',
            'director' => 'Директор 3',
            'INN' => '0333456789',
            'address' => 'Адресс 3'

        ]);

        $this->insert('company', [
            'id' => 4,
            'name' => 'Компания 4',
            'director' => 'Директор 4',
            'INN' => '0443456789',
            'address' => 'Адресс 4'

        ]);
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191218_184525_create_company cannot be reverted.\n";

        return false;
    }

}
