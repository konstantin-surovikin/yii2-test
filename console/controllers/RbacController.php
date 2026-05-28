<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $guest = $auth->createRole('guest');
        $guest->description = 'Guest';
        $auth->add($guest);

        $user = $auth->createRole('user');
        $user->description = 'User';
        $auth->add($user);
        $auth->addChild($user, $guest); 

        $viewBook = $auth->createPermission('viewBook');
        $viewBook->description = 'View book';
        $auth->add($viewBook);

        $manageBook = $auth->createPermission('manageBook');
        $manageBook->description = 'Manage book';
        $auth->add($manageBook);

        $auth->addChild($guest, $viewBook);
        $auth->addChild($user, $manageBook);

	$this->stdout("'rbac/init' is ready\n");

        return 0;
    }
}
