<?php

namespace app\commands;

use app\models\User;

/**
 * admin/create $name $password
 * admin/icon $name $icon 修改$name 用户的头像
 * admin/password $name $password 修改$name 的密码
 * admin/delete $name 删除某个用户
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class UserController extends BaseController
{

    public function options($actionID)
    {
        return [
            '管理员相关的命令'
        ];
    }

    public function actionPassword($name, $password)
    {
        $model = User::findOne(['username' => $name]);
        if (!$model) {
            $this->warningLine($name . ' not exists');
            return 1;
        }
        if (empty($password)) {
            $this->warningLine('password is empty');
            return 2;
        }
        $model->password = \Yii::$app->security->generatePasswordHash($password);
        if ($model->save()) {
            $this->successLine('update password success for ' . $name);
            return 0;
        }
        $this->errorLine('update password failed');
        $this->errorLine(json_encode($model->errors));
        return 1;
    }

    public function actionFreebidden($name)
    {
        $admin = User::findOne(['username' => $name]);
        if (!$admin) {
            $this->errorLine('not exists ' . $name);
            return 1;
        }
        $admin->status = User::STATUS_NO_ACTIVE;
        if ($admin->save()) {
            $this->successLine('freebidden success');
        } else {
            $this->errorLine('freebidden failed');
        }
    }

    public function actionActive($name)
    {
        $admin = User::findOne(['username' => $name]);
        if (!$admin) {
            $this->errorLine('not exists ' . $name);
            return 1;
        }
        $admin->status = User::STATUS_ACTIVE;
        if ($admin->save()) {
            $this->successLine('active success');
        } else {
            $this->errorLine('active failed');
        }
    }

    public function actionDelete($name)
    {
        $admin = User::findOne(['username' => $name]);
        if ($admin && $admin->delete()) {
            $this->successLine('delete success for ' . $name);
            return 0;
        } else {
            $this->errorLine('delete failed for ' . $name);
            return 1;
        }
    }

    public function actionCreate($name, $password)
    {
        $admin = new User();
        $admin->username = $name;
        if (empty($password)) {
            $this->warningLine('password is empty');
            return 1;
        }
        $admin->password = \Yii::$app->security->generatePasswordHash($password);
        $admin->status = User::STATUS_ACTIVE;
        if ($admin->save()) {
            $this->successLine('create user success for ' . $name);
            return 0;
        }
        $this->errorLine(json_encode($admin->errors));
        return 1;
    }

    public function actionInit()
    {
        $admin = new User();
        $admin->username = 'admin';
        $admin->status = User::STATUS_ACTIVE;
        $admin->password = \Yii::$app->security->generatePasswordHash('admin');
        if ($admin->save()) {
            $this->stdout('create super user success'.PHP_EOL);
            return ;
        }
        $this->errorLine('init super user failed');
        $this->errorLine(json_encode($admin->errors));
    }

}