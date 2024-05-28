<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the admin role
        $role = Role::create(['name' => 'admin']);

        // Define permissions array
        $permissions = [
            [
                'module_name' => 'Manage-Dashboard',
                'guard_name' => 'web',
                'permissions' => [
                    'dashboard',
                ]
            ],
            [
                'module_name' => 'Manage-User',
                'guard_name' => 'web',
                'permissions' => [
                    'user.index',
                    'user.create',
                    'user.edit',
                    'user.delete',
                ]
            ],
            [
                'module_name' => 'Manage-Role',
                'guard_name' => 'web',
                'permissions' => [
                    'role.index',
                    'role.create',
                    'role.edit',
                    'role.delete',
                ]
            ],
            [
                'module_name' => 'Manage-Author',
                'guard_name' => 'web',
                'permissions' => [
                    'author.index',
                    'author.create',
                    'author.edit',
                    'author.delete',
                ]
            ],
            [
                'module_name' => 'Manage-Book',
                'guard_name' => 'web',
                'permissions' => [
                    'book.index',
                    'book.create',
                    'book.edit',
                    'book.delete',
                ]
            ],
            [
                'module_name' => 'Manage-Member',
                'guard_name' => 'web',
                'permissions' => [
                    'member.index',
                    'member.create',
                    'member.edit',
                    'member.delete',
                ]
            ],
            [
                'module_name' => 'Manage-Borrow',
                'guard_name' => 'web',
                'permissions' => [
                    'borrow.index',
                    'borrow.create',
                    'borrow.edit',
                    'borrow.delete',
                ]
            ],
        ];

        // Create permissions and assign to role
        foreach ($permissions as $module) {
            foreach ($module['permissions'] as $permission) {
                Permission::create([
                    'name' => $permission,
                    'guard_name' => $module['guard_name'],
                    'module_name' => $module['module_name'],
                ]);
            }
        }

        // Sync all permissions to the admin role
        $role->syncPermissions(Permission::all());

        // Assign admin role to the first user
        $user = User::first();
        $user->assignRole($role);
    }

}
