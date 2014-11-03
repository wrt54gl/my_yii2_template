<?php

use yii\db\Schema;
use yii\db\Migration;

class m141031_231149_add_temp_users extends Migration
{
    public function up()
    {
        $user1=new \common\models\User;
        $user1->username='user';
        $user1->password='user';
        $user1->email='joe@users.com';
        $user1->save();
        $user2=new \common\models\User;
        $user2->username='manager';
        $user2->password='manager';
        $user2->email='annie@managers.com';
        $user2->save();
        $user3=new \common\models\User;
        $user3->username='admin';
        $user3->password='admin';
        $user3->email='rob@admins.com';
        $user3->save();

    }

    public function down()
	{
		if (\common\models\User::deleteAll()){
			echo 'All Users removed';
			return true;
		}else{
			echo 'Migrate down Failed!';
		    return false;
		}

    }
}
