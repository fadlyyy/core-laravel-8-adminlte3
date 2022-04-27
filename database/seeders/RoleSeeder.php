<?php

namespace Database\Seeders;

use App\Models\User;
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
        $rl = Role::create([
            'name' => 'Admin',
            'permissions' => collect($datas)->toJson(),
            'is_paten' => 1
        ]);

        $user = User::first();
        $user->role_id = $rl->id;
        $user->save();

        Role::create([
            'name' => 'User',
            'permissions' => '[]',
            // 'is_paten' => 1
        ]);
    }
}
