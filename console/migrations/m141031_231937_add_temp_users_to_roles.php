<?php

use yii\db\Schema;
use yii\db\Migration;

class m141031_231937_add_temp_users_to_roles extends Migration
{
    public function up()

    {
        $rbac = \Yii::$app->authManager;
        $guest = $rbac->createRole('guest');
        $guest->description = 'Nobody';
        $rbac->add($guest);
        $user = $rbac->createRole('user');
        $user->description = 'Can use the query UI and nothing else';
        $rbac->add($user);
        $manager = $rbac->createRole('manager');
        $manager->description = 'Can manage entities in database, but not users';
        $rbac->add($manager);
        $admin = $rbac->createRole('admin');
        $admin->description = 'Can do anything including managing users';
        $rbac->add($admin);
        $rbac->addChild($admin, $manager);
        $rbac->addChild($manager, $user);
        $rbac->addChild($user, $guest);
        $rbac->assign($user, \common\models\User::findOne(['username' => 'user'])->id);
        $rbac->assign($manager, \common\models\User::findOne(['username' =>'manager'])->id);
		$rbac->assign($admin,\common\models\User::findOne(['username' =>'admin'])->id);
		$adminRoute=$rbac->createPermission('/*');
		$rbac->add($adminRoute);
		$rbac->addChild($admin, $adminRoute);
    }

    public function down()
    {
        $manager = \Yii::$app->authManager;
        $manager->removeAll();
    }
}
