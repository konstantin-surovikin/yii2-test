<?php

namespace console\controllers;

use common\models\User;
use Yii;
use yii\console\Controller;

class SeedController extends Controller
{
    public function actionCreateUser()
    {
        $username = 'erau';
        $password = 'example';
        $email = 'erau@example.com';

        $user = User::findByUsername($username);
        if ($user) {
            $this->stdout("User '{$username}' already exitst.\n");
            return 0;
        }

        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->setPassword($password);
        $user->generateAuthKey();
        $user->status = User::STATUS_ACTIVE;

        if ($user->save()) {
            $auth = Yii::$app->authManager;
            $role = $auth->getRole('user');
            if ($role) {
                $auth->assign($role, $user->id);
            }

            $this->stdout("Login: {$username}\n");
            $this->stdout("Password: {$password}\n");
        } else {
            $this->stderr("Errors::\n");
            foreach ($user->errors as $attribute => $errors) {
                $this->stderr("- $attribute: " . implode(', ', $errors) . "\n");
            }
            return 1;
        }

        return 0;
    }
}
