<?php

use yii\db\Migration;

/**
 * Class m191221_072104_create_rbac_users
 */
class m191221_072104_create_rbac_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        // Создаем permission
        $deleteUserPermission = $auth->createPermission('deleteUser');
        $updateUserPermission = $auth->createPermission('updateUser');
        $viewUserPermission = $auth->createPermission('viewUserList');

        $auth->add($deleteUserPermission);
        $auth->add($updateUserPermission);
        $auth->add($viewUserPermission);

        $adminRole = $auth->getRole('admin');
        if (!$adminRole){
            $adminRole = $auth->createRole('guest');
            $auth->add($adminRole);
        }

        $auth->addChild($adminRole, $deleteUserPermission);
        $auth->addChild($adminRole, $updateUserPermission);
        $auth->addChild($adminRole, $viewUserPermission);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191221_072104_create_rbac_users cannot be reverted.\n";

        return false;
    }
}
