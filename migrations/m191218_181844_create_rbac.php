<?php

use yii\db\Migration;
use app\models\User;

/**
 * Class m191218_181844_create_rbac
 */
class m191218_181844_create_rbac extends Migration
{
    /**
     * {@inheritdoc}
     * @throws Exception
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        // Создаем permission
        $viewCompanyListPermission = $auth->createPermission('viewCompanyList');
        $viewCompanyPermission = $auth->createPermission('viewCompany');
        $deleteCompanyPermission = $auth->createPermission('deleteCompany');
        $updateCompanyPermission = $auth->createPermission('updateCompany');

        $auth->add($viewCompanyListPermission);
        $auth->add($viewCompanyPermission);
        $auth->add($deleteCompanyPermission);
        $auth->add($updateCompanyPermission);

        // Роль пользователя
        $userRole = $auth->createRole('guest');
        $auth->add($userRole);
        $auth->addChild($userRole, $viewCompanyListPermission);
        $auth->addChild($userRole, $viewCompanyPermission);

        // Роль администратора
        $adminRole = $auth->createRole('admin');
        $auth->add($adminRole);

        $auth->addChild($adminRole, $userRole);
        $auth->addChild($adminRole, $deleteCompanyPermission);
        $auth->addChild($adminRole, $updateCompanyPermission);

        // Назначаем роли
        $admin = User::findByUsername('admin');
        $auth->assign($adminRole, $admin->getId());

        $guest = User::findByUsername('guest');
        $auth->assign($userRole, $guest->getId());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191218_181844_create_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191218_181844_create_rbac cannot be reverted.\n";

        return false;
    }
    */
}
