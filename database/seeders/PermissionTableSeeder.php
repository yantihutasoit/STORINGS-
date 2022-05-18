<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'Nilai-list',
           'Nilai-create',
           'Nilai-edit',
           'Nilai-delete',
           'Sekolah-list',
           'Sekolah-create',
           'Sekolah-edit',
           'Sekolah-delete',
           'Siswa-list',
           'Siswa-create',
           'Siswa-edit',
           'Siswa-delete'

        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
