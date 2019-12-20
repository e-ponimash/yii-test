<?php

use yii\db\Migration;
use app\models\User;

/**
 * Class m191218_175053_create_users
 */
class m191218_175053_create_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new User([
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'password_hash' => '$2y$13$P9.d7KUb8C6BHCvkdzMsrOi5U.vIAw01UmriB.34PiN50e8nTGFge', // 111111
        ]);
        $user->generateAuthKey();
        $user->save();

        $user = new User([
            'email' => 'guest@quest.com',
            'username' => 'guest',
            'password_hash' => '$2y$13$P9.d7KUb8C6BHCvkdzMsrOi5U.vIAw01UmriB.34PiN50e8nTGFge', // 111111
        ]);
        $user->generateAuthKey();
        $user->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191218_175053_create_users cannot be reverted.\n";

        return false;
    }

}
