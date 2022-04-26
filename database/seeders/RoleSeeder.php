<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Roles\Entities\Role;
use Modules\Roles\Http\Traits\PermissionTrait;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $get_data = PermissionTrait::getData();
        $data = $get_data->all();
        // dd($data);
        $datas = [];
        foreach ($data as $key => $value) {
            // dd($value);
            $datas[] = $value['title'];
        }
        // dd(collect($datas)->toArray());
        Role::create([
            'name' => 'Admin',
            'permissions' => collect($datas)->toJson(),
            'is_paten' => 1
        ]);

        Role::create([
            'name' => 'User',
            'permissions' => '[]',
            // 'is_paten' => 1
        ]);
    }
}
