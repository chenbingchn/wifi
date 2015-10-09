<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\rbac\DbManager;
use yii\rbac\Role;
use yii\rbac\Permission;

class TAuthManager extends DbManager {

    public function createRole($object) {
        $role = new Role;
        foreach ($object->attributes as $key => $value) {
            if ($value) {
                $role->$key = $value;
            }
        }
        return $role;
    }

    public function createPermission($object) {
        $permission = new Permission();
        foreach ($object->attributes as $key => $value) {
            if ($value) {
                $permission->$key = $value;
            }
        }
        return $permission;
    }

    public function modelTransforItems($model, $items) {
        foreach ($model->attributes as $key => $value) {
            if ($value && $key != "updated_at") {
                if (strpos($key, '_')) {
                    $keyArray = explode('_', $key);
                    $key = "";
                    foreach ($keyArray as $k => $v) {
                        if ($k > 0) {
                            $v = ucfirst($v);
                        }
                        $key .=$v;
                    }
                }
                $items->$key = $value;
            }
        }
        return $items;
    }

    public function removeAssignments($userId, $item) {
        $result = $this->db->createCommand()
                        ->delete($this->assignmentTable, ['user_id' => $userId, 'item_name' => $item])
                        ->execute() > 0;
        return $result;
    }

}
