<?php

namespace Modules\Roles\Http\Traits;

trait PermissionTrait
{
    public static function getData()
    {
        return collect([
            [
                'type' => 'manage-user',
                'title' => 'view-users'
            ],
            [
                'type' => 'manage-user',
                'title' => 'create-user'
            ],
            [
                'type' => 'manage-user',
                'title' => 'edit-user'
            ],
            [
                'type' => 'manage-user',
                'title' => 'delete-user'
            ],
            [
                'type' => 'manage-user',
                'title' => 'change-status-user'
            ],







            [
                'type' => 'manage-role',
                'title' => 'view-roles'
            ],
            [
                'type' => 'manage-role',
                'title' => 'manage-permissions'
            ],
            [
                'type' => 'manage-role',
                'title' => 'create-role'
            ],
            [
                'type' => 'manage-role',
                'title' => 'edit-role'
            ],
            [
                'type' => 'manage-role',
                'title' => 'delete-role'
            ],
            [
                'type' => 'manage-role',
                'title' => 'change-status-role'
            ],
        ]);
    }
}
