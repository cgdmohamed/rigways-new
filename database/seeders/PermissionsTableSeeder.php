<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'company_create',
            ],
            [
                'id'    => 19,
                'title' => 'company_edit',
            ],
            [
                'id'    => 20,
                'title' => 'company_show',
            ],
            [
                'id'    => 21,
                'title' => 'company_delete',
            ],
            [
                'id'    => 22,
                'title' => 'company_access',
            ],
            [
                'id'    => 23,
                'title' => 'project_create',
            ],
            [
                'id'    => 24,
                'title' => 'project_edit',
            ],
            [
                'id'    => 25,
                'title' => 'project_show',
            ],
            [
                'id'    => 26,
                'title' => 'project_delete',
            ],
            [
                'id'    => 27,
                'title' => 'project_access',
            ],
            [
                'id'    => 28,
                'title' => 'team_create',
            ],
            [
                'id'    => 29,
                'title' => 'team_edit',
            ],
            [
                'id'    => 30,
                'title' => 'team_show',
            ],
            [
                'id'    => 31,
                'title' => 'team_delete',
            ],
            [
                'id'    => 32,
                'title' => 'team_access',
            ],
            [
                'id'    => 33,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 34,
                'title' => 'user_alert_edit',
            ],
            [
                'id'    => 35,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 36,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 37,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 38,
                'title' => 'rig_create',
            ],
            [
                'id'    => 39,
                'title' => 'rig_edit',
            ],
            [
                'id'    => 40,
                'title' => 'rig_show',
            ],
            [
                'id'    => 41,
                'title' => 'rig_delete',
            ],
            [
                'id'    => 42,
                'title' => 'rig_access',
            ],
            [
                'id'    => 43,
                'title' => 'certificate_create',
            ],
            [
                'id'    => 44,
                'title' => 'certificate_edit',
            ],
            [
                'id'    => 45,
                'title' => 'certificate_show',
            ],
            [
                'id'    => 46,
                'title' => 'certificate_delete',
            ],
            [
                'id'    => 47,
                'title' => 'certificate_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
