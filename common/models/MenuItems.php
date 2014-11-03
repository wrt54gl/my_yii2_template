<?php
/**
 * Created by PhpStorm.
 * User: wendel
 * Date: 03/11/2014
 * Time: 10:36 AM
 */

namespace common\models;
use mdm\admin\models;

class MenuItems extends models\Menu{


    //This adds the route to the permissions if it does not exist
    public function save($runValidation = true, $attributeNames = NULL){
        $rbac = \Yii::$app->authManager;
        $route=$this->route;
        if (!empty($route)){
            if(!$rbac->getPermission($route)){
                $newRoute=$rbac->createPermission($route);
                $rbac->add($newRoute);
            }
        }
        return parent::save($runValidation, $attributeNames);
    }

} 