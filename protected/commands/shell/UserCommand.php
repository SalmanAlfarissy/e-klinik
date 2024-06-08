<?php

class UserCommand extends CConsoleCommand
{
    public function actionCreateUser($username = "admin", $role = "admin")
    {
        $user = new User();
        $user->nama = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->username = $username;
        $user->password = '$2y$13$/dsFLbKnXmKwojHbpK0z2uE2MdDy6hIQZRANCtJwUrv43fIszrodC';

        if ($user->save()) {
            echo "User '{$username}' created successfully.\n";

            $auth = Yii::app()->authManager;
            if (!$auth->getAuthItem($role)) {
                $auth->createRole($role);
                echo "Role '{$role}' created.\n";
            }
            $auth->assign($role, $user->id);
            echo "Role '{$role}' assigned to user '{$username}'.\n";
        } else {
            echo "Failed to create user '{$username}'.\n";
            foreach ($user->getErrors() as $error) {
                echo implode("\n", $error) . "\n";
            }
        }
    }

    public function actionAssignRole($userId = 1, $role = "admin")
    {
        $auth = Yii::app()->authManager;

        if (!$auth->getAuthItem($role)) {
            $auth->createRole($role);
            echo "Role '{$role}' created.\n";
        }

        if (!$auth->isAssigned($role, $userId)) {
            $auth->assign($role, $userId);
            echo "User ID {$userId} assigned to role '{$role}'.\n";
        } else {
            echo "User ID {$userId} already has role '{$role}'.\n";
        }
    }
}
