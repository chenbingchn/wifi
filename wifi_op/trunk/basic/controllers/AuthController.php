<?php

namespace app\controllers;

use yii\web\Controller;
use yii\rbac\DbManager;
use Yii;
use app\models\AuthItem;
use app\models\Account;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\rbac\Role;
use app\components\TController;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AuthController extends TController {

    /**
     * @desc 角色列表
     */
    public function actionRole() {
        $authManager = Yii::$app->TAuthManager;
        $roles = $authManager->getRoles();
        return $this->render('role', array('roles' => $roles));
    }
    
    /**
     * @desc 创建角色
     */
    public function actionCreaterole() {
        $model = new AuthItem;
        if ($model->load(Yii::$app->request->post())) {
            $authManager = Yii::$app->TAuthManager;
            $role = $authManager->createRole($model);
            $authManager->add($role);
            $this->redirect(Yii::$app->urlManager->createUrl('auth/role'));
        }
        return $this->render('create_role', ['model' => $model]);
    }

    /**
     * @desc 更新角色
     */
    public function actionUpdaterole($id) {
        $model = new AuthItem;
        $model = $model->find()->where(['=', 'name', $id])->one();
        if ($model->load(Yii::$app->request->post())) {
            $role = Yii::$app->TAuthManager->getRole($id);
            $role = Yii::$app->TAuthManager->modelTransforItems($model, $role);
            Yii::$app->TAuthManager->update($id, $role);
            $this->redirect(Yii::$app->urlManager->createUrl('auth/role'));
        }
        return $this->render('create_role', ['model' => $model]);
    }
    
    /**
     * @desc 删除角色
     */
    public function actionDeleterole($id) {
        $authManager = Yii::$app->TAuthManager;
        $role = $authManager->getRole($id);
        if ($role) {
            $authManager->remove($role);
        }
        $this->redirect(Yii::$app->urlManager->createUrl('auth/role'));
    }
    
    /**
     * @desc 操作列表
     */
    public function actionPermission() {
        $authManager = Yii::$app->TAuthManager;
        $Permissions = $authManager->getPermissions();
        return $this->render('Permission', array('Permissions' => $Permissions));
    }
    
    /**
     * @desc 创建操作
     */
    public function actionCreatepermission() {
        $model = new AuthItem;
        if ($model->load(Yii::$app->request->post())) {
            $authManager = Yii::$app->TAuthManager;
            $Permission = $authManager->createPermission($model);
            $authManager->add($Permission);
            $this->redirect(Yii::$app->urlManager->createUrl('auth/permission'));
        }
        return $this->render('create_permission', ['model' => $model]);
    }
    
    /**
     * @desc 删除操作
     */
    public function actionDeletepermission($id) {
        $authManager = Yii::$app->TAuthManager;
        $Permission = $authManager->getPermission($id);
        if ($Permission) {
            $authManager->remove($Permission);
        }
        $this->redirect(Yii::$app->urlManager->createUrl('auth/permission'));
    }
    
    /**
     * @desc 更新操作
     */
    public function actionUpdatepermission($id) {
        $model = new AuthItem;
        $model = $model->find()->where(['=', 'name', $id])->one();
        if ($model->load(Yii::$app->request->post())) {
            $Permission = Yii::$app->TAuthManager->getPermission($id);
            $Permission = Yii::$app->TAuthManager->modelTransforItems($model, $Permission);
            Yii::$app->TAuthManager->update($id, $Permission);
            $this->redirect(Yii::$app->urlManager->createUrl('auth/permission'));
        }
        return $this->render('create_permission', ['model' => $model]);
    }
    
    /**
     * @desc 给角色分配操作权限操作页面  auth.signpermission 权限必须开启
     */
    public function actionRolesignpermission($role) {
        $RolePermissions = Yii::$app->TAuthManager->getPermissionsByRole($role);
        $RolePermissions = array_keys($RolePermissions);
        $Permissions = Yii::$app->TAuthManager->getPermissions();
        return $this->render('role_sign_permission', [
                    'Permissions' => $Permissions,
                    'role' => $role,
                    'RolePermissions' => $RolePermissions
        ]);
    }
    
    /**
     * @desc 给角色分配操作权限 
     */
    public function actionSignpermission() {
        if (Yii::$app->request->post()) {
            $role = $_POST['role'];
            $RolePermissions = Yii::$app->TAuthManager->getPermissionsByRole($role);
            $RolePermissions = array_keys($RolePermissions);
            $role = Yii::$app->TAuthManager->getRole($role);
            $permissions = $_POST['permissions'];
            $deletepermissions = array();
            foreach ($RolePermissions as $permission) {
                if (!in_array($permission, $permissions)) {
                    $deletepermissions[] = $permission;
                }
            }
            foreach ($deletepermissions as $permission) {
                $permission = Yii::$app->TAuthManager->getPermission($permission);
                Yii::$app->TAuthManager->removeChild($role, $permission);
            }
            foreach ($permissions as $permission) {
                $permission = Yii::$app->TAuthManager->getPermission($permission);
                $hasChild = Yii::$app->TAuthManager->hasChild($role, $permission);
                if (!$hasChild) {
                    Yii::$app->TAuthManager->addChild($role, $permission);
                }
            }
            echo "ok";
        }
    }
    
    /**
     * @desc 权限用户列表
     */
    public function actionUserlist() {
        $provider = new ActiveDataProvider([
            'query' => User::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('user_list', ['provider' => $provider]);
    }
    
    /**
     * @desc 用户分配角色操作页 auth.assigntouser必须开启权限
     */
    public function actionUserassign($id) {
        $UserRole = array_keys(Yii::$app->TAuthManager->getRolesByUser($id));
        $roles = Yii::$app->TAuthManager->getRoles();
        $Permissions = Yii::$app->TAuthManager->getPermissions();
        return $this->render('user_assign', [
                    'roles' => $roles,
                    'Permissions' => $Permissions,
                    'id' => $id,
                    'UserRole'=>$UserRole
        ]);
    }
    
    /**
     * @desc 用户分配角色操作页 
     */
    public function actionAssigntouser() {
        if (Yii::$app->request->post()) {
            $roles =  $_POST['roles'] ;
            $userId = $_POST['userId'];
            $oriAssign = Yii::$app->TAuthManager->getAssignments($userId);
            $oriAssign = array_keys($oriAssign);
//            foreach($oriAssign as $v){
//                if(in_array())
//            }
            $deleteArray = array();
            foreach ($oriAssign as $v) {
                if (!in_array($v, $roles)) {
                    $deleteArray[] = $v;
                }
            }
            foreach ($roles as $v) {
                if (!in_array($v, $oriAssign)) {
                    $role = new Role();
                    $role->name = $v;
                    Yii::$app->TAuthManager->assign($role, $userId);
                }
            }
            foreach ($deleteArray as $v) {
                Yii::$app->TAuthManager->removeAssignments($userId, $v);
            }
            echo "ok";
        }
    }

}
