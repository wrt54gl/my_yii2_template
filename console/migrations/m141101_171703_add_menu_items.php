<?php

use yii\db\Schema;
use yii\db\Migration;
use mdm\admin\models;

class m141101_171703_add_menu_items extends Migration
{
    public function up()
    {
        //Backend menus
        $menuItem=new common\models\MenuItems();
        $menuItem->name='backend';
        $menuItem->order=1;
        $menuItem->save();
        $backendParentId=$menuItem->id;
            //Administration
            $menuItem=new common\models\MenuItems();
            $menuItem->name='Administration';
            $menuItem->route='/admin/default/index';
            $menuItem->order=10;
            $menuItem->parent=$backendParentId;
            $menuItem->save();
            $parentId=$menuItem->id;
                //Routes
                $menuItem=new common\models\MenuItems();
                $menuItem->name='Routes';
                $menuItem->route='/admin/route/index';
                $menuItem->order=100;
                $menuItem->parent=$parentId;
                $menuItem->save();
                //Permissions
                $menuItem=new common\models\MenuItems();
                $menuItem->name='Permissions';
                $menuItem->route='/admin/permission/index';
                $menuItem->order=101;
                $menuItem->parent=$parentId;
                $menuItem->save();
                //Menus
                $menuItem=new common\models\MenuItems();
                $menuItem->name='Menus';
                $menuItem->route='/admin/menu/index';
                $menuItem->order=102;
                $menuItem->parent=$parentId;
                $menuItem->save();
                //Role
                $menuItem=new common\models\MenuItems();
                $menuItem->name='Roles';
                $menuItem->route='/admin/role/index';
                $menuItem->order=103;
                $menuItem->parent=$parentId;
                $menuItem->save();
                //Assignment
                $menuItem=new common\models\MenuItems();
                $menuItem->name='Assignments';
                $menuItem->route='/admin/assignment/index';
                $menuItem->order=104;
                $menuItem->parent=$parentId;
                $menuItem->save();
                //Users
                $menuItem=new common\models\MenuItems();
                $menuItem->name='Users';
                $menuItem->route='/user/index';
                $menuItem->order=105;
                $menuItem->parent=$parentId;
                $menuItem->save();
            //Gii
            $menuItem=new common\models\MenuItems();
            $menuItem->name='Gii';
            $menuItem->route='/gii/default/index';
            $menuItem->order=11;
            $menuItem->parent=$backendParentId;
            $menuItem->save();

        //frontend menus
        $menuItem=new common\models\MenuItems();
        $menuItem->name='frontend';
        $menuItem->order=2;
        $menuItem->save();
        $frontendParentId=$menuItem->id;

            $menuItem=new common\models\MenuItems();
            $menuItem->name='Site';
            $menuItem->route='/site/index';
            $menuItem->order=20;
            $menuItem->parent=$frontendParentId;
            $menuItem->save();
            $parentId=$menuItem->id;
                //About
                $menuItem=new common\models\MenuItems();
                $menuItem->name='About';
                $menuItem->route='/site/about';
                $menuItem->order=200;
                $menuItem->parent=$parentId;
                $menuItem->save();
                //Contact
                $menuItem=new common\models\MenuItems();
                $menuItem->name='Contact';
                $menuItem->route='/site/contact';
                $menuItem->order=201;
                $menuItem->parent=$parentId;
                $menuItem->save();
                //Signup
                $menuItem=new common\models\MenuItems();
                $menuItem->name='Signup';
                $menuItem->route='/site/signup';
                $menuItem->order=202;
                $menuItem->parent=$parentId;
                $menuItem->save();

    }

    public function down()
    {
        if (models\Menu::deleteAll()){
            echo 'All menu items removed';
            return true;
        }else{
            echo 'Migrate down Failed!';
            return false;
        }
    }
}
